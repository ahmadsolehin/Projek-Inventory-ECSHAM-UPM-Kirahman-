<div class = "row">

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



<div class="col-md-6">
</br>
</br>
<button class="btn btn-success" onclick="add_location_boxes()"><i class="glyphicon glyphicon-plus"></i> Add Location Boxes</button>

</br>
</br>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Code</th>
      <th>Type Boxes</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class = "tab_location_boxes"></tbody>
</table>
</div>

</div>
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

            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_canister+'</td><td><a class="btn btn-warning btn-sm"  onclick = "UbahNamaCanister('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation_Canister_Data('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> <a class="btn btn-default btn-sm"  onclick="aswadNasron('+json_data[i].id+')" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a> </td></tr>';
            $('.tab_location_canister').append(a);
          }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

})


function add_location_canister()
{
      save_method = 'add';
      $('#form_location_add_canister')[0].reset(); // reset form on modals
      $('#modal_form_location_add_canister').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location Canister'); // Set Title to Bootstrap modal title
    }

    function save_location_add_canister()
    {
      $('#btnSaveLocationAdd_Canister').text('saving...'); //change button text
      $('#btnSaveLocationAdd_Canister').attr('disabled',true); //set button disable 

      var ayam;

      if(save_method == 'add') {
        ayam = "<?php echo site_url('Lokasi_controller/add_location_canister')?>";
      } else {
        ayam = "<?php echo site_url('Lokasi_controller/Update_Location_Canister_Data')?>";
      }

    

      // ajax adding data to database
      $.ajax({
        url : ayam,
        type: "POST",
        data: $('#form_location_add_canister').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               //if success close modal and reload ajax table
               $('#modal_form_location_add_canister').modal('hide');
               $('#btnSaveLocationAdd_Canister').text('save'); //change button text
               $('#btnSaveLocationAdd_Canister').attr('disabled',false); //set button enable 
              // list_allLocation();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
                $('#btnSaveLocationAdd_Canister').text('save'); //change button text
                $('#btnSaveLocationAdd_Canister').attr('disabled',false); //set button enable 
              }
            });
    }

    function UbahNamaCanister(id)
    {
      save_method = 'update';
    $('#form_location_add_canister')[0].reset(); // reset form on modals
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Lokasi_controller/Edit_Location_Canister_Data/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="canister_name"]').val(data.type_canister);
            $('#modal_form_location_add_canister').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Canister Name'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function DeleteLocation_Canister_Data(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('Lokasi_controller/Delete_Location_Canister_Data')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function()
          {
               //if success reload ajax table
             //  $('#modal_form').modal('hide');
               //reload_table();
            //   list_allLocation();

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error adding / update data');
          }
        });
        
      }
    }


    

    </script>


    <!-- Bootstrap modal form location-->
    <div class="modal fade" id="UstazAswadNasron" role="dialog">
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
            <tbody class = "table_Canister"></tbody>
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

  function aswadNasron (id)
  {
    editCanisterUstazAswadNasron(id);
  }

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
            <input type="hidden" value="" name="id"/>

            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">Location Canister Name</label>
                <div class="col-md-6">
                  <input name="canister_name" placeholder="Enter name" class="form-control" type="text">
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSaveLocationAdd_Canister" onclick="save_location_add_canister()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->









    <script type="text/javascript">

    function editCanisterUstazAswadNasron(id)
    {
            $('.table_Canister').empty();          //kosong kan lokasi

            $.ajax({
              url : "<?php echo site_url('Lokasi_controller/list_Canister')?>/"+id,
              type: "GET",
              dataType: "JSON",
              success: function(json_data)
              {
                for (var i = 0; i < json_data.length; i++) {

                  var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].canister+'</td><td>'+json_data[i].quantity+'</td><td><a class="btn btn-warning btn-sm"  onclick = "editCanisterType('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
                  $('.table_Canister').append(a);
                }
       $('.modal-title').text('Canister'); // Set Title to Bootstrap modal title
      $('#UstazAswadNasron').modal('show'); // show bootstrap modal
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
    }
  });


}


</script>


























<script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

      $('.tab_location_boxes').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_boxes')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

            var angsa = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_boxes+'</td><td><a class="btn btn-warning btn-sm"  onclick = "editCanistersssssssss('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocationdsss('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> <a class="btn btn-default btn-sm"  onclick="aswadNasron('+json_data[i].id+')" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>  </td></tr>';
            $('.tab_location_boxes').append(angsa);
          }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    })

</script>