<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <h3>Strain Info</h3>
  <br>    

  <table class="table table-hover">

    <tbody>
      <?php foreach ($output as $data): ?>

      <tr>
        <th>Strain Global Id</th>
        <td class="col-md-8"><?php echo $data['Strain_Global_ID']?> </td>
      </tr>

      <tr>
        <th>Main Strain Local Id</th>
        <td class="col-md-8"><?php echo $data['Main_Strain_Local_ID']?> </td>
      </tr>

      <tr>
        <th>Location</th>
        <td class="col-md-8"><?php echo $data['Lokasi']?> </td>
      </tr>

      <tr>
        <th>Location Unit</th>
        <td class="col-md-8"><?php echo $data['Lokasi_Unit']?> </td>
      </tr>

      <tr>
        <th>Location Box</th>
        <td class="col-md-8"><?php echo $data['Lokasi_Box']?> </td>
      </tr>

      <tr>
        <th>Location Subbox</th>
        <td class="col-md-8"><?php echo $data['Lokasi_Subbox']?> </td>
      </tr>

      <tr>
        <th>Summary Location</th>
        <td class="col-md-8"><?php echo $data['Summary_Lokasi']?> </td>
      </tr>

      <tr>
        <th>Genus Name</th>
        <td class="col-md-8"><?php echo $data['Genus_Name']?> </td>
      </tr>

      <tr>
        <th>Species Name</th>
        <td class="col-md-8"><?php echo $data['Species_Name']?> </td>
      </tr>

      <tr>
        <th>Subspecies Name</th>
        <td class="col-md-8"><?php echo $data['Subspecies_Name']?> </td>
      </tr>

      <tr>
        <th>Original Code</th>
        <td class="col-md-8"><?php echo $data['Original_Code']?> </td>
      </tr>

      <tr>
        <th>Organism Type</th>
        <td class="col-md-8"><?php echo $data['Organism_Type']?> </td>
      </tr>

      <tr>
        <th>Sequence Methods</th>
        <td class="col-md-8"><?php echo $data['Sequence_Method']?> </td>
      </tr>

      <tr>
        <th>Sequence Time</th>
        <td class="col-md-8"><?php echo $data['Sequence_Time']?> </td>
      </tr>

      <tr>
        <th>Author</th>
        <td class="col-md-8"><?php echo $data['Author']?> </td>
      </tr>

      <tr>
        <th>Date of Isolation</th>
        <td class="col-md-8"><?php echo $data['Date_of_Isolation']?> </td>
      </tr>

      <tr>
        <th>History of Deposit</th>
        <td class="col-md-8"><?php echo $data['History_of_Deposit']?> </td>
      </tr>


      <tr>
        <th>Source of Isolation</th>
        <td class="col-md-8"><?php echo $data['Source_of_Isolation']?> </td>
      </tr>

      <tr>
        <th>Geographic Origin</th>
        <td class="col-md-8"><?php echo $data['Geographic_Origin']?> </td>
      </tr>

      <tr>
        <th>Status</th>
        <td class="col-md-8"><?php echo $data['Status']?> </td>
      </tr>


      <tr>
        <th>Type Strain</th>
        <td class="col-md-8"><?php echo $data['Type_Strain']?> </td>
      </tr>

      <tr>
        <th>Optimum Temperature</th>
        <td class="col-md-8"><?php echo $data['Optimum_Temp']?> </td>
      </tr>

      <tr>
        <th>Maximum Temperature</th>
        <td class="col-md-8"><?php echo $data['Maximum_Temp']?> </td>
      </tr>

      <tr>
        <th>Minimum Temperature</th>
        <td class="col-md-8"><?php echo $data['Minimum_Temp']?> </td>
      </tr>

      <tr>
        <th>Literature</th>
        <td class="col-md-8"><?php echo $data['Literature']?> </td>
      </tr>

      <tr>
        <th>Application</th>
        <td class="col-md-8"><?php echo $data['Application']?> </td>
      </tr>

      <tr>
        <th>Image</th>
        <td class="col-md-8"><img width="200" height="200" alt="" src="<?=base_url().'uploads/'.$data['Image'];?>"> </td>
      </tr>

      <tr>
        <th>Description</th>
        <td class="col-md-8"><?php echo $data['Description']?> </td>
      </tr>

      <tr>
        <th>Sequence Type</th>
        <td class="col-md-8"><?php echo $data['Sequence_Type']?> </td>
      </tr>

      <tr>
        <th>Sequence</th>
        <td class="col-md-8"><?php echo $data['Sequence']?> </td>
      </tr>

      <tr>
        <th>Medium Name</th>
        <td class="col-md-8"><?php echo $data['Medium_Name']?> </td>
      </tr>

      <tr>
        <th>Medium Composition</th>
        <td class="col-md-8"><?php echo $data['Medium_Composition']?> </td>
      </tr>

      <tr>
        <th>Sequence Length</th>
        <td class="col-md-8"><?php echo $data['Sequence_Length']?> </td>
      </tr>

      <tr>
        <th>Primer</th>
        <td class="col-md-8"><?php echo $data['Primer']?> </td>
      </tr>

      <tr>
        <th>Price</th>
        <td class="col-md-8"><?php echo $data['Harga']?> </td>
      </tr>


      
    <?php endforeach; ?>

  </tbody>
</table>



</body>
</html>
