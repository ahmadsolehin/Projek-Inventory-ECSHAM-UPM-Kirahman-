<div class = "row">


<div class="col-md-6">
    </br>
  </br>
  <button class="btn btn-success" onclick="add_location_one()"><i class="glyphicon glyphicon-plus"></i> Add Location One</button>

</br>
</br>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Code</th>
      <th>Location One</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class = "tab_location_one"></tbody>
</table>
</div>






</div>

          <script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

      $('.tab_location_one').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location_one')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].location_one+'</td><td><a class="btn btn-warning btn-sm" onclick = "editLocationOne('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                            $('.tab_location_one').append(a);
                          }

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });

})



    function add_location_one()
    {
      load_Canister_Type();
      load_Boxes_Type();
      load_Refrigerator_Canister_Type();
      load_Refrigerator_Boxes_Type();
      $('#form_location_one')[0].reset(); // reset form on modals
      $('#modal_form_location_one').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location One'); // Set Title to Bootstrap modal title
    }

    function simpan_Data_Location_one()

  {

    $('#btnsimpan_Data_Location_one').text('saving...'); //change button text
    $('#btnsimpan_Data_Location_one').attr('disabled',true); //set button disable 

    
    url = "<?php echo site_url('Lokasi_controller/add_Data_location_one')?>";
    

      // ajax adding data to database
      $.ajax({
        url : url,
        type: "POST",
        data: $('#form_location_one').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               $('#modal_form_location_one').modal('hide');
               $('#btnsimpan_Data_Location_one').text('save'); //change button text
               $('#btnsimpan_Data_Location_one').attr('disabled',false); //set button enable 
               //list_allLocation();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
            alert('Error adding / update data');
                $('#btnsimpan_Data_Location_one').text('save'); //change button text
                $('#btnsimpan_Data_Location_one').attr('disabled',false); //set button enable 
            }
        });
  }

    function editLocationOne(id)
  {
      //alert(id);

    //  $('#form_location')[0].reset(); // reset form on modals

      $('#form_location_one')[0].reset(); // reset form on modals
      $('#modal_form_location_one').modal('show'); // show bootstrap modal when complete loaded


  }

   

    </script>








    <!-- Bootstrap modal form location one-->
    <div class="modal fade" id="modal_form_location_one" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"> Form</h3>
          </div>
          <div class="modal-body form">

            <form action="#" id="form_location_one" class="form-horizontal">

              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">Location One Name</label>
                  <div class="col-md-6">
                    <input name="Lokasi_one" placeholder="" class="form-control" type="text">
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3">Canister</label>
                  <div class="col-md-6">
                    <select name = "canister_type" class="form-control"id = "canister_type">
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Boxes</label>
                  <div class="col-md-6">
                    <select name = "boxes_type" class="form-control"id = "boxes_type">
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Row</label>
                  <div class="col-md-6">
                    <select name = "refrigerator_canister_type" class="form-control"id = "refrigerator_canister_type">
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Location Detail</label>
                  <div class="col-md-6">
                    <select name = "refrigerator_boxes_type" class="form-control"id = "refrigerator_boxes_type">
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
                


              </div>



            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnsimpan_Data_Location_one" onclick="simpan_Data_Location_one()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->





<script type="text/javascript">

function load_Canister_Type()
{
     //nie utk dropdown location 
     $(document).ready(function(){

      $('#canister_type').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_canister')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#canister_type').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_canister+'> '+json_data[i].type_canister+' </option>';
                            $('#canister_type').append(a);
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




<script type="text/javascript">


function load_Boxes_Type(){
     //nie utk dropdown location 
     $(document).ready(function(){

      $('#boxes_type').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_boxes')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#boxes_type').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_boxes+'> '+json_data[i].type_boxes+' </option>';
                            $('#boxes_type').append(a);
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



















<script type="text/javascript">

function load_Refrigerator_Canister_Type()
{
     //nie utk dropdown location 
     $(document).ready(function(){

      $('#refrigerator_canister_type').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_refrigerator_canister')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#refrigerator_canister_type').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_refrigerator_canister+'> '+json_data[i].type_refrigerator_canister+' </option>';
                            $('#refrigerator_canister_type').append(a);
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












<script type="text/javascript">


function load_Refrigerator_Boxes_Type(){
     //nie utk dropdown location 
     $(document).ready(function(){

      $('#refrigerator_boxes_type').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_refrigerator_boxes')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#refrigerator_boxes_type').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_refrigerator_boxes+'> '+json_data[i].type_refrigerator_boxes+' </option>';
                            $('#refrigerator_boxes_type').append(a);
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
