
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">


<style type="text/css">
  #tableDataMatrix td:hover {
    background-color: #e0e0d1;
    cursor: pointer;
  }
</style>

<!-- 
<script type="text/javascript">
  
var canister = "<?php echo $canister; ?>";
var boxes = "<?php echo $boxes; ?>";

if (canister == '') {
  alert(boxes);
}else{
  alert(boxes);
}

</script>

 -->

<div class="row">

	<div class="col-md-2">

		<h4>Choose Canister :</h4>
		<br>

		<div class="input-group">
			<select class="form-control" id="Canister_Being_Chosen" name="Canister_Being_Chosen">
			</select>
		</div>

		<br>
	</div>

	<div class="col-md-2">

		<h4 class = "h4canister">Choose Boxes : </h4>
		<br>

		<div class="input-group">
      <select class="form-control" id="Boxes_Being_Chosen" name="Boxes_Being_Chosen">
      </select>
    </div>

    <br>
  </div>



  <div class="col-md-4">
    <br><br>
    <h4 id = "TextOfSummaryLocation"></h4>
  </div>



  <br>
  <div class="col-md-12">


    <br>
    <table id="tableDataMatrix" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th></th>
          <th style="text-align:center;">1</th>
          <th style="text-align:center;">2</th>
          <th style="text-align:center;">3</th>
          <th style="text-align:center;">4</th>
          <th style="text-align:center;">5</th>
          <th style="text-align:center;">6</th>
          <th style="text-align:center;">7</th>
          <th style="text-align:center;">8</th>
          <th style="text-align:center;">9</th>
          <th style="text-align:center;">10</th>
          <th style="text-align:center;">11</th>
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

    $('#Boxes_Being_Chosen').on('change', function() {

      var boxes = $("select#Boxes_Being_Chosen").val() || "";
      var canister = $("select#Canister_Being_Chosen").val() || "";

    if (boxes != "" && canister != "") { // jika dua2,x kosong

      $('#TextOfSummaryLocation').empty();

      var pilihanCanister = $('#Canister_Being_Chosen').find('option:selected').val();
      var pilihanBox = $('#Boxes_Being_Chosen').find('option:selected').val();

      if (pilihanCanister && pilihanBox == '')
      {
      //alert("Please select");
      $('#TextOfSummaryLocation').empty();

    }else{

      var xyz = 'Summary Location : C-T1-'+pilihanCanister+'-'+pilihanBox;
      $('#TextOfSummaryLocation').empty().append(xyz).fadeIn('slow');

    }
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix')?>/",
      type: "POST",
      data: {
        "pilihanCanister" : pilihanCanister,
        "pilihanBox" : pilihanBox
      },
      success: function(output)
      {
       datatable_DataMatrix(output);
      },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
    }
  });

  }

});

})

</script>



<script type="text/javascript">

  $(document).ready(function(){

    $('#Canister_Being_Chosen').on('change', function() {

      var boxes = $("select#Boxes_Being_Chosen").val() || "";
      var canister = $("select#Canister_Being_Chosen").val() || "";

      if (boxes != "" && canister != "") {

        $('#TextOfSummaryLocation').empty();

        var pilihanCanister = $('#Canister_Being_Chosen').find('option:selected').val();
        var pilihanBox = $('#Boxes_Being_Chosen').find('option:selected').val();
      // alert(pilihanBox);
     //  alert(pilihanCanister);
     if (pilihanCanister && pilihanBox == '')
     {
      //alert("Please select");
      $('#TextOfSummaryLocation').empty();

    }else{

      var xyz = 'Summary Location : C-T1-'+pilihanCanister+'-'+pilihanBox;

      $('#TextOfSummaryLocation').empty().append(xyz).fadeIn('slow');

    }
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix')?>/",
      type: "POST",
      data: {
        "pilihanCanister" : pilihanCanister,
        "pilihanBox" : pilihanBox
      },
       // dataType: "JSON",

       success: function(output)
       {
       datatable_DataMatrix(output);
},
error: function (jqXHR, textStatus, errorThrown)
{
  alert('Error adding / update data');
}
});

  }

});

})

</script>



<script type="text/javascript">

     //nie utk dropdown location 
     $(document).ready(function(){

      var selectedText = 'canister1';

      $('#Canister_Being_Chosen').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Data_Matrix/list_Canister_Dalam_Type_Canister/')?>/"+selectedText,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="">None</option>';
          $('#Canister_Being_Chosen').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].canister =='<?php echo $canister; ?>'){
              select = 'selected';
            }
                            var a = '<option value = "'+json_data[i].canister+'" '+select+'> '+json_data[i].canister+' </option>';
                            $('#Canister_Being_Chosen').append(a);
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

     //nie utk dropdown location 
     $(document).ready(function(){

      var selectedBoxes = 'boxes1';

      $('#Boxes_Being_Chosen').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Data_Matrix/list_Boxes_Dalam_Type_Boxes/')?>/"+selectedBoxes,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value="">None</option>';
          $('#Boxes_Being_Chosen').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].boxes =='<?php echo $boxes; ?>'){
              select = 'selected';
            }

                            var a = '<option value = "'+json_data[i].boxes+'" '+select+'> '+json_data[i].boxes+' </option>';
                            $('#Boxes_Being_Chosen').append(a);
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

  function datatable_DataMatrix(output)
  {


  //datatables
  table = $('#tableDataMatrix').DataTable({ 

    "bDestroy": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "aaSorting": [[ 0, "desc" ]],
       "aaSorting": [[ 1, "desc" ]],
        "aaSorting": [[ 2, "desc" ]],
        "aaSorting": [[ 3, "desc" ]],    
       "aaSorting": [[ 4, "desc" ]],
       "aaSorting": [[ 5, "desc" ]],
       "aaSorting": [[ 6, "desc" ]],
        "scrollX": true,
   // "bAutoWidth": false, // Disable the auto width calculation 

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url('Data_Matrix/LoadDataMatrix_Tank1')?>/",
          "type": "POST",
        },



        //Set column definition initialisation properties.
        "columnDefs": [
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
           "sWidth":"160px",
          "targets": [ 5 ], //last column
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
          "targets": [ 9 ], //last column
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
          "targets": [ 10 ], //last column
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
          "targets": [ 8 ], //last column
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
          "targets": [ 7 ], //last column
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
          "targets": [ 6 ], //last column
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
          "targets": [ 11 ], //last column
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
                       "sWidth":"10px",

          "targets": [ 0 ], //last column

          },

],

});
}

</script>












<script type="text/javascript">

  var table = $('#tableDataMatrix').DataTable();

  $('#tableDataMatrix tbody').on( 'click', 'td', function () {

  var idx = table.cell( this ).index().column; //name column cth 1
        var title = table.column( idx ).header(); // nie object
        var row = $(this).parent().find('td').html().trim(); //nie row cth A

        var data = $(this).text(); //data dlm cell cth UPMC123
       //var data = output.trim(); //nak trim space

       var location = row.concat(idx);
      //  var location_detail = location.trim();

      var canister = $('#Canister_Being_Chosen').find('option:selected').val();
      var boxes = $('#Boxes_Being_Chosen').find('option:selected').val();




      if (data == ''){
        Redirect_AddStrain(canister, boxes, location);
      }else{
        AjaxSendCryo(data,canister,boxes,location);
      }




    } );


</script>

<!-- 
<script type="text/javascript">

  jQuery(document).ready(function() {
    jQuery('#tableDataMatrix').
    on('mouseover', 'td', function() {
         // jQuery(this).find('span:first').show();
        var data = jQuery(this).text(); //data dlm cell cth UPMC123
         //alert(data);
         if (data == '') {

         }else{

          $.ajax({
            url : "<?php echo site_url('Data_Matrix/CompareNewDataCryo/')?>/"+data,
            type: "POST",
            context: this, //utk bind $(this)
            data: {
              "data" : data
            },        
            success: function(output)
            {
              if (output =='1') {
                $(this).css("background-color" , 'yellow');
              };
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
          });


        }
      })
  }); 
</script>



 -->

<script type="text/javascript">

  function AjaxSendCryo(data,canister,boxes,location)
  {
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/list_Bacteria_From_Matrix_Cryo/')?>",
      type: "POST",
      data: {
        "localid" : data,
        "canister" : canister,
        "boxes" : boxes,
        "location" : location
      },
      //  dataType: "json",
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



  function Redirect_AddStrain(canister, boxes, location)
  {
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/RedirectTo_AddStrain_Cryo/')?>",
      type: "POST",
      data: { 
        "canister" : canister,
        "boxes" : boxes,
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

  $(document).ready(function(){

    $('#Boxes_Being_Chosen').on('change', function() {

      var boxes = $("select#Boxes_Being_Chosen").val() || "";
      var canister = $("select#Canister_Being_Chosen").val() || "";

    if (boxes != "" && canister != "") { // jika dua2,x kosong

      $('#TextOfSummaryLocation').empty();

      var pilihanCanister = $('#Canister_Being_Chosen').find('option:selected').val();
      var pilihanBox = $('#Boxes_Being_Chosen').find('option:selected').val();

      if (pilihanCanister && pilihanBox == '')
      {
      //alert("Please select");
      $('#TextOfSummaryLocation').empty();

    }else{

      var xyz = 'Summary Location : C-T1-'+pilihanCanister+'-'+pilihanBox;
      $('#TextOfSummaryLocation').empty().append(xyz).fadeIn('slow');

    }
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix')?>/",
      type: "POST",
      data: {
        "pilihanCanister" : pilihanCanister,
        "pilihanBox" : pilihanBox
      },
      success: function(output)
      {
       datatable_DataMatrix(output);
      },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
    }
  });

  }

});

})

</script>



<script type="text/javascript">

$(function(){
   yourfunction();
});

function yourfunction(){

  var canister = "<?php echo $canister; ?>";
  var boxes = "<?php echo $boxes; ?>";

    if (boxes != "" && canister != "") { // jika dua2,x kosong

      $('#TextOfSummaryLocation').empty();

      if (canister && boxes == '')
      {
      //alert("Please select");
      $('#TextOfSummaryLocation').empty();

    }else{

      var xyz = 'Summary Location : C-T1-'+canister+'-'+boxes;
      $('#TextOfSummaryLocation').empty().append(xyz).fadeIn('slow');

    }
    $.ajax({
      url : "<?php echo site_url('Data_Matrix/Create_Table_Matrix')?>/",
      type: "POST",
      data: {
        "pilihanCanister" : canister,
        "pilihanBox" : boxes
      },
      success: function(output)
      {
       datatable_DataMatrix(output);
      },
     error: function (jqXHR, textStatus, errorThrown)
     {
      alert('Error adding / update data');
    }
  });

  }



}

</script>