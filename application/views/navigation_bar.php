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

    <!-- search form (Optional) -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="apam treeview">
              <a href="#" style="text-decoration:none">
                <i class="fa fa-files-o"></i>
                <span >Culture</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu StrainList">
                <li><a class = "ayam" href = "<?php echo base_url();?>index.php/bacteria"><i class="fa fa-circle-o"></i> Bacteria List</a></li>
                <li><a class = "ayam" href = "<?php echo base_url();?>index.php/Alga_Controller"><i class="fa fa-circle-o"></i> Alga List</a></li>
                <li><a class = "ayam" href = "<?php echo base_url();?>index.php/bacteria/loadAlga"><i class="fa fa-circle-o"></i> Fungi List</a></li>
              </ul>
            </li>



           <!--  <li>
              <a class = "ayam" href="<?php echo base_url();?>bacteria/config"><i class="fa fa-dashboard"></i> Configuration
              </a>
            </li> -->

            
            
            
<li class="treeview">
              <a href="#" style="text-decoration:none">
                <i class="fa fa-files-o"></i>
                <span >Configuration</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a class = "ayam" href = "<?php echo base_url();?>Lokasi_controller/Load_Type_Strain"><i class="fa fa-circle-o"></i>Type of Strain</a></li>
                <li><a class = "ayam" href = "<?php echo base_url();?>Lokasi_controller/Load_Location_View"><i class="fa fa-circle-o"></i>Location</a></li>
                <li><a class = "ayam" href = "<?php echo base_url();?>Lokasi_controller/Load_Data_Matrix"><i class="fa fa-circle-o"></i>Storage Cryo</a></li>
                <li><a class = "ayam" href = "<?php echo base_url();?>Lokasi_controller/Load_Data_Matrix_Refri"><i class="fa fa-circle-o"></i>Storage Freeze</a></li>
              </ul>
            </li>



            <li>
              <a class = "ayam" href="<?php echo base_url();?>admin_menu/load_Person"><i class="fa fa-users"></i>Users
              </a>
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
        url : "<?php echo site_url('bacteria/list_all_type_Strain')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<li><a class = "ayam enter" href = "<?php echo base_url();?>bacteria/index/'+json_data[i].type_strain+'"><i class="fa fa-circle-o"></i> '+json_data[i].type_strain+'</a></li>';
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


<script type="text/javascript">
  
$('.apam').removeClass('active');

</script>


<script>


$(document).ready(function(){

$( "body" ).on( "click", ".ayam", function() {

  $('.ayam').each(function(a){
       $( this ).removeClass('selectedclass')
     });
     $( this ).addClass('selectedclass');
});

})


</script>




<style type="text/css">
  

li a.selectedclass
{
    color: red !important;
    font-weight: bold;
}

</style>