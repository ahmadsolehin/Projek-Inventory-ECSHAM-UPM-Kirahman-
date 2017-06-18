<!DOCTYPE html>
<html>
<head> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

</head> 
<body>

  <button class="btn btn-success" id="tekan"><i class="glyphicon glyphicon-plus"></i> Add Data Strain</button>
  <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
  <br />
  <br />

  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Genus</th>
        <th>Species</th>
        <th>Subspecies</th>
        <th>Global Id</th>
        <th>Local Id</th>
        <th>Depository Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>


  </table>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>


  <script type="text/javascript">

  $('#tekan').click(function(){
    $.ajax({
      url : "<?php echo site_url('bacteria/Load_Add_Data_Strain')?>/"+jenis_strain,
      type: "POST",
     // dataType: "JSON",
     success: function(result)
     {
       $('#haha').empty().html(result).fadeIn('slow');
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
    }
  });

  })

   </script>







   <script type="text/javascript">

   var jenis_strain = "<?php echo $jenis; ?>";        //amek dari nav bar bile klik
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
      table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
    //"bSort": false,
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('bacteria/ajax_list')?>/" + jenis_strain,
          "type": "POST",
        },


        "aoColumns" : [         //adjust width datatable
        { "sWidth": "5%","bSearchable": true},
        { "sWidth": "5%", "bSearchable": true},
        { "sWidth": "6%", "bSearchable": true},
        { "sWidth": "6%", "bSearchable": true},
        { "sWidth": "12%", "bSearchable": true},
        { "sWidth": "3%", "bSearchable": true},
        { "sWidth": "15%"},
        ],

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": true, //set not orderable
        },

        { 
                   //    "sWidth":"160px",
          "targets": [ 1 ], //last column
                   "orderable": true, //set not orderable

          },
        ],

      });
    });

    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax 
  }


  function edit_bacteria(id)
  {
    $.ajax({
      url : "<?php echo site_url('bacteria/ajax_edit_Baru/')?>/"+id+'/'+jenis_strain,
      type: "GET",
        //dataType: "json",
        success: function(result)
        {
         $('#haha').empty().html(result).fadeIn('slow');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
        alert('Error get data from ajax');
      }
    });
  }

  function testImage()
  {

    var file_data = $('#image').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //  alert(form_data);  

    console.log(form_data);
      //alert(JSON.stringify(form_data));
      url = "<?php echo site_url('bacteria/testImage')?>";

      $.ajax({
                url: url, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                async:false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(json_data){
                  alert(json_data);
               //   save(output_string);
             }
           });
    //  alert(output_string);


  }
  

  function delete_bacteria(id)
  {
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('bacteria/ajax_delete')?>/"+id+'/'+jenis_strain,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
               //if success reload ajax table
               reload_table();
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
              alert('Error adding / update data');
            }
          });
        
      }
    }

    function view_bacteria(id)
    {

   // $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('bacteria/list_Bacteria_by_id/')?>/"+id+'/'+jenis_strain,
        type: "GET",
        //dataType: "json",
        success: function(result)
        {
         $('#haha').empty().html(result).fadeIn('slow');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
        alert('Error get data from ajax');
      }
    });
    }



    </script>








<style>
tbody tr:first-child  td{ 
background-color: yellow;}
</style>


  </body>
  </html>






  <script type="text/javascript">
  $(document).ready(function() {
    $('.form-body').find('input:first').focus();


    $('.form-control').bind("keydown", function(e) {
     var n = $(".form-control").length;
     if (e.which == 13) 
   { //Enter key
     e.preventDefault(); //to skip default behavior of the enter key
     var nextIndex = $('.form-control').index(this) + 1;
     if(nextIndex < n)
       $('.form-control')[nextIndex].focus();
     else
     {
       $('.form-control')[nextIndex-1].blur();
       $('#btnSubmit').click();
     }
   }
 });

    $('#btnSubmit').click(function() {
      alert('Form Submitted');
    });
  });
  </script>

