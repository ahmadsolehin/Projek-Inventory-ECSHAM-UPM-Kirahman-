
<!-- Horizontal Form -->
<div class="box-header with-border">
  <br>
  <h3 class="box-title">Edit Your Profile</h3>

</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" id="data" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $jenis; ?>" name="id"/> 

  <div class="box-body">

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">First name : </label>

      <div class="col-sm-6">
        <input value = "<?php echo $this->session->userdata('first_name');?>" type="text" class="form-control" placeholder = "first name" id = "" name = "first">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Last name: </label>

      <div class="col-sm-6">
        <input value = "<?php echo $this->session->userdata('last_name');?>" type="text" class="form-control" id = "" name="last">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Email: </label>

      <div class="col-sm-6">
        <input value = "<?php echo $this->session->userdata('email');?>"type="email" class="form-control" id = "" name="email">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">Password: </label>

      <div class="col-sm-6">
        <input value = "" type="password" class="form-control" id = "" name="password">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <label> 
                <input type="submit" class="btn btn-primary" id = "btnSubmit"value="Save" /> 
          </label>
      </div>
    </div>

  </div>
</form>
<!-- /.box -->


     
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

          $('#haha').empty().html(result).fadeIn('slow');

        },
        cache: false,
        contentType: false,
        processData: false
      });

      return false;
     });



     </script>





