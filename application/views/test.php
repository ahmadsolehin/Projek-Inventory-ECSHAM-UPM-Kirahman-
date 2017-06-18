
<div class="row">


  <div class="col-md-4">
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


</br>
</br>




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


<div class="col-md-8">
<br><br>

<h4>Choose Canister :</h4>
<br>

<div class="input-group">
  <select class="form-control" id="SpaceAccommodation" name="YogaSpaceAccommodation">
  </select>
</div>

<br>


<div class="linkinpark">
 <table id="tableCanister" class="table table-striped table-bordered" cellspacing="0" width="100%">
  </table>
</div>

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

            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_canister+'</td><td><a class="btn btn-warning btn-sm"  onclick = "aswadNasron('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocation('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
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
      $('#form_location_add_canister')[0].reset(); // reset form on modals
      $('#modal_form_location_add_canister').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add New Location Canister'); // Set Title to Bootstrap modal title
    }

         function save_location_add_canister()

    {


    $('#btnSaveLocationAdd_Canister').text('saving...'); //change button text
    $('#btnSaveLocationAdd_Canister').attr('disabled',true); //set button disable 

    
    url = "<?php echo site_url('Lokasi_controller/add_location_canister')?>";
    

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

            var angsa = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_boxes+'</td><td><a class="btn btn-warning btn-sm"  onclick = "editCanistersssssssss('+json_data[i].id+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>     <a class="btn btn-danger btn-sm"  onclick="DeleteLocationdsss('+json_data[i].id+')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
            $('.tab_location_boxes').append(angsa);
          }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    })




     function editBoxes(id)
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
      $('#modal_form_location_canister').modal('show'); // show bootstrap modal


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
    }
  });


          }


          </script>

<script type="text/javascript">

$('#SpaceAccommodation').change(function () {

  var tableNakAppend = '<thead><tr><th class="col-md-2">Code</th><th class="col-md-2">Canister</th><th class="col-md-2">Action</th></tr></thead><tbody></tbody>';

            $('#tableCanister').empty().append(tableNakAppend);

    var selectedText = $(this).find("option:selected").val();

    if(selectedText == "none")
    {
    }else
    {
          datatable_Canister(selectedText);
    }



    
});

</script>







<script type="text/javascript">

     //nie utk dropdown location 
     $(document).ready(function(){

      $('#SpaceAccommodation').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/list_all_location_canister')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#SpaceAccommodation').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_canister+'> '+json_data[i].type_canister+' </option>';
                            $('#SpaceAccommodation').append(a);
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

function datatable_Canister(canister)
{


  //datatables
    table = $('#tableCanister').DataTable({
 
        "bDestroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
      //  "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Lokasi_controller/datatable_listing_data_in_canister')?>/" + canister,
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
}

function papar_Canister_Data()
{
  alert("kt");
           $('#linkinpark').empty().html("dw").fadeIn('slow');

}

</script>