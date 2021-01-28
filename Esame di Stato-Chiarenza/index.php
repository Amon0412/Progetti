<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<?php
	session_start();
    session_destroy();
	$conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
?>
<body class="w3-light-grey">
<form action=login.php method=POST>
<table align=center style="padding-top:100px">
<tr><td colspan=2><h2 align=center><b>Login</b></h2>
<tr><td style="padding-top:15px"><input name="u" type=text class="w3-input w3-border" placeholder="Username" required maxlength="20">
<tr><td style="padding-bottom:15px; padding-top:5px"><input name="p" type=password class="w3-input w3-border" placeholder="Password" required maxlength="20">
<tr><td colspan=2><p align=center><input type=submit value=Accedi class="w3-button w3-dark-grey"></p>
</form>
</table>
<p align=center style="padding-top:25px; font-size:25px" ><a href=regis.php>Non hai un account? Registrati</a></p>