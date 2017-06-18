
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
   

<style type="text/css">

th {
  white-space: nowrap;
} 

</style>

<style type="text/css">
#tableDataMatrixRefri td:hover {
  background-color: #e0e0d1;
    cursor: pointer;
}
</style>

<div class="row">

	<div class="col-md-12">

		<h4>Choose Row :</h4>
		<br>

		<div class="input-group">
			<select class="form-control" id="Row_Being_Chosen" name="Row_Being_Chosen">
			</select>
		</div>

		<br>


	</div>


  <div class="col-md-12">
    <h4 id = "TextOfSummaryLocationFreeze"></h4>
  </div>



  <br>
  <div class="col-md-10">


    <br>
    <table id="tableDataMatrixRefri" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th></th>
          <th style="text-align:center;">1</th>
          <th style="text-align:center;">2</th>
          <th style="text-align:center;">3</th>
          <th style="text-align:center;">4</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>


</div>


<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
 


<script type="text/javascript">

$(document).ready(function(){

  $('#Row_Being_Chosen').on('change', function() {

    $('#TextOfSummaryLocationFreeze').empty();

    var pilihanRow = $('#Row_Being_Chosen').find('option:selected').val();


    if (pilihanRow == 'none')
    {
      //alert("Please select");
      $('#TextOfSummaryLocationFreeze').empty();

    }else{

      var ayam = 'Summary Location : F-RG1-'+pilihanRow;

      $('#TextOfSummaryLocationFreeze').empty().append(ayam).fadeIn('slow');

    }
    
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix_Refri')?>/",
      type: "POST",
      data: {
        "pilihanRow" : pilihanRow
      },
       // dataType: "JSON",

       success: function(output)
       {
         datatable_DataMatrix_Refri(output);
},
error: function (jqXHR, textStatus, errorThrown)
{
  alert('Error adding / update data');
}
});

  });

})

</script>




<script type="text/javascript">

     //nie utk dropdown location 
     $(document).ready(function(){

      var selectedText = 'row';

      $('#Row_Being_Chosen').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Data_Matrix/list_Row/')?>/"+selectedText,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="none">None</option>';
          $('#Row_Being_Chosen').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].row =='<?php echo $row; ?>'){
              select = 'selected';
            }

                            var a = '<option value = "'+json_data[i].row+'" '+select+'> '+json_data[i].row+' </option>';
                            $('#Row_Being_Chosen').append(a);
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


function datatable_DataMatrix_Refri(output)
{


  //datatables
  table = $('#tableDataMatrixRefri').DataTable({ 

    "bDestroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
            "aaSorting": [[ 0, "desc" ]],
    "aaSorting": [[ 1, "desc" ]],
        "aaSorting": [[ 2, "desc" ]],
        "aaSorting": [[ 3, "desc" ]],
    "iDisplayLength": 25,

        "ajax": {
          "url": "<?php echo site_url('Data_Matrix/LoadDataMatrix_Refri')?>/",
          "type": "POST",
                //  "aaSorting": [[ 0, 'asc' ]],
                 // "aaSorting": [[ 1, 'asc' ]],   
               },



        //Set column definition initialisation properties.
        "columnDefs": [
        { 
           "sWidth":"160px",
          "targets": [ 1 ], //last column
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                               
          var n = sData.indexOf("link");
          var p = sData.indexOf("</but");
          var res = sData.substring(n+6,n+25);

                 if (res == output.replace(/\"/g, "")) {

                   $(nTd).css('background-color', '#ffff4d').css('color', '#000000').css('font-weight', 'bld'); 

                 };
          }
         },

         { 
           "sWidth":"160px",
          "targets": [ 2 ], //last column
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                               
          var n = sData.indexOf("link");
          var p = sData.indexOf("</but");
          var res = sData.substring(n+6,n+25);

                 if (res == output.replace(/\"/g, "")) {

                   $(nTd).css('background-color', '#ffff4d').css('color', '#000000').css('font-weight', 'bld'); 

                 };
          }
         },

         { 
           "sWidth":"160px",
          "targets": [ 3 ], //last column
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                               
          var n = sData.indexOf("link");
          var p = sData.indexOf("</but");
          var res = sData.substring(n+6,n+25);

                 if (res == output.replace(/\"/g, "")) {

                   $(nTd).css('background-color', '#ffff4d').css('color', '#000000').css('font-weight', 'bld'); 

                 };
          }
         },

         { 
           "sWidth":"160px",
          "targets": [ 4 ], //last column
          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                               
          var n = sData.indexOf("link");
          var p = sData.indexOf("</but");
          var res = sData.substring(n+6,n+25);

                 if (res == output.replace(/\"/g, "")) {

                   $(nTd).css('background-color', '#ffff4d').css('color', '#000000').css('font-weight', 'bld'); 

                 };
          }
         },


          { 
                       "sWidth":"3px",

          "targets": [ 0 ], //last column

          },

],

     });
}

</script>




<script type="text/javascript">

var table = $('#tableDataMatrixRefri').DataTable();

$('#tableDataMatrixRefri tbody').on( 'click', 'td', function () {

        var idx = table.cell( this ).index().column; //name column cth 1
        var title = table.column( idx ).header(); // nie object
        var row = $(this).parent().find('td').html().trim(); //nie row cth A

        var output = $(this).text(); //data dlm cell cth UPMC123
       var data = output.trim(); //nak trim space

       var location = row.concat(idx);
      //  var location_detail = location.trim();

      var pilihanRow = $('#Row_Being_Chosen').find('option:selected').val();
       // var Row_Being_Chosen = pilihanRow.trim();

       if (data == ''){
        Redirect_AddStrain(pilihanRow, location);
       }else{
        AjaxSendFreeze(data,pilihanRow,location);
      }






    } );

</script>



<script type="text/javascript">

function AjaxSendFreeze(data,row,location)
{
  $.ajax({
    url : "<?php echo site_url('Data_Matrix/list_Bacteria_From_Matrix_Freeze/')?>",
    type: "POST",
    data: {
      "localid" : data,
      "row" : row,
      "location" : location
    },
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

function Redirect_AddStrain(row, location)
{
  $.ajax({
    url : "<?php echo site_url('Data_Matrix/RedirectTo_AddStrain_Freeze/')?>",
    type: "POST",
    data: { 
      "row" : row,
      "location" : location
    },
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













<script type="text/javascript">

$(function(){
   yourfunction();
});


function yourfunction(){

  var row = "<?php echo $row; ?>";

    if (row != "") { // jika dua2,x kosong

      $('#TextOfSummaryLocationFreeze').empty();

      if (row == '')
      {
      //alert("Please select");
      $('#TextOfSummaryLocationFreeze').empty();

    }else{

      var xyz = 'Summary Location : F-RG1-'+row;
      $('#TextOfSummaryLocationFreeze').empty().append(xyz).fadeIn('slow');

    }
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix_Refri')?>/",
      type: "POST",
      data: {
        "pilihanRow" : row
      },
       success: function(output)
       {
         datatable_DataMatrix_Refri(output);
},
error: function (jqXHR, textStatus, errorThrown)
{
  alert('Error adding / update data');
}
});

  }



}

</script>