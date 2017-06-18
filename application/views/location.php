<div class = "row">


<div class="col-md-6">
        <br />

<button class="btn btn-success" onclick="add_location()"><i class="glyphicon glyphicon-plus"></i> Add Location</button>

</br>
</br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Code</th>
			<th>Location</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody class = "tab_loc"></tbody>
</table>
</div>



</div>

<script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

     	$('.tab_loc').empty();

     	$.ajax({
     		url : "<?php echo site_url('bacteria/list_all_location')?>/",
     		type: "POST",
     		dataType: "JSON",
     		success: function(json_data)
     		{

     			for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].location+'</td><td><a class="btn btn-warning btn-sm" onclick = "editLocation('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                            $('.tab_loc').append(a);
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

function add_location()
{
	save_method = 'add';
      //list_allLocation();
      $('#form_location')[0].reset(); // reset form on modals
      $('#modal_form_location').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location'); // Set Title to Bootstrap modal title
  }

  function save_location()

  {

    $('#btnSaveLocation').text('saving...'); //change button text
    $('#btnSaveLocation').attr('disabled',true); //set button disable 

    
    url = "<?php echo site_url('bacteria/add_location')?>";
    

      // ajax adding data to database
      $.ajax({
      	url : url,
      	type: "POST",
      	data: $('#form_location').serialize(),
      	dataType: "JSON",
      	success: function(data)
      	{
               //if success close modal and reload ajax table
               $('#modal_form_location').modal('hide');
               $('#btnSaveLocation').text('save'); //change button text
               $('#btnSaveLocation').attr('disabled',false); //set button enable 
               list_allLocation();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
           	alert('Error adding / update data');
                $('#btnSaveLocation').text('save'); //change button text
                $('#btnSaveLocation').attr('disabled',false); //set button enable 
            }
        });
  }

  function editLocation(id)
  {
      //alert(id);

      $('#form_location')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
      	url : "<?php echo site_url('bacteria/edit_location/')?>/" + id,
      	type: "GET",
      	dataType: "JSON",
      	success: function(data)
      	{

      		$('[name="id"]').val(data.id);
      		$('[name="Lokasi_edittable"]').val(data.location);

            $('#ModalEditLocation').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Location'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	alert('Error get data from ajax');
        }
    });

  }

  function DeleteLocation(id)
  {
  	if(confirm('Are you sure delete this data?'))
  	{
        // ajax delete data to database
        $.ajax({
        	url : "<?php echo site_url('bacteria/Delete_location')?>/"+id,
        	type: "POST",
        	dataType: "JSON",
        	success: function()
        	{
               //if success reload ajax table
             //  $('#modal_form').modal('hide');
               //reload_table();
               list_allLocation();

           },
           error: function (jqXHR, textStatus, errorThrown)
           {
           	alert('Error adding / update data');
           }
       });
        
    }
}

function Editsave_location()
    {
      $('#btnSaveEditLocation').text('saving...'); //change button text
      $('#btnSaveEditLocation').attr('disabled',true); //set button disable 

      var url;
      url = "<?php echo site_url('bacteria/update_location')?>";

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form_edit_location').serialize(),
      dataType: "JSON",
      success: function(data)
      {
               //if success close modal and reload ajax table
               $('#ModalEditLocation').modal('hide');
               $('#btnSaveEditLocation').text('save'); //change button text
               $('#btnSaveEditLocation').attr('disabled',false); //set button enable 
               list_allLocation();
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error update data');
                $('#btnSaveEditLocation').text('save'); //change button text
                $('#btnSaveEditLocation').attr('disabled',false); //set button enable 
              }
            });
  }

</script>



<!-- Bootstrap modal form location-->
<div class="modal fade" id="modal_form_location" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"> Form</h3>
			</div>
			<div class="modal-body form">

				<form action="#" id="form_location" class="form-horizontal">

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Location name</label>
							<div class="col-md-6">
								<input name="Lokasi" placeholder="" class="form-control" type="text">
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





 <!-- Bootstrap modal EditLocation -->
    <div class="modal fade" id="ModalEditLocation" role="dialog">
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







    <script type="text/javascript">

    function list_allLocation(){

     //nie utk dropdown location 
     $(document).ready(function(){

      $('.tab_loc').empty();

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].location+'</td><td><a class="btn btn-warning btn-sm" onclick = "editLocation('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                            $('.tab_loc').append(a);
                          }

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });



})


}
</script>