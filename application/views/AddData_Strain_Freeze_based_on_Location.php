
<script type="text/javascript">

$(document).ready(function(){
    $(this).scrollTop(0);
});

</script>


  <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>


<!-- Horizontal Form -->
<br>
<div class="box-header with-border">
  <div class="col-md-6">
<label for="" class="col-sm-4 control-label">Add Data Strain</label>
      <div class="col-md-4">
        <select name = "Organism_Type" id = "Organism_Type" class="form-control">
        </select>
      </div> 

       </div>

  <div class="col-md-6">
    <span class="pull-right">
      <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>
    </span>
  </div>
</div>



<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" id="dataFreeze" method="post" enctype="multipart/form-data">
  <input type="hidden" id = "idStrain" value="" name="id"/> 

  <div class="box-body">

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Global Id : </label>
      <div class="col-sm-6">
        <input maxlength = "9" type="text" class="form-control" placeholder = "UPMC11800" id = "Strain_Global_ID_Freeze" name = "Strain_Global_ID">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Local Id : </label>
      <div class="col-sm-6">
        <input maxlength = "19" type="text" placeholder = "UPMC11800-00-00-00"class="form-control" id = "Main_Strain_Local_ID_Freeze" name="Main_Strain_Local_ID">
      </div>
      <label for="" id = "errorLocalId_Freeze" class="col-sm-1 control-label"></label>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Location : </label>
      <div class="col-sm-2">
        <select name = "Lokasi" id = "lokasi_freeze" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Row : </label>
      <div class="col-sm-2">
        <select name = "Lokasi_RowLoadAjax" id = "Lokasi_RowLoadAjax" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Location Detail : </label>
      <div class="col-sm-2">
        <select name = "location_detail" id = "location_detail_freeze" class="form-control">
        </select>
      </div>
      <label for="" id = "errordetectFreeze" class="col-sm-1 control-label"></label>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Summary Location : </label>
      <div class="col-sm-2">
        <h5 id = "sumLokasi"></h5>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Genus Name : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Genus_Name" name="Genus_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Species Name : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Species_Name" name="Species_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Subspecies Name : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Subspecies_Name" name="Subspecies_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Original Code : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Original_Code" name="Original_Code">
      </div>
    </div>



    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Method : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Sequence_Method" name="Sequence_Method">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Time : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Sequence_Time" name="Sequence_Time">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Author : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Author" name="Author">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Date of Isolation : </label>
      <div class="col-sm-2">
        <input type="text" placeholder="year" class="form-control" id = "datepicker_Freeze" name="year">
      </div>
      <div class="col-sm-2">
        <select name = "month" id = "" class="form-control">
          <option value = "" selected>month</option>
          <option value = "January" id = "">January</option>
          <option value = "February" id = "">February</option>
          <option value = "March" id = "">March</option>
          <option value = "April" id = "">April</option>
          <option value = "May" id = "">May</option>
          <option value = "June" id = "">June</option>
          <option value = "July" id = "">July</option>
          <option value = "August" id = "">August</option>
          <option value = "September" id = "">September</option>
          <option value = "October" id = "">October</option>
          <option value = "November" id = "">November</option>
          <option value = "December" id = "">December</option>
        </select>      
      </div>

      <div class="col-sm-2">
        <select name = "day" id = "" class="form-control">
          <option value = "" selected>day</option>
          <option value = "1" id = "">1</option>
          <option value = "2" id = "">2</option>
          <option value = "3" id = "">3</option>
          <option value = "4" id = "">4</option>
          <option value = "5" id = "">5</option>
          <option value = "6" id = "">6</option>
          <option value = "7" id = "">7</option>
          <option value = "8" id = "">8</option>
          <option value = "9" id = "">9</option>
          <option value = "10" id = "">10</option>
          <option value = "11" id = "">11</option>
          <option value = "12" id = "">12</option>
          <option value = "13" id = "">13</option>
          <option value = "14" id = "">14</option>
          <option value = "15" id = "">15</option>
          <option value = "16" id = "">16</option>
          <option value = "17" id = "">17</option>
          <option value = "18" id = "">18</option>
          <option value = "19" id = "">19</option>
          <option value = "20" id = "">20</option>
          <option value = "21" id = "">21</option>
          <option value = "22" id = "">22</option>
          <option value = "23" id = "">23</option>
          <option value = "24" id = "">24</option>
          <option value = "25" id = "">25</option>
          <option value = "26" id = "">26</option>
          <option value = "27" id = "">27</option>
          <option value = "28" id = "">28</option>
          <option value = "29" id = "">29</option>
          <option value = "30" id = "">30</option>
          <option value = "31" id = "">31</option>
        </select>       
      </div>

    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">History of Deposit : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="3" id = "History_of_Deposit" name = "History_of_Deposit"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Source of Isolation : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="2" name = "Source_of_Isolation"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Geographic Origin : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Geographic_Origin">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">GPS Coordinates : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder = "latitude" name="latitude">
      </div>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder = "longitude" id = "" name="longitude">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Status : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Status">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Type Strain : </label>
      <div class="col-sm-2">
        <select name = "Type_Strain" id = "Type_Strain" class="form-control">
          <option value = "" selected>Please select</option>
          <option value = "yes" id = "">Yes</option>
          <option value = "no" id = "">No</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Optimum Temp : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Optimum_Temp">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Maximum Temp : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Maximum_Temp">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Minimum Temp : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Minimum_Temp">
      </div>
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Literature : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Literature">
      </div>
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Application : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Application">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Image : </label>
      <div class="col-sm-6">
        <input type="file" class="form-control" id = "" name="userfile">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Description : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="4" id="" name = "Description"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Type : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Sequence_Type">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="15" id="comment" name = "Sequence"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Name : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Medium_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Composition : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="15" name = "Medium_Composition"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Length : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "" name="Sequence_Length">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Primer : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="4" name = "Primer"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Depository Status : </label>
      <div class="col-sm-2">
        <select name = "Depository_Status" id = "Depository_Status_Freeze" class="form-control">
          <option value = "" selected>Please select</option>
          <option value = "Save" id = "saveDepo">Save Depo</option>
          <option value = "Public" id = "public_Depo">Public Depo</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Price : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Price_Freeze" name="Price">
      </div>
    </div>



    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <label> 
                <input type="submit" class="btn btn-primary" id = "btnSubmitFreeze" value="Save" /> 
          </label>
      </div>
    </div>

  </div>
</form>
<!-- /.box -->

<script type="text/javascript">

$('#Depository_Status_Freeze').on('change', function() {

  var a = $( "#Depository_Status_Freeze option:selected" ).val();

  if (a == 'Save') {
    $('#Price_Freeze').prop("readonly", true);
  }else if (a == 'Public') {          
    $('#Price_Freeze').prop("readonly", false);
  };

})

</script>

<script>
$(document).ready(function () {

  $('#butangBack').unbind('click').click(function () {
    $.ajax({
      url : "<?php echo site_url('Lokasi_controller/Load_Data_Matrix_Refri')?>/",
      success: function (result) {
        $('#haha').empty().html(result).fadeIn('slow');
      }});
  })
})
</script>


<script type="text/javascript">

$(document).ready(function(){

  $('#Lokasi_RowLoadAjax').on('change', function() {

    var sellocation = $("select#location_detail_freeze").val() || "";

    if (sellocation != "") {

      $('#errordetectFreeze').empty();

   var a = $( "#Lokasi_RowLoadAjax option:selected" ).text();
   var b = $( "#location_detail_freeze option:selected" ).text();

   var harun = 'F-RG1-'+a+'-'+b;


   $('#sumLokasi').empty().append(harun);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility_Freeze')?>/",
        type: "POST",
        data: {
          "row" : a,
          "location" : b
        },    
        success: function(data)
        {
          if (data == 1)
          {
            $("#errordetectFreeze").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
            $("#btnSubmitFreeze").prop("disabled", true);
          }
          else
          {
            $("#errordetectFreeze").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
             $("#btnSubmitFreeze").removeAttr('disabled');
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    }


    

  })

})

</script>

<script type="text/javascript">

$(document).ready(function(){

  $('#location_detail_freeze').on('change', function() {

    var selRow = $("select#Lokasi_RowLoadAjax").val() || "";

    if (selRow != "") {

      $('#errordetectFreeze').empty();

   var a = $( "#Lokasi_RowLoadAjax option:selected" ).text();
   var b = $( "#location_detail_freeze option:selected" ).text();

   var harun = 'F-RG1-'+a+'-'+b;


   $('#sumLokasi').empty().append(harun);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility_Freeze')?>/",
        type: "POST",
        data: {
          "row" : a,
          "location" : b
        },    
        success: function(data)
        {
          if (data == 1)
          {
            $("#errordetectFreeze").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
            $("#btnSubmitFreeze").prop("disabled", true);
          }
          else
          {
            $("#errordetectFreeze").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
             $("#btnSubmitFreeze").removeAttr('disabled');
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    }


    

  })

})

</script>





























     
     <script type="text/javascript">

     $("form#dataFreeze").submit(function(){

      var formData = new FormData($(this)[0]);
      url = "<?php echo site_url('bacteria/Add_Data_To_Db_Freeze')?>";

      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        async: false,
        success: function (result) {

          var dialog = new BootstrapDialog.show({
            message: 'Data has been save..'
        });

        dialog.getModalHeader().css('color', '#fff');
        dialog.getModalHeader().css('background-color', '#337ab7');
        dialog.open();

          $('#haha').empty().html(result).fadeIn('slow');

        },
        cache: false,
        contentType: false,
        processData: false
      });

      return false;
     });



     </script>





<script type="text/javascript">


     //nie utk dropdown location 
     $(document).ready(function(){

      $('#lokasi_freeze').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = "" selected="selected">Please select</option>';
          $('#lokasi_freeze').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].location+'> '+json_data[i].location+' </option>';
                            $('#lokasi_freeze').append(a);
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


     $(document).ready(function(){

      $('#Lokasi_RowLoadAjax').empty();          //kosong kan lokasi

      var selectedText = 'row';

      $.ajax({
        url : "<?php echo site_url('Data_Matrix/list_Row/')?>/"+selectedText,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = "" selected="selected">Please select</option>';
          $('#Lokasi_RowLoadAjax').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].row=='<?php echo $row ?>'){
              select = 'selected';
            }

                            //alert(json_data[i].id);
                            var a = '<option value = "'+json_data[i].row+'" '+select+' > '+json_data[i].row+' </option>';
                            $('#Lokasi_RowLoadAjax').append(a);
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


$(document).ready(function(){

$('#location_detail_freeze').empty();          //kosong kan lokasi

var data = 'a1-a4-s1-s4';

$.ajax({
  url : "<?php echo site_url('Lokasi_controller/OnChange_Click_Location_Detail_Cryo')?>/"+data,
  type: "POST",
  dataType: "JSON",
  success: function(json_data)
  {

    var b = '<option value = "" selected="selected">Please select</option>';
          $('#location_detail_freeze').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].location_detail=='<?php echo $location ?>'){
              select = 'selected';
            }

                            //alert(json_data[i].id);
                            var a = '<option value = "'+json_data[i].location_detail+'" '+select+' > '+json_data[i].location_detail+' </option>';
                            $('#location_detail_freeze').append(a);
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


     $(document).ready(function(){

      $('#Organism_Type').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_type_Strain')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = "" selected>Please select</option>';
          $('#Organism_Type').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].type_strain+'> '+json_data[i].type_strain+' </option>';
                            $('#Organism_Type').append(a);
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

//datepicker
$(document).ready(function(){
  $('#datepicker_Freeze').datepicker({
    autoclose: true,
    format: "yyyy",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,  
    viewMode: "years", 
    minViewMode: "years",
  });

})


$('#Strain_Global_ID_Freeze').click(function() {

  var itik = $("select#Organism_Type").val();

  if (itik == '') {
    BootstrapDialog.alert('You need to select type of strain..');
  }
});

$('#Strain_Global_ID_Freeze').change(function() {

  var itik = $("select#Organism_Type").val();

  if (itik == '') {
            BootstrapDialog.alert('You need to select type of strain..');
  }else{
    var Letter = itik.charAt(0).toUpperCase();
    $('#Main_Strain_Local_ID_Freeze').val($(this).val()+Letter+'-');
    LoadSummaryLocation();
        $('#idStrain').val(itik);  
  }

});


$("#Main_Strain_Local_ID_Freeze").keydown(function(){

  if ( $(this).val().length > 12 && $(this).val().length < 14) {
    $(this).val($(this).val()+'-');
  };

  if ( $(this).val().length > 15 && $(this).val().length < 17) {
    $(this).val($(this).val()+'-');
  };
  
});

</script>


<script type="text/javascript">

$('#Main_Strain_Local_ID_Freeze').change(function() {

  $('#errorLocalId_Freeze').empty();
  var chuppy = $('#Main_Strain_Local_ID_Freeze').val();

  $.ajax({
    url : "<?php echo site_url('Lokasi_controller/checkAvaibility_LocalId')?>/",
    type: "POST",
    data: {
      "localid" : chuppy
    },    
    success: function(data)
    {
      if (data == 1)
      {
        $("#errorLocalId_Freeze").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
        $("#btnSubmitFreeze").prop("disabled", true);
      }
      else
      {
        $("#errorLocalId_Freeze").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
        $("#btnSubmitFreeze").removeAttr('disabled');
      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
    }
  });  
});

</script>










<script type="text/javascript">

function LoadSummaryLocation()
{

 var a = $( "#Lokasi_RowLoadAjax option:selected" ).text();
 var b = $( "#location_detail_freeze option:selected" ).text();

 var haruan = 'F-RG1-'+a+'-'+b;

 $('#sumLokasi').empty().append(haruan);

}

</script>













<script type="text/javascript">

$('form#dataFreeze').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

$('.form-control').keydown(function (e) {
 if (e.which === 13) {
   var index = $('.form-control').index(this) + 1;
   $('.form-control').eq(index).focus();
 }
});

</script>




