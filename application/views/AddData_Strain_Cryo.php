<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>


<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>




<!-- Horizontal Form -->
<br>
<div class="box-header with-border">
  <div class="col-md-6">
    <h3 class="box-title">Add Data Strain (<?php echo $jenis; ?>)</h3>
  </div>

  <div class="col-md-6">
    <span class="pull-right">
      <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>
    </span>
  </div>
</div>


<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" id="data" method="post" enctype="multipart/form-data">
  <input type="hidden" id = "idStrain" value="<?php echo $jenis; ?>" name="id"/> 

  <div class="box-body">

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Global Id : </label>
      <div class="col-sm-6">
        <input maxlength = "9" type="text" class="form-control" placeholder = "UPMC11800" id = "Strain_Global_ID" name = "Strain_Global_ID">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Local Id : </label>
      <div class="col-sm-6">
        <input maxlength = "19" type="text" placeholder = "UPMC11800-00-00-00"class="form-control" id = "Main_Strain_Local_ID" name="Main_Strain_Local_ID">
      </div>
      <label for="" id = "errorLocalId" class="col-sm-1 control-label"></label>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Location : </label>
      <div class="col-sm-2">
        <select name = "Lokasi" id = "lokasi" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Canister : </label>
      <div class="col-sm-2">
        <select name = "Lokasi_CanisterLoadAjax" id = "Lokasi_CanisterLoadAjax" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Boxes : </label>
      <div class="col-sm-2">
        <select name = "Lokasi_BoxesLoadAjax" id = "Lokasi_BoxesLoadAjax" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Location Detail :  : </label>
      <div class="col-sm-2">
        <select name = "location_detail" id = "location_detail" class="form-control">
        </select>
      </div>
      <label for="" id = "errordetect" class="col-sm-1 control-label"></label>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Summary Location : </label>
      <div class="col-sm-2">
        <h5 id = "sumLokasiCryo"></h5>
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
        <input type="text" placeholder="year" class="form-control" id = "datepicker" name="year">
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
        <select name = "Depository_Status" id = "Depository_Status" class="form-control">
          <option value = "" selected>Please select</option>
          <option value = "Save" id = "saveDepo">Save Depo</option>
          <option value = "Public" id = "public_Depo">Public Depo</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Price : </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id = "Price" name="Price">
      </div>
    </div>



    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <label> 
          <input type="submit" class="btn btn-primary" id = "btnSubmitCryo"value="Save" /> 
        </label>
      </div>
    </div>

  </div>
</form>
<!-- /.box -->

<script type="text/javascript">

$('#Depository_Status').on('change', function() {

  var a = $( "#Depository_Status option:selected" ).val();

  if (a == 'Save') {
    $('#Price').prop("readonly", true);
  }else if (a == 'Public') {          
    $('#Price').prop("readonly", false);
  };

})

</script>

<script>
$(document).ready(function () {

  var itik = $('#idStrain').val();

  $('#butangBack').unbind('click').click(function () {
    $.ajax({
      url : "<?php echo site_url('bacteria/index/')?>/"+itik,
      success: function (result) {
        $('#haha').empty().html(result).fadeIn('slow');
      }});
  })
})
</script>



<script type="text/javascript">

$(document).ready(function(){

  $('#Lokasi_CanisterLoadAjax').on('change', function() {

    var selboxes = $("select#Lokasi_BoxesLoadAjax").val() || "";
    var sellokasi = $("select#location_detail").val() || "";

    if (selboxes != "" && sellokasi != "") {

      $('#errordetect').empty();

      var a = $( "#Lokasi_CanisterLoadAjax option:selected" ).text();
      var b = $( "#Lokasi_BoxesLoadAjax option:selected" ).text();
      var c = $( "#location_detail option:selected" ).text();

      var haruan = 'C-T1-'+a+'-'+b+'-'+c;

      $('#sumLokasiCryo').empty().append(haruan);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility')?>/",
        type: "POST",
        data: {
          "canister" : a,
          "boxes" : b,
          "location" : c
        },    
        success: function(data)
        {
          if (data == 1)
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
            $("#btnSubmitCryo").prop("disabled", true);
          }
          else
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
            $("#btnSubmitCryo").removeAttr('disabled');
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    } else {
     // alert('c');
   }




 })

})

</script>


<script type="text/javascript">

$(document).ready(function(){

  $('#Lokasi_BoxesLoadAjax').on('change', function() {

    var selcanister = $("select#Lokasi_CanisterLoadAjax").val() || "";
    var sellokasi = $("select#location_detail").val() || "";

    if (selcanister != "" && sellokasi != "") {

      $('#errordetect').empty();

      var a = $( "#Lokasi_CanisterLoadAjax option:selected" ).text();
      var b = $( "#Lokasi_BoxesLoadAjax option:selected" ).text();
      var c = $( "#location_detail option:selected" ).text();

      var haruan = 'C-T1-'+a+'-'+b+'-'+c;

      $('#sumLokasiCryo').empty().append(haruan);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility')?>/",
        type: "POST",
        data: {
          "canister" : a,
          "boxes" : b,
          "location" : c
        },    
        success: function(data)
        {
          if (data == 1)
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
            $("#btnSubmitCryo").prop("disabled", true);
          }
          else
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
            $("#btnSubmitCryo").removeAttr('disabled');
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    } else {
     // alert('c');
   }




 })

})

</script>



<script type="text/javascript">

$(document).ready(function(){

  $('#location_detail').on('change', function() {

    var selcanister = $("select#Lokasi_CanisterLoadAjax").val() || "";
    var selboxes = $("select#Lokasi_BoxesLoadAjax").val() || "";

    if (selcanister != "" && selboxes != "") {

      $('#errordetect').empty();

      var a = $( "#Lokasi_CanisterLoadAjax option:selected" ).text();
      var b = $( "#Lokasi_BoxesLoadAjax option:selected" ).text();
      var c = this.value;

      var haruan = 'C-T1-'+a+'-'+b+'-'+c;

      $('#sumLokasiCryo').empty().append(haruan);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility')?>/",
        type: "POST",
        data: {
          "canister" : a,
          "boxes" : b,
          "location" : c
        },    
        success: function(data)
        {
          if (data == 1)
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
            $("#btnSubmitCryo").prop("disabled", true);
          }
          else
          {
            $("#errordetect").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
            $("#btnSubmitCryo").removeAttr('disabled');
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
        }
      });

    } else {
     // alert('c');
   }




 })

})

</script>




























<script type="text/javascript">

$("form#data").submit(function(){

  var formData = new FormData($(this)[0]);
  url = "<?php echo site_url('bacteria/test')?>";

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

      $('#lokasi').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_location')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = ""selected>Please select</option>';
          $('#lokasi').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].location+'> '+json_data[i].location+' </option>';
                            $('#lokasi').append(a);
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

      $('#Lokasi_CanisterLoadAjax').empty();          //kosong kan lokasi

      var data = 'canister1';

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/OnChange_Click_Location_Amek_Canister')?>/" + data,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = "" selected>Please select</option>';
          $('#Lokasi_CanisterLoadAjax').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].canister+'> '+json_data[i].canister+' </option>';
                            $('#Lokasi_CanisterLoadAjax').append(a);
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


      $('#Lokasi_BoxesLoadAjax').empty();          //kosong kan lokasi

      var data = 'boxes1';

      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/OnChange_Click_Location_Amek_Boxes')?>/" + data,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option value = "" selected>Please select</option>';
          $('#Lokasi_BoxesLoadAjax').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].boxes+'> '+json_data[i].boxes+' </option>';
                            $('#Lokasi_BoxesLoadAjax').append(a);
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

$('#location_detail').empty();          //kosong kan lokasi

var data = 'a1-a11-j1-j11';

$.ajax({
  url : "<?php echo site_url('Lokasi_controller/OnChange_Click_Location_Detail_Cryo')?>/"+data,
  type: "POST",
  dataType: "JSON",
  success: function(json_data)
  {

    var b = '<option value = "" selected>Please select</option>';
          $('#location_detail').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<option value = '+json_data[i].location_detail+'> '+json_data[i].location_detail+' </option>';
                            $('#location_detail').append(a);
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
  $('#datepicker').datepicker({
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


$('#Strain_Global_ID').change(function() {

  var itik = $('#idStrain').val();
  var Letter = itik.charAt(0).toUpperCase();
  $('#Main_Strain_Local_ID').val($(this).val()+Letter+'-');


});

$("#Strain_Global_ID").focus();

$("#Main_Strain_Local_ID").keydown(function(){

  if ( $(this).val().length > 12 && $(this).val().length < 14) {
    $(this).val($(this).val()+'-');
  };

  if ( $(this).val().length > 15 && $(this).val().length < 17) {
    $(this).val($(this).val()+'-');
  };
  
});


</script>


<script type="text/javascript">

$('#Main_Strain_Local_ID').change(function() {

  $('#errorLocalId').empty();
  var chuppy = $('#Main_Strain_Local_ID').val();

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
        $("#errorLocalId").empty().append('<img src="<?php echo base_url('images/cancel.png'); ?>">');
        $("#btnSubmitCryo").prop("disabled", true);
      }
      else
      {
        $("#errorLocalId").empty().append('<img src="<?php echo base_url('images/tick.png'); ?>">');
        $("#btnSubmitCryo").removeAttr('disabled');
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

$('form#data').on('keyup keypress', function(e) {
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