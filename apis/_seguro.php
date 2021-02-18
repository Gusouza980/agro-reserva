<?php
include_once('_functions.php');
$session = urlencode(session_encode());
?>
<form id="fSecure" name="fSecure" action="https://api.bscommerce.com.br/seguro/" method="post">
	<input type="hidden" id="s" name="s" value="<?=$session;?>">
	<!-- <input type="submit" value="ok"> -->
</form>
<script>
function formAutoSubmit () {
	var frm = document.getElementById("fSecure");
	frm.submit();
}
window.onload = formAutoSubmit;
</script>