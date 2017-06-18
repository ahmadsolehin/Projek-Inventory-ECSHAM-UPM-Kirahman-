<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $status; 
	public $roles;
	
	function __construct(){

		parent::__construct();
		$this->load->model('user_model', 'user_model', TRUE);
		$this->load->library('form_validation');    
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->status = $this->config->item('status'); 
		$this->roles = $this->config->item('roles');
	}   

	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('login_page');
	}

	public function load_RegisterForm()
	{
		$this->load->view('register');		
	}


	public function register()
	{

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');    
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');    

		if ($this->form_validation->run() == FALSE) {   
			// $this->load->view('header');
			 $this->load->view('register');
			// $this->load->view('footer');
			echo 'haha';
		}else{            

			if($this->user_model->isDuplicate($this->input->post('email'))){
				$this->session->set_flashdata('flash_message', 'User email already exists');
				redirect(site_url().'/login/index');
			}else{

				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
				$id = $this->user_model->insertUser($clean); 
				$token = $this->user_model->insertToken($id);                                        

				$qstring = base64_encode($token);                    
				$url = site_url() . '/login/complete/token/' . $qstring;
				$link = '<a href="' . $url . '">' . $url . '</a>'; 

				$message = '';                     
				$message .= '<strong>You have signed up with our website</strong><br>';
				$message .= '<strong>Please click:</strong> ' . $link;                          

                    echo $message; //send this in email
                    exit;

                    
                };              
            }
        }


public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'login/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                // $this->load->view('header');
                 $this->load->view('complete', $data);
                // $this->load->view('footer');
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                    redirect(site_url().'login/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'login/');
                
            }
        }
    }
