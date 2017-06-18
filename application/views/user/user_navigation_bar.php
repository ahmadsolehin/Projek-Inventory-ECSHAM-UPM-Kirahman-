<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url().'uploads/nophoto.jpg';?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('first_name');?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="treeview">
              <a href="#" style="text-decoration:none">
                <i class="fa fa-files-o"></i>
                <span >Culture</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu StrainList">
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-clock-o"></i> <span>Order</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <!-- <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
              </ul> -->
            </li>

            <li>
              <a class = "ayam" href="<?php echo base_url();?>admin_menu/load_Profile"><i class="fa fa-user-md"></i>Profile
              </a>
            </li>


            
            
     
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <script type="text/javascript">


      $(document).on('click','.ayam',function(){

       var href = $(this).attr('href');
       $('#haha').empty().load(href).fadeIn('slow');
       return false;

     });


      </script>




      <script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

      $('.StrainList').empty();

 //     var a = '<li><a class = "ayam" href = "<?php echo base_url();?>index.php/bacteria"><i class="fa fa-circle-o"></i> Bacteria List</a></li>';
//      $('.StrainList').append(a);

      $.ajax({
        url : "<?php echo site_url('user/bacteria/list_all_type_Strain')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<li><a class = "ayam" href = "<?php echo base_url();?>admin_menu/user_bacteria/'+json_data[i].type_strain+'"><i class="fa fa-circle-o"></i> '+json_data[i].type_strain+'</a></li>';
                            $('.StrainList').append(a);
                          }

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });



    })



</script>