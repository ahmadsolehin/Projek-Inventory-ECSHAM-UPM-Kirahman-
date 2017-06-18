<!-- Horizontal Form -->
<div class="box-header with-border">
  <h3 class="box-title">View Data Strain (Freeze)</h3>

</div>
<!-- /.box-header -->
<!-- form start -->

<?php foreach ($output as $data): ?>

  <form class="form-horizontal" id="dataCryo" method="post" enctype="multipart/form-data">

    <div class="box-body">

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Global Id : </label>

        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Strain_Global_ID ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Local Id : </label>

        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Main_Strain_Local_ID ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Location : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Lokasi ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Location One: </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Lokasi_One ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Row : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Row ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Location Detail :  : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Location_Detail ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Summary Location : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Summary_Lokasi ?></h5>
        </div>
      </div>

      <div class="form-group">
       <label for="" class="col-sm-2 control-label">Genus Name : </label>
       <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Genus_Name ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Species Name : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Species_Name ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Subspecies Name : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Subspecies_Name ?></h5>
        </div>
      
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Original Code : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Original_Code ?></h5>
        </div>
      
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Organism Type : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Organism_Type ?></h5>
        </div>
     
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Method : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Sequence_Method ?></h5>
        </div>
     
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Time : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Sequence_Time ?></h5>
        </div>
     
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Author : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Author ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Date of Isolation : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Date_of_Isolation ?></h5>
        </div>

    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">History of Deposit : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->History_of_Deposit ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Source of Isolation : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Source_of_Isolation ?></h5>
        </div>
      
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Geographic Origin : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Geographic_Origin ?></h5>
        </div>
      
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Status : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Status ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Type Strain : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Type_Strain ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Optimum Temp : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Optimum_Temp ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Maximum Temp : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Maximum_Temp ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Minimum Temp : </label>
<div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Minimum_Temp ?></h5>
        </div>      
     
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Literature : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Literature ?></h5>
        </div>
    </div>


    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Application : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Application ?></h5>
        </div>
     
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Image : </label>
      <div class="col-sm-6">
        <img alt="" width="200" height="200"src="<?=base_url().'uploads/'.$data->Image?>">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Description : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Description ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Type : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Sequence_Type ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Sequence ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Name : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Medium_Name ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Medium Composition : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Medium_Composition ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Sequence Length : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Sequence_Length ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Primer : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Primer ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Price : </label>
      <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->Harga ?></h5>
        </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label"></label>
      <div class="col-sm-6">
      <button type="button" id = "butangBack" class="btn btn-default">Back</button>
        </div>
    </div>

  <?php endforeach; ?>


</div>
</form>
<!-- /.box -->


<script>
$(document).ready(function () {

  $('#butangBack').unbind('click').click(function () {
    $.ajax({
      url : "<?php echo base_url();?>index.php/bacteria/config",
      success: function (result) {
        $('#haha').empty().html(result).fadeIn('slow');
      }});
  })
})
</script>