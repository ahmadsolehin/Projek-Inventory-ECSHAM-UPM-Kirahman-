<ul class="nav nav-tabs">
	<li class="active"><a href="#a" data-toggle="tab">Type Strain</a></li>
	<li><a href="#b" data-toggle="tab">Location</a></li>
	<li><a href="#c" data-toggle="tab">Preservation Method</a></li>
  <li><a href="#d" data-toggle="tab">Location One</a></li>
  <li><a href="#e" data-toggle="tab">Canister & Boxes</a></li>
  <li><a href="#h" data-toggle="tab">Summary Strain</a></li>
  <li><a href="#g" data-toggle="tab">Summary Strain</a></li>
</ul>

<div class="tab-content">

	<div id="a" class="tab-pane active">
		<div class="row">
			<?php $this->load->view('type_Strain_view'); ?>
		</div>
	</div>

	<div id="b" class="tab-pane fade">
		<div class="row">
     <?php $this->load->view('location'); ?>
   </div>
 </div>


 <div id="c" class="tab-pane fade">
   <div class="row">
    <?php $this->load->view('preservation_method'); ?>
  </div>	
</div>

<div id="g" class="tab-pane">
  <div class="row">
  </div>
</div>



<div id="d" class="tab-pane fade">
  <div class="row">
    <?php $this->load->view('location_one'); ?>
  </div>  
</div>

<div id="e" class="tab-pane fade">
  <div class="row">
    <div class="col-md-6">
    </br>
  </br>
  <button class="btn btn-success" onclick="add_location_canister()"><i class="glyphicon glyphicon-plus"></i> Add Location Canister</button>

</br>
</br>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Code</th>
      <th>Type Canister</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class = "tab_location_canister"></tbody>
</table>
</div>


</div>  
</div>


<div id="h" class="tab-pane fade">
  <div class="row">
    <?php $this->load->view('summary_strain'); ?>
  </div>  
</div>


</div>






















<script type="text/javascript">


function add_location_canister()
{
   //   $('#form_location_add_canister')[0].reset(); // reset form on modals
      $('#ModalEditLocationOne').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location Canister'); // Set Title to Bootstrap modal title
}


    function editCanisterType(id)
    {
      alert(id);

      $('#modal_form_location_canisterType').modal('show'); // show bootstrap modal




    }

    </script>







    <script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

      $('.tab_location_canister').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_canister')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_canister+'</td><td><a class="btn btn-warning btn-sm"  onclick = "editBoxes('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"   ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
            $('.tab_location_canister').append(a);
          }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    })

     </script>





<!-- Bootstrap modal form location-->
<div class="modal fade" id="modal_form_location_add_canister" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"> Form</h3>
      </div>
      <div class="modal-body form">

          <form action="#" id="form_location_add_canister" class="form-horizontal">

              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">Location Canister Name</label>
                  <div class="col-md-6">
                    <input name="canister_name" placeholder="Enter name" class="form-control" type="text">
                  </div>
                </div>

                <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">Canister Quantity</label>
                  <div class="col-md-6">
                    <input name="canister_quantity" placeholder="Enter quantity" class="form-control" type="number">
                  </div>
                </div>

              </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveLocation" onclick="save_location()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- End Bootstrap modal -->












<!-- Bootstrap modal form location-->
<div class="modal fade" id="aswxad" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"> Form</h3>
      </div>
      <div class="modal-body form">


            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Canister</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class = "table_Canisster"></tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveLocation" onclick="save_location()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- End Bootstrap modal -->












<script type="text/javascript">




     function editBoxes(id)
     {

   //$('.modal-title').text('Canister'); // Set Title to Bootstrap modal title
      $('#modal_form_location_add_canister').modal('show'); // show bootstrap modal



          }

</script>












<!-- Bootstrap modal EditLocation -->
    <div class="modal fade" id="ModalEditLocationOne" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form_edit_location" class="form-horizontal">
              <input type="hidden" value=""name="id"/>
              <div class="form-body">

                <div class="form-group">
                  <label class="control-label col-md-3">Edit Location</label>
                  <div class="col-md-9">
                    <input name="Lokasi_edittable" class="form-control" type="text">
                  </div>
                </div>


              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSaveEditLocation" onclick="Editsave_location()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->


