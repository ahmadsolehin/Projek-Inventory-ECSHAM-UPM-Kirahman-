
  <button class="btn btn-success" id = "tekan"><i class="glyphicon glyphicon-plus"></i> test</button>
  <button class="btn btn-success" onclick="add_bacteria()"><i class="glyphicon glyphicon-plus"></i> Add Data Strain</button>
  <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
  <br />
  <br />

  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Global ID</th>
        <th>Local ID</th>
        <th>Strain Type</th>
        <th>Genus Name</th>
        <th>Species Name</th>
        <th style="width:125px;">Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>

 
  </table>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>


  <script>
  $(document).ready(function () {

    $('#tekan').unbind('click').click(function () {
      $.ajax({
        url : "<?php echo site_url('cop/in')?>/",
        success: function (result) {
          $('#haha').empty().html(result).fadeIn('slow');
        }});
    })
  })
  </script>