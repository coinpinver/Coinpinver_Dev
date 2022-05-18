<input type="text" id="title" value="<?=$informacion["title"]?>" class="oculto">
<input type="text" id="text" value="<?=$informacion["text"]?>" class="oculto">
<input type="text" id="color" value="<?=$informacion["color"]?>" class="oculto">

<script type="text/javascript">
	$(function() {
		getParametersAlerts();
	});

	function getParametersAlerts() {

		showNotification($("#title").val(), $("#text").val(), $("#color").val());
	}

</script>