<ul class="nav nav-tabs tabs-up" id="friends">

	<li>
		<a href="<?php echo base_url();?>index.php/bacteria/Load_AddToCryo/<?php echo $jenis; ?>" data-target="#cryo" class="media_node active span" id="contacts_tab" data-toggle="tabajax" rel="tooltip">Cryo</a>
	</li>

	<li>
		<a href="<?php echo base_url();?>index.php/bacteria/Load_AddToFreezeDry/<?php echo $jenis; ?>" data-target="#freezedry" class="media_node span" id="friends_list_tab" data-toggle="tabajax" rel="tooltip">Freeze Dry</a>
	</li>

</ul>

<div class="tab-content">

	<div class="tab-pane active" id="cryo">
	</div>

	<div class="tab-pane" id="freezedry">
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