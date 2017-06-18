<style type="text/css">

#buangLine{
    border: none;
    background-color: transparent;
    resize: none;
    outline: none;
}

</style>

<?php foreach ($output as $data): ?>
<!-- Horizontal Form -->
<div class="box-header with-border">
  <div class="col-md-6">
    <h3 class="box-title">View Data Strain (Cryo)</h3>
  </div>

  <div class="col-md-6">
    <span class="pull-right">

    <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>

    <button class="btn btn-default" onclick=" location.href='<?php echo base_url();?>Generate_Pdf/index/<?php echo $data->id; ?>/<?php echo $data->Jenis_Strain; ?>' "><i class="fa fa-file-pdf-o"></i>  Print</button>
  </span>
</div>
</div>
<!-- /.box-header -->
<!-- form start -->


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
        <label for="" class="col-sm-2 control-label">Canister : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->canister ?></h5>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Boxes : </label>
        <div class="col-sm-6">
          <h5 class="col-sm-6 "><?php echo $data->boxes ?></h5>
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
        <h5 class="col-sm-6 "><?php echo $data->year; ?> <?php echo $data->month; ?><?php echo $data->day; ?></h5>
      </div>

    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">History of Deposit : </label>
      <div class="col-sm-6">
        <textarea id = "buangLine" style="background-color:white;" class="form-control" rows="3" disabled>
          <?php echo $data->History_of_Deposit ?>
        </textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Source of Isolation : </label>
      <div class="col-sm-6">
         <textarea id = "buangLine" style="background-color:white;" class="form-control" rows="2" style="word-wrap:break-word;" disabled>
          <?php echo $data->Source_of_Isolation ?>
        </textarea>
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
        <textarea id = "buangLine" style="background-color:white;" class="form-control" rows="15" style="word-wrap:break-word;" disabled>
          <?php echo $data->Sequence ?>
        </textarea>
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
      <label for="" class="col-sm-2 control-label">Depository Status : </label>
      <div class="col-sm-6">
        <h5 class="col-sm-6 "><?php echo $data->Depository_Status ?></h5>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label"></label>
      <div class="col-sm-6">
        <button type="button" id = "butangBackbwh" class="btn btn-default">Back</button>
      </div>
    </div>



  <?php endforeach; ?>


</div>
</form>
<!-- /.box -->



<input type="hidden" id="planet" value="<?php echo trim($jenis_strain)?>">

<script>
$(document).ready(function () {

  var pluto = $('#planet').val();

  $('#butangBack, #butangBackbwh').unbind('click').click(function () {
    $.ajax({
      url : "<?php echo site_url('bacteria/index/')?>/"+pluto,
      success: function (result) {
        $('#haha').empty().html(result).fadeIn('slow');
      }});
  })
})
</script>

