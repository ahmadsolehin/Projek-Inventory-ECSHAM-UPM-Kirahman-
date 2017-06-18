  <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>

<!-- Horizontal Form -->
<div class="box-header with-border">
  <div class="col-md-6">
    <h3 class="box-title">Edit Data Strain (<?php echo $jenis; ?>)</h3>
  </div>

  <div class="col-md-6">
    <span class="pull-right">
      <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>
    </span>
  </div>
</div>
<!-- /.box-header -->
<!-- form start -->

	<?php foreach ($output as $data): ?>

<form class="form-horizontal" id="dataFreeze" method="post" enctype="multipart/form-data">
  <input type="hidden" id = "jenis_Strain" value="<?php echo $jenis; ?>" name="id"/> 
    <input type="hidden" value="<?php echo $id; ?>" name="idStrain"/> 
    <input type="hidden" value="<?php echo $data->Image ?>" name="namaImage"/> 
   
  <div class="box-body">

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Global Id : </label>

      <div class="col-sm-6">
        <input maxlength = "9" type="text" class="form-control" value = "<?php echo $data->Strain_Global_ID ?>" id = "Strain_Global_ID" name = "Strain_Global_ID">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Local Id : </label>
      <div class="col-sm-6">
        <input maxlength = "19" type="text" value = "<?php echo $data->Main_Strain_Local_ID ?>" class="form-control" id = "Main_Strain_Local_ID" name="Main_Strain_Local_ID">
      </div>
      <label for="" id = "errorLocalId" class="col-sm-1 control-label"></label>
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
        <h5 id = "sumLokasi"><?php echo $data->Summary_Lokasi; ?></h5>
      </div>
    </div>

    <div class="form-group">
       <label for="" class="col-sm-2 control-label">Genus Name : </label>
       <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Genus_Name ?>" class="form-control" id = "Genus_Name" name="Genus_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Species Name : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Species_Name ?>" class="form-control" id = "Species_Name" name="Species_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Subspecies Name : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Subspecies_Name ?>" class="form-control" id = "Subspecies_Name" name="Subspecies_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Original Code : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Original_Code ?>"class="form-control" id = "Original_Code" name="Original_Code">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Method : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Sequence_Method ?>" class="form-control" id = "Sequence_Method" name="Sequence_Method">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Time : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Sequence_Time ?>"class="form-control" id = "Sequence_Time" name="Sequence_Time">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Author : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Author ?>"class="form-control" id = "Author" name="Author">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Date of Isolation : </label>
      <div class="col-sm-2">
        <input type="text" value = "<?php echo $data->year; ?> "placeholder="year" class="form-control" id = "datepicker" name="year">
      </div>
      <div class="col-sm-2">
        <select name = "month" id = "month" class="form-control">
        </select>      
      </div>
      <div class="col-sm-2">
        <select name = "day" id = "day" class="form-control">
        </select>      
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">History of Deposit : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="3" id = "History_of_Deposit" name = "History_of_Deposit"><?php echo $data->History_of_Deposit ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Source of Isolation : </label>
            <div class="col-sm-6">
        <textarea class="form-control" rows="2" name = "Source_of_Isolation"><?php echo $data->Source_of_Isolation ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Geographic Origin : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Geographic_Origin ?>" class="form-control" id = "" name="Geographic_Origin">
      </div>
    </div>

     <div class="form-group">
      <label for="" class="col-sm-2 control-label">GPS Coordinates : </label>
      <div class="col-sm-2">
        <input value = "<?php echo $data->latitude ?>"type="text" class="form-control" placeholder = "latitude" name="latitude">
      </div>
      <div class="col-sm-2">
        <input value = "<?php echo $data->longitude ?>"type="text" class="form-control" placeholder = "longitude" id = "" name="longitude">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Status : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Status ?>" class="form-control" id = "" name="Status">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Type Strain : </label>
      <div class="col-sm-2">
        <select name = "Type_Strain" id = "Type_Strain" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Optimum Temp : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Optimum_Temp ?>" class="form-control" id = "" name="Optimum_Temp">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Maximum Temp : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Maximum_Temp ?>"class="form-control" id = "" name="Maximum_Temp">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Minimum Temp : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Minimum_Temp ?>"class="form-control" id = "" name="Minimum_Temp">
      </div>
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Literature : </label>
      <div class="col-sm-6">
        <input value = "<?php echo $data->Literature ?>"type="text" class="form-control" id = "" name="Literature">
      </div>
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Application : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Application ?>" class="form-control" id = "" name="Application">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Image : </label>
      <div class="col-sm-6">
        <img alt="" width="200" height="200"src="<?=base_url().'uploads/'.$data->Image?>">
        <input type="file" class="form-control" id = "" name="userfile">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Description : </label>
            <div class="col-sm-6">
        <textarea class="form-control" rows="4" id="" name = "Description"><?php echo $data->Description ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Type : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Sequence_Type ?>" class="form-control" id = "" name="Sequence_Type">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="15" id="comment" name = "Sequence"><?php echo $data->Sequence ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Name : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Medium_Name ?>"class="form-control" id = "" name="Medium_Name">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Composition : </label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="15" name = "Medium_Composition"><?php echo $data->Medium_Composition ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Length : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Sequence_Length ?>"class="form-control" id = "" name="Sequence_Length">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Primer : </label>
            <div class="col-sm-6">
        <textarea class="form-control" rows="4" name = "Primer"><?php echo $data->Primer ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Depository Status : </label>
      <div class="col-sm-2">
        <select name = "Depository_Status" id = "Depository_Status" class="form-control">
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Price : </label>
      <div class="col-sm-6">
        <input type="text" value = "<?php echo $data->Harga ?>"class="form-control" id = "Price" name="Price">
      </div>
    </div>


    <script type="text/javascript">

var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

for (var i = 0; i < month.length; i++) {

  var select = '';
  if(month[i]=='<?php echo $data->month; ?>'){
    select = 'selected';
  }

  var a = '<option value = "'+month[i]+'" '+select+'> '+month[i]+' </option>';
  $('#month').append(a);
}

</script>

<script type="text/javascript">

var day = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12','13' ,'14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];

for (var i = 0; i < day.length; i++) {

  var select = '';
  if(day[i]=='<?php echo $data->day; ?>'){
    select = 'selected';
  }

  var a = '<option value = "'+day[i]+'" '+select+'> '+day[i]+' </option>';
  $('#day').append(a);
}

</script>


<script type="text/javascript">

var depo = ['Save', 'Public'];

for (var i = 0; i < depo.length; i++) {

  var select = '';
  if(depo[i]=='<?php echo $data->Depository_Status; ?>'){
    select = 'selected';
  }

  var a = '<option value = "'+depo[i]+'" '+select+'> '+depo[i]+' </option>';
  $('#Depository_Status').append(a);
}

</script>

<script type="text/javascript">

var type = ['yes', 'no'];

for (var i = 0; i < type.length; i++) {

  var select = '';
  if(type[i]=='<?php echo $data->Type_Strain; ?>'){
    select = 'selected';
  }

  var a = '<option value = "'+type[i]+'" '+select+'> '+type[i]+' </option>';
  $('#Type_Strain').append(a);
}

</script>

      <?php endforeach; ?>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <label> 
                <input type="submit" class="btn btn-primary" id = "btnSubmitFreeze"value="Save" /> 
          </label>
      </div>
    </div>

  </div>
</form>
<!-- /.box -->

<script type="text/javascript">

$(document).ready(function(){      //utk start up page, bila depo status save, trus disabled price

  var a = $( "#Depository_Status option:selected" ).val();

  if (a == 'Save') {
    $('#Price').prop("readonly", true);
  }else if (a == 'Public') {          
    $('#Price').prop("readonly", false);
  };

});

</script>

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

  var itik = $('#jenis_Strain').val();

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

$("form#dataFreeze").submit(function(){

  var formData = new FormData($(this)[0]);
  url = "<?php echo site_url('bacteria/ajax_update_Freeze')?>";

  $.ajax({
    url: url,
    type: 'POST',
    data: formData,
    async: false,
    success: function (result) {

      var dialog = new BootstrapDialog.show({
            message: 'Data has been edit..'
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



  
<?php
$a = $data->Lokasi;
$c = $data->Row;
$d = $data->Location_Detail;
?>


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
//alert('<?php echo $a ?>');
//alert(json_data[i].location);
                            //alert(json_data[i].id);
                            var select = '';
                            if(json_data[i].location=='<?php echo $a ?>'){
                              select = 'selected';
                            }
                            var a = '<option value = "'+json_data[i].location+'" '+select+'> '+json_data[i].location+' </option>';
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

     //nie utk dropdown location 
     $(document).ready(function(){

      var selectedText = 'row';

      $('#Lokasi_RowLoadAjax').empty();          //kosong kan lokasi

      $.ajax({
        url : "<?php echo site_url('Data_Matrix/list_Row/')?>/"+selectedText,
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var b = '<option selected="selected">Please select</option>';
          $('#Lokasi_RowLoadAjax').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].row=='<?php echo $c ?>'){
              select = 'selected';
            }

            var a = '<option value = "'+json_data[i].row+'" '+select+'> '+json_data[i].row+' </option>';
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

    var b = '<option selected="selected">Please select</option>';
          $('#location_detail_freeze').append(b);        //append please select
          
          for (var i = 0; i < json_data.length; i++) {

            var select = '';
            if(json_data[i].location_detail=='<?php echo $d ?>'){
              select = 'selected';
            }

                            var a = '<option value = "'+json_data[i].location_detail+'" '+select+'> '+json_data[i].location_detail+' </option>';
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

  $('#Lokasi_RowLoadAjax').on('change', function() {

    var sellocation = $("select#location_detail_freeze").val() || "";

    if (sellocation != "") {

      $('#errordetectFreeze').empty();

   var a = $( "#Lokasi_RowLoadAjax option:selected" ).text();
   var b = $( "#location_detail_freeze option:selected" ).text();

   var harun = 'F-RG1-'+a+'-'+b;


   $('#sumLokasi').empty().append(harun);


      $.ajax({
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility_EditFreeze')?>/",
        type: "POST",
        data: {
          "row" : a,
          "location" : b,
          "idStrain" : <?php echo $id; ?>
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
        url : "<?php echo site_url('Lokasi_controller/checkAvaibility_EditFreeze')?>/",
        type: "POST",
        data: {
          "row" : a,
          "location" : b,
          "idStrain" : <?php echo $id; ?>
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

  var itik = $('#jenis_Strain').val();
  var Letter = itik.charAt(0).toUpperCase();
  $('#Main_Strain_Local_ID').val($(this).val()+Letter+'-');


});

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
    url : "<?php echo site_url('Lokasi_controller/checkAvaibility_EditLocalId')?>/",
    type: "POST",
    data: {
      "localid" : chuppy,
      "idStrain" : <?php echo $id; ?>
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




