<div class = "row">

<div class="col-md-6">
		</br>
	</br>
	<button class="btn btn-success" onclick="add_location_unit()"><i class="glyphicon glyphicon-plus"></i> Add Preservation Method</button>

</br>
</br>
<table class="table table-bordered table-hover">
  <thead>
   <tr>
    <th>Code</th>
    <th>Preservation Method</th>
    <th>Action</th>
  </tr>
</thead>
<tbody class = "tab_location_unit"></tbody>
</table>
</div>



</div>

<script type="text/javascript">

//nie utk dropdown location unit 
     $(document).ready(function(){

      $('.tab_location_unit').empty();

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location_unit')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].location_unit+'</td><td><a class="btn btn-warning btn-sm" onclick = "editLocationUnit('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocationUnit('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                            $('.tab_location_unit').append(a);
                          }

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });
})


function add_location_unit()
    {
      //save_method = 'add';
      $('#form_location_unit')[0].reset(); // reset form on modals
      $('#modal_form_location_unit').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location Unit'); // Set Title to Bootstrap modal title
    }

     function save_location_unit()

    {


    $('#btnSaveLocationUnit').text('saving...'); //change button text
    $('#btnSaveLocationUnit').attr('disabled',true); //set button disable 

    
    url = "<?php echo site_url('bacteria/add_location_unit')?>";
    

      // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: $('#form_location_unit').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               $('#modal_form_location_unit').modal('hide');
               $('#btnSaveLocationUnit').text('save'); //change button text
               $('#btnSaveLocationUnit').attr('disabled',false); //set button enable 
               list_allLocationUnit();

             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding data');
                $('#btnSaveLocationUnit').text('save'); //change button text
                $('#btnSaveLocationUnit').attr('disabled',false); //set button enable 
              }
            });
    }





    

    function editLocationUnit(id)
    {
      //alert(id);

      $('#form_location_unit')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('bacteria/edit_location_unit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {


          $('[name="id"]').val(data.id);
          $('[name="Lokasi_unit_edittable"]').val(data.location_unit);

            $('#ModalEditLocationUnit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Location'); // Set title to Bootstrap modal title
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });

    }



    

  function Editsave_locationUnit()
  {
      $('#btnSaveEditLocationUnit').text('saving...'); //change button text
      $('#btnSaveEditLocationUnit').attr('disabled',true); //set button disable 

      var url;
      url = "<?php echo site_url('bacteria/update_location_unit')?>";

    // ajax adding data to database
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form_edit_location_unit').serialize(),
      dataType: "JSON",
      success: function(data)
      {
               //if success close modal and reload ajax table
               $('#ModalEditLocationUnit').modal('hide');
               $('#btnSaveEditLocationUnit').text('save'); //change button text
               $('#btnSaveEditLocationUnit').attr('disabled',false); //set button enable 
               list_allLocationUnit();
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error update data');
                $('#btnSaveEditLocationUnit').text('save'); //change button text
                $('#btnSaveEditLocationUnit').attr('disabled',false); //set button enable 
              }
            });
  }


 

    function DeleteLocationUnit(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('bacteria/Delete_location_unit')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function()
          {
               //if success reload ajax table
             //  $('#modal_form').modal('hide');
               //reload_table();
               list_allLocationUnit();

             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          });
        
      }
    }
</script>









<script type="text/javascript">

function list_allLocationUnit(){


     //nie utk dropdown location unit 
     $(document).ready(function(){

      $('.tab_location_unit').empty();

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location_unit')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].location_unit+'</td><td><a class="btn btn-warning btn-sm" onclick = "editLocationUnit('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocationUnit('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                            $('.tab_location_unit').append(a);
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


 <!-- Bootstrap modal form location-->
    <div class="modal fade" id="modal_form_location_unit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"> Form</h3>
          </div>
          <div class="modal-body form">

            <form action="#" id="form_location_unit" class="form-horizontal">

              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">Location Unit Name</label>
                  <div class="col-md-6">
                    <input name="Lokasi_unit" placeholder="" class="form-control" type="text">
                  </div>
                </div>


              </div>



            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSaveLocationUnit" onclick="save_location_unit()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->



<!-- Bootstrap modal EditLocationUnit -->
    <div class="modal fade" id="ModalEditLocationUnit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form_edit_location_unit" class="form-horizontal">
              <input type="hidden" value=""name="id"/>
              <div class="form-body">

                <div class="form-group">
                  <label class="control-label col-md-3">Edit Location Unit</label>
                  <div class="col-md-6">
                    <input name="Lokasi_unit_edittable" class="form-control" type="text">
                  </div>
                </div>


              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSaveEditLocationUnit" onclick="Editsave_locationUnit()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->
