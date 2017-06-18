<!DOCTYPE html>
<html>
<head> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>

</head> 
<body>

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
        <th>Depo Status</th>
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

   var jenis_strain = "<?php echo $jenis; ?>";        //amek dari nav bar bile klik
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
      table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('user/bacteria/ajax_list')?>/" + jenis_strain,
          "type": "POST",
        },



        "aoColumns" : [         //adjust width datatable
        { "sWidth": "7%","bSearchable": true},
        { "sWidth": "7%", "bSearchable": true},
        { "sWidth": "9%", "bSearchable": true},
        { "sWidth": "6%", "bSearchable": true},
        { "sWidth": "12%", "bSearchable": true},
        { "sWidth": "6%", "bSearchable": true},
        { "sWidth": "10%"},
        ],

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": true, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function view_bacteria(id)
  {

    $.ajax({
      url : "<?php echo site_url('user/bacteria/list_Bacteria_by_id/')?>/"+id+'/'+jenis_strain,
      type: "GET",
        //dataType: "json",
        success: function(result)
        {
          if (result == 'save') {
            BootstrapDialog.alert('Please contact admin');
          }else{
           $('#haha').empty().html(result).fadeIn('slow');
         }
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
        alert('Error get data from ajax');
      }
    });
  }



  </script>

















</body>
</html>



