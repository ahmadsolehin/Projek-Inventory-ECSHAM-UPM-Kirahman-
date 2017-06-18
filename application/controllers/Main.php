<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public $status; 
    public $roles;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->library('form_validation');    
        $this->form_validation->set_error_delimiters('<div style="color:red;" class="error">', '</div>');
        $this->status = $this->config->item('status'); 
        $this->roles = $this->config->item('roles');
    }    

    public function load_RegisterForm()
    {
        $this->load->view('register');      
    }  
    
    public function index()
    {   
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'/main/login');
        }            
        /*front page*/
        $data = $this->session->userdata; 
        //$this->load->view('header');            
        $this->load->view('admin_mainmenu', $data);
            //$this->load->view('footer');
    }


    public function register()
    {

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {   
            $this->load->view('header');
            $this->load->view('register');
                //$this->load->view('footer');
        }else{                
            if($this->user_model->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'User email already exists');
                redirect(site_url().'main/login');
            }else{

                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $id = $this->user_model->insertUser($clean); 
                $this->session->set_flashdata('flash_message', 'Your account has been created!!');
                redirect(site_url().'main/login');

                
            };              
        }
    }
        
        
        protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }
        
         public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'main/login');
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
                $this->load->view('header');
                $this->load->view('complete', $data);
                //$this->load->view('footer');
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
                    redirect(site_url().'main/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'main/');
                
            }
        }


 


    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('password', 'Password', 'required'); 

        if($this->form_validation->run() == FALSE) {

            $this->load->view('header');
            $this->load->view('login_page');

        }else{

            $post = $this->input->post();  
            $clean = $this->security->xss_clean($post);

            $userInfo = $this->user_model->checkLogin($clean);

             $this->roles = $this->config->item('roles');

             if ($userInfo->role == $this->roles[1]) { //kalau role = admin
                 echo $userInfo->role;
                 foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'main/');

             }else{ // kalau role = user

                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                    redirect(site_url().'main/login');
                }                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'admin_menu/User_mainMenu');

             }
            
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'main/login/');
    }

    
        
       
        
    }