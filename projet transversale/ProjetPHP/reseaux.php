<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$title = "Réseaux";
include "header.php";
?>
<br>
<br>
<br>
<br>
<br>
<div class="container mt-5 shadow bg-light p-3 text-center p-5">
    <h1> Cette page est en construction, désolé !</h1>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include "footer.php";
?>
