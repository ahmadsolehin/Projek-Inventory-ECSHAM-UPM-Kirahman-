<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
   
    </head>
<body>
        <div class = "row">
        <br />
        <button class="btn btn-success" onclick="add_newType()"><i class="glyphicon glyphicon-plus"></i> Add New Type</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />

        <div class="col-md-6">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Type of Strain</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
        </table>
 </div>
 </div>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
 
 
<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
      //  "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Type_Strain_Controller/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_newType()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_type_Strain').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add New Type of Strain'); // Set Title to Bootstrap modal title
}
 
function edit_type(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Type_Strain_Controller/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="jenis_strain"]').val(data.type_strain);
            $('[name="id"]').val(data.id);
            $('[name="strain_type"]').val(data.type_strain);
            $('#modal_form_type_Strain').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Type'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('Type_Strain_Controller/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Type_Strain_Controller/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_type_Strain').modal('hide');
                reload_table();
                navBar();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
        }
    });
}
 
function delete_type(id, jenis_strain)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Type_Strain_Controller/ajax_delete')?>/"+id+'/'+jenis_strain,
           type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                reload_table();
                navBar();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
</script>
 














<!-- Bootstrap modal form type Strain-->
          <div class="modal fade" id="modal_form_type_Strain" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title"> Form</h3>
              </div>
              <div class="modal-body form">

                  <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <input type="hidden" value="" name="jenis_strain"/>
                    <div class="form-body">

                      <div class="form-group">
                        <label class="control-label col-md-3">Type of Strain name : </label>
                        <div class="col-md-6">
                          <input name="strain_type" id = "hurufkecik" placeholder="" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>


                    </div>



                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="btnsave" onclick="save()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <!-- End Bootstrap modal -->
</body>
</html>



<script type="text/javascript">

$("#hurufkecik").on("keydown", function (e) {
    return e.which !== 32;
});

</script>


<script type="text/javascript">

$("#hurufkecik").bind('keyup', function (e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $("#hurufkecik").val(($("#hurufkecik").val()).toLowerCase());
});

</script>







 <script type="text/javascript">


function navBar(){
     //nie utk dropdown location 
     $(document).ready(function(){

      $('.StrainList').empty();

 //     var a = '<li><a class = "ayam" href = "<?php echo base_url();?>index.php/bacteria"><i class="fa fa-circle-o"></i> Bacteria List</a></li>';
//      $('.StrainList').append(a);

      $.ajax({
        url : "<?php echo site_url('bacteria/list_all_type_Strain')?>/",
        type: "POST",
        dataType: "JSON",
        success: function(json_data)
        {

          for (var i = 0; i < json_data.length; i++) {

                            //alert(json_data[i].id);
                            var a = '<li><a class = "ayam" href = "<?php echo base_url();?>index.php/bacteria/index/'+json_data[i].type_strain+'"><i class="fa fa-circle-o"></i> '+json_data[i].type_strain+'</a></li>';
                            $('.StrainList').append(a);
                          }

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          alert('Error adding / update data');
                        }
                      });



    })


}
</script>