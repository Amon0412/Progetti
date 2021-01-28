<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<form action=checkregis.php method=POST>
<table align=center style="padding-top:100px">
<tr><td colspan=2><h2 align=center><b>Register</b></h2>
<tr><td style="padding-top:15px"><input name="u" type=text class="w3-input w3-border" placeholder="Username" maxlength="20" required>
<tr><td style="padding-top:5px"><input name="d" type=date class="w3-input w3-border" placeholder="Data nascita" required>
<tr><td style="padding-top:5px"><input name="p" type=password class="w3-input w3-border" placeholder="Password" required maxlength="20">
<tr><td style="padding-top:5px"><input name="cp" type=password class="w3-input w3-border" placeholder="Conferma Password" required maxlength="20">
<tr><td style="padding-top:5px"><input name="e" type=text class="w3-input w3-border" placeholder="Email" required maxlength="50">
<tr><td style="padding-bottom:15px; padding-top:5px"><input name="ce" type=text class="w3-input w3-border" placeholder="Conferma Email" required maxlength="50">
<tr><td colspan=2><p align=center><input type=submit value=Registrati class="w3-button w3-dark-grey"></p>
</form>
</table>