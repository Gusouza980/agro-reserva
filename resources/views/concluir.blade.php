@php
    include_once(app_path() . '\Apis\_functions.php');
    $_SESSION["lojaid"] = session()->get("lojaid");
    $_SESSION["userid"] = session()->get("userid");
    $_SESSION["username"] = session()->get("username");
    $_SESSION["useruuid"] = session()->get("useruuid");
    $session = urlencode(session_encode());
    //$session = urlencode("lojaid=".session("lojaid")."&"."userid=".session("userid")."&"."username=".session("username")."&"."useruuid=".str_replace("-","",session("useruuid")));
    //dd($session);
@endphp

@extends('template.main')

@section("styles")

@endsection

@section('conteudo')

<form id="fSecure" name="fSecure" action="https://api.bscommerce.com.br/seguro/" method="post">
	<input type="hidden" id="s" name="s" value="<?php echo $session; ?>">
	<!-- <input type="submit" value="ok"> -->
</form>

<script>
    function formAutoSubmit () {
        var frm = document.getElementById("fSecure");
        frm.submit();
    }
    window.onload = formAutoSubmit;
</script>
@endsection