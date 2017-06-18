<?php foreach ($output as $data): ?>


  <style type="text/css">

h4 {
    text-align: center;
}


  </style>

<img align = "right" alt="" width="80"  src="<?=base_url().'uploads/logo.jpg'?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img align = "right" alt="" width="80"  src="<?=base_url().'uploads/logo.jpg'?>">

  <h4>   EcshamccBiotech Sdn Bhd</h4>
  <!-- Horizontal Form -->
  <div class="box-header with-border">
    <div class="col-md-6">
      <h3 class="box-title">View Data Strain (Cryo)</h3>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->

  Strain Name/Accession No :   &nbsp; <?php echo $data->Strain_Global_ID ?>     &nbsp;&nbsp;     Sequence Method : <?php echo $data->Sequence_Method ?>

  <p>   Other Collection Numbers :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Sequence Time :  <?php echo $data->Sequence_Time ?>   </p>

  <p>   Genus Name :   <?php echo $data->Genus_Name ?>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;    Image : &nbsp;<img alt="" width="120"  src="<?=base_url().'uploads/'.$data->Image?>"> </p>

  <p>   Species Name :   <?php echo $data->Species_Name ?>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;    Medium Name : &nbsp; <?php echo $data->Medium_Name ?></p>

  <p> Subspecies Name : <?php echo $data->Subspecies_Name ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    Medium Composition : <?php echo $data->Medium_Composition ?></p>
  
  <p>Original Code :  <?php echo $data->Original_Code ?>        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      Sequence Length :   <?php echo $data->Sequence_Length ?></p>

  <p> Organism Type :  <?php echo $data->Jenis_Strain ?>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Primer :   <?php echo $data->Primer ?></p>

  <p> Author :  <?php echo $data->Author ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price : <?php echo $data->Harga ?></p>

  <p> Date of Isolation :  <?php echo $data->Date_of_Isolation ?></p>

  <p>History of Deposit :  <?php echo $data->History_of_Deposit ?></p>

  <p>Source of Isolation :   <?php echo $data->Source_of_Isolation ?></p>
  
  <p>Geographic Origin :  <?php echo $data->Geographic_Origin ?></p>

  <p>Status :   <?php echo $data->Status ?></p>

  <p>Type Strain :   <?php echo $data->Type_Strain ?></p>

  <p>Optimum Temp :   <?php echo $data->Optimum_Temp ?></p>

  <p>Maximum Temp :   <?php echo $data->Maximum_Temp ?></p>

  <p>Minimum Temp :   <?php echo $data->Minimum_Temp ?></p>

  <p>Literature :   <?php echo $data->Literature ?></p>

  <p>Application :   <?php echo $data->Application ?></p>

  <p>Description :   <?php echo $data->Description ?></p>

  <p>Sequence Type :   <?php echo $data->Sequence_Type ?></p>

  <p>Application :   <?php echo $data->Application ?></p>

  <p>Sequence :   <?php echo $data->Sequence ?></p>

<?php endforeach; ?>
