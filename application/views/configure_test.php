<ul class="nav nav-tabs tabs-up" id="friends">

	<li>
		<a href="<?php echo base_url();?>Lokasi_controller/Load_Type_Strain" data-target="#contacts" class="media_node active span" id="contacts_tab" data-toggle="tabajax" rel="tooltip">Type of Strain</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>Lokasi_controller/Load_Location_View" data-target="#friends_list" class="media_node span" id="friends_list_tab" data-toggle="tabajax" rel="tooltip">Location</a>
	</li>



	<li>
		<a href="<?php echo base_url();?>Lokasi_controller/Load_Data_Matrix" data-target="#f" class="media_node span" id="f_tab" data-toggle="tabajax" rel="tooltip">Storage Cryo</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>Lokasi_controller/Load_Data_Matrix_Refri" data-target="#awaiting_request" class="media_node span" id="awaiting_request_tab" data-toggle="tabajax" rel="tooltip">Storage FreezeDry</a>
	</li>

</ul>

<div class="tab-content">

	<div class="tab-pane active" id="contacts">
	</div>

	<div class="tab-pane" id="friends_list">
	</div>

	<div class="tab-pane" id="f">
	</div>

	<div class="tab-pane  urlbox span8" id="awaiting_request">
	</div>

</div>


<script type="text/javascript">

$(document).ready(function(){
	$('[data-toggle="tabajax"]').click(function(e) {
		var $this = $(this),
		loadurl = $this.attr('href'),
		targ = $this.attr('data-target');

		$.get(loadurl, function(data) {
			$(targ).html(data);
		});

		$this.tab('show');
		return false;
	});
})

</script>


<script type="text/javascript">

$(document).ready(function(){
	var $this = $('#contacts_tab');
		loadurl = $this.attr('href');
		targ = $this.attr('data-target');

		$.get(loadurl, function(data) {
			$(targ).html(data);
		});

		$this.tab('show');
    });

</script>