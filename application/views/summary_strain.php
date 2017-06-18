<div class="col-md-6">
</br>
</br>
</br>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Code</th>
			<th>Strain</th>
			<th>Total Strain</th>
		</tr>
	</thead>
	<tbody class = "summary_Strain"></tbody>
</table>
<div id = "spanSum"></div>

</div>





<script type="text/javascript">

     //nie utk dropdown location unit 
     $(document).ready(function(){

      $('.summary_Strain').empty();

      $.ajax({
        url : "<?php echo site_url('bacteria/list_Summary_All_Strain')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {
          var sum = 0;

          for (var i = 0; i < json_data.length; i++) {

            // alert(sum = json_data[i].total_data);
            sum = sum + json_data[i].total_data;

                            //alert(json_data[i].id);
                            var a = '<tr><td>'+json_data[i].id+'</td><td>'+json_data[i].type_strain+'</td><td>'+json_data[i].total_data+'</td></tr>';
                            $('.summary_Strain').append(a);
                          }
                          $('#spanSum').append(sum);

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });

    })



</script>