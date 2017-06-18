
<html>
<head>
	<link href="<?php echo base_url('assets/css/Add_Type_Strain.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>

</head>
<body>

	<?php foreach ($output as $data): ?>

	<form id="data" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $jenis; ?>" name="id"/> 
		<input type="hidden" value="<?php echo $id; ?>" name="idStrain"/> 
		<input type="hidden" value="<?php echo $data['Image']?>" name="namaImage"/> 
		<input type="hidden" id = "jquery_location_unit" value="<?php echo $data['Lokasi_Unit']?>" name="jquery_location_unit"/> 


		<legend>Edit Data Strain (<?php echo $jenis; ?>)</legend>


		<div class="preview-block">
			<div class="form">    

				<p class=""> 
					<label for="">Global Id : </label> 
					<input type="text" value = "<?php echo $data['Strain_Global_ID']?>"  id = "Strain_Global_ID" name = "Strain_Global_ID"  id="">
				</p><br>    

				<p class=""> 
					<label for="">Local Id : </label> 
					<input type="text" value = "<?php echo $data['Main_Strain_Local_ID']?>"id = "Main_Strain_Local_ID" name="Main_Strain_Local_ID">
					&nbsp<span id="chars">40</span> characters remaining
				</p><br>

				<p class=""> 
					<label for="">Location : </label>
					<select name = "Lokasi" id = "lokasi">
						<option selected="selected">Please select</option>
					</select>	
				</p><br>

				<p class=""> 
					<label for="">Location Unit: </label>
					<select name = "Lokasi_Unit" id = "lokasi_unit">
						<option selected="selected"><?php echo $data['Lokasi_Unit']?></option>
					</select>	
				</p><br>

				<p class=""> 
					<label for="">Boxes : </label> 
					<input type="text" value = "<?php echo $data['Lokasi_Box']?>" name = "Lokasi_Box" id="">
				</p><br>    

				<p class=""> 
					<label for="">Subbox : </label> 
					<input type="text" value = "<?php echo $data['Lokasi_Subbox']?>" name="Lokasi_Subbox" >
				</p><br>

				<p class=""> 
					<label for="">Genus Name : </label> 
					<input type="text" value = "<?php echo $data['Genus_Name']?>"name = "Genus_Name" id="">
				</p><br>    

				<p class=""> 
					<label for="">Species Name : </label> 
					<input type="text" value = "<?php echo $data['Species_Name']?>" name="Species_Name" >
				</p><br>

				<p class=""> 
					<label for="">Subspecies Name : </label> 
					<input type="text" value = "<?php echo $data['Subspecies_Name']?>"name = "Subspecies_Name" id="">
				</p><br>    

				<p class=""> 
					<label for="">Original Code : </label> 
					<input type="text" value = "<?php echo $data['Original_Code']?> "name="Original_Code">
				</p><br>


				<p class=""> 
					<label for="">Organism Type : </label> 
					<input type="text" value = "<?php echo $data['Organism_Type']?>" name = "Organism_Type" id="">
				</p><br>    

				<p class=""> 
					<label for="">Sequence Method : </label> 
					<input type="text" value = "<?php echo $data['Sequence_Method']?>"name="Sequence_Method" >
				</p><br>

				<p class=""> 
					<label for="">Sequence Time : </label> 
					<input type="text" value = "<?php echo $data['Sequence_Time']?>"name = "Sequence_Time" id="">
				</p><br>    

				<p class=""> 
					<label for="">Author : </label> 
					<input type="text" value = "<?php echo $data['Author']?>"name="Author">
				</p><br>

				<p class=""> 
					<label for="">Date of Isolation : </label> 
					<input type="text" id = "datepicker" value = "<?php echo $data['Date_of_Isolation']?>"name = "Date_of_Isolation" size = "" id="">
				</p><br>    

				<p class=""> 
					<label for="">History of Deposit : </label> 
					<input type="text" value = "<?php echo $data['History_of_Deposit']?>" name="History_of_Deposit" >
				</p><br>

				<p class=""> 
					<label for="">Source of Isolation : </label> 
					<input type="text" value = "<?php echo $data['Source_of_Isolation']?>"name = "Source_of_Isolation" id="">
				</p><br>    

				<p class=""> 
					<label for="">Geographic Origin : </label> 
					<input type="text" value = "<?php echo $data['Geographic_Origin']?>"name="Geographic_Origin">
				</p><br>

				<p class=""> 
					<label for="">Status : </label> 
					<input type="text" value = "<?php echo $data['Status']?>"name = "Status" id="">
				</p><br>

				<p class=""> 
					<label for="">Type Strain : </label> 
					<input type="text" value = "<?php echo $data['Type_Strain']?>"name="Type_Strain" >
				</p><br>    

				<p class=""> 
					<label for="">Optimum Temp : </label> 
					<input type="text" value = "<?php echo $data['Optimum_Temp']?>"name = "Optimum_Temp" id="">
				</p><br>

				<p class=""> 
					<label for="">Maximum Temp : </label> 
					<input type="text" value = "<?php echo $data['Maximum_Temp']?>"name = "Maximum_Temp" id="">
				</p><br>

				<p class=""> 
					<label for="">Minimum Temp : </label> 
					<input type="text" value = "<?php echo $data['Minimum_Temp']?>"name = "Minimum_Temp" id="">
				</p><br>

				<p class=""> 
					<label for="">Literature : </label> 
					<input type="text" value = "<?php echo $data['Literature']?>"name="Literature">
				</p><br>

				<p class=""> 
					<label for="">Application : </label> 
					<input type="text" value = "<?php echo $data['Application']?>"name="Application">
				</p><br>

				<p class=""> 
					<label for="">Image : </label> 
					<img alt="" width="200" height="200"src="<?=base_url().'uploads/'.$data['Image'];?>">
					<input type="file" name="userfile">
				</p><br>

				<p class=""> 
					<label for="">Description : </label> 
					<input type="text" value = "<?php echo $data['Description']?>"name = "Description" id="">
				</p><br>

				<p class=""> 
					<label for="">Sequence Type : </label> 
					<input type="text" value = "<?php echo $data['Sequence_Type']?>"name="Sequence_Type">
				</p><br>

				<p class=""> 
					<label for="">Sequence : </label> 
					<textarea name = "Sequence" rows="4" cols="50"><?php echo $data['Sequence']?>
					</textarea>		
				</p><br>

				<p class=""> 
					<label for="">Medium Name : </label> 
					<input type="text" value = "<?php echo $data['Medium_Name']?>"name="Medium_Name">
				</p><br>

				<p class=""> 
					<label for="">Medium Composition : </label> 
					<textarea name = "Medium_Composition" rows="4" cols="50"><?php echo $data['Medium_Composition']?>
					</textarea>	
				</p><br>

				<p class=""> 
					<label for="">Sequence Length : </label> 
					<input type="text" value = "<?php echo $data['Sequence_Length']?>"name="Sequence_Length">
				</p><br>

				<p class=""> 
					<label for="">Primer : </label> 
					<input type="text" value = "<?php echo $data['Primer']?>"name="Primer">
				</p><br>

				<p class=""> 
					<label for="">Price : </label> 
					<input type="text" value = "<?php echo $data['Harga']?>"name="Harga">
				</p><br>

				<p class="submit">
					<input type="submit" value="Save" /> 
				</p> 

			<?php endforeach; ?>


			<br />

		</div>
	</div>

</form>

</body>
</html>


<script type="text/javascript">


//datepicker
$(document).ready(function(){
	$('#datepicker').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
		todayHighlight: true,
		orientation: "top auto",
		todayBtn: true,
		todayHighlight: true,  
	});
})


$('#Strain_Global_ID').change(function() {
	$('#Main_Strain_Local_ID').val($(this).val());
});

$("#Strain_Global_ID").focus();

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
      		var b = '<option selected="selected">Please select</option>';
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


     //nie utk dropdown location unit
     $(document).ready(function(){

var hiv= $('#jquery_location_unit').val();
alert(hiv);
      $('#lokasi_unit').empty(); //kosong kan lokasi unit

      $.ajax({
      	url : "<?php echo site_url('bacteria/list_all_location_unit')?>/",
      	type: "POST",
      	dataType: "JSON",
      	success: function(json_data)
      	{
      		
         for (var i = 0; i < json_data.length; i++) {

         	if (json_data[i].Lokasi_Unit == hiv)
         	{
         		var b = '<option selected="selected">'+json_data[i].Lokasi_Unit+'</option>';
         $('#lokasi_unit').append(b);  //append please select
         	}else{
         		var b = '<option value = '+json_data[i].Lokasi_Unit+'> '+json_data[i].Lokasi_Unit+' </option>';
                            $('#lokasi_unit').append(b);
         	}

                            
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

     $("form#data").submit(function(){

     	var formData = new FormData($(this)[0]);
     	url = "<?php echo site_url('bacteria/ajax_update')?>";

     	$.ajax({
     		url: url,
     		type: 'POST',
     		data: formData,
     		async: false,
     		success: function (result) {

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

$(document).ready(function(){

	var maxLength = 40;

	$('#Main_Strain_Local_ID').keyup(function(){
		var length = $(this).val().length;
		var length = maxLength-length;
		$('#chars').text(length);
	});

})

</script>