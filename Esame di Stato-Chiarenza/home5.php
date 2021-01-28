<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">COOVID</span>
</div>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><image style="height:auto; width:100%" src="coovid.png"><hr>
<div class="w3-container">
    <h5>Dashboard</h5>
  </div> 
  <div class="w3-bar-block">
  <a href="home.php" class="w3-bar-item w3-button w3-padding">Statistiche generali</a>
  <a href="home2.php" class="w3-bar-item w3-button w3-padding">Statistiche personalizzate</a>
  <a href="home3.php" class="w3-bar-item w3-button w3-padding">Grafici</a>
  <a href="home4.php" class="w3-bar-item w3-button w3-padding">Sul virus</a>
  <a href="#" class="w3-bar-item w3-button w3-padding">Indice di trasmissibilità</a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding">Esci</a>
  </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Indice di trasmissibilità</b></h5>
  </header>
<div class="w3-container">
<?php
	session_start();
    $conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
    if ($_SESSION['login']==1) {?>
 
    <h2>Indice di trasmissibilità</h2> 

L'<strong><em>indice di trasmissibilità</em></strong> può essere di due tipi <strong>R0</strong> e <strong>Rt</strong>, questo indice rappresenta la potenziale trasmissibilità di una malattia infettiva, in questo caso Covid-19.<br> Nel caso dell'<em>indice R0</em> (erre con 0) rappresenta il numero di nuovi casi generati, in media, da un singolo caso durante il proprio periodo infettivo, in una popolazione che altrimenti non sarebbe infetta, invece l'<em>indice Rt</em> (erre con t) rappresenta il numero medio delle infezioni prodotte da ciascun individuo infetto dopo l’applicazione delle misure di contenimento dell’epidemia stessa

<h2>Indice Rt per regione</h2>

<strong>Abruzzo</strong>: Rt: 0.67 (CI: 0.46-0.91). Incidenza cumulativa: 246.57 per 100000<br><br>

<strong>Basilicata</strong>: Rt: 0 (CI: 0-0) . Incidenza cumulativa: 63.6 per 100000<br><br>

<strong>Calabria</strong>: Rt: 0.13 (CI: 0.01-0.35). Incidenza cumulativa: 59.88 per 100000<br><br>

<strong>Campania</strong>: Rt: in fase di definizione. Incidenza cumulativa: 78.29 per 100000<br><br>

<strong>Emilia-Romagna</strong>: Rt: 0.55 (CI: 0.49-0.62). Incidenza cumulativa: 618.62 per 100000. Incidenza: 6.32 per 100000<br><br>

<strong>Friuli-Venezia Giulia</strong>: Rt: 0.9 (CI: 0.67-1.16). Incidenza cumulativa: 260.61 per 100000. Incidenza: 2.3 per 100000<br><br>

<strong>Lazio</strong>: Rt: 0.74 (CI: 0.57-0.92). Incidenza cumulativa: 130.51 per 100000. Incidenza: 1.6 per 100000<br><br>

<strong>Liguria</strong>: Rt: 0.58 (CI: 0.51-0.66). Incidenza cumulativa: 615.17 per 100000. Incidenza: 6.13 per 100000<br><br>

<strong>Lombardia</strong>: Rt: 0.75 (CI: 0.72-0.84). Incidenza cumulativa: 867.33 per 100000. Incidenza: 16.68 per 100000<br><br>

<strong>Marche</strong>: Rt: 0.55 (CI: 0.35-0.82). Incidenza cumulativa: 439.53 per 100000.Incidenza: 3.02 per 100000<br><br>

<strong>Molise</strong>: Rt: 2.2 (CI: 1.5-3.33). Incidenza cumulativa: 141.35 per 100000. Incidenza: 2.62 per 100000<br><br>

<strong>Provincia Autonoma di Bolzano</strong>: Rt: 0.57 (CI: 0.37-0.83). Incidenza cumulativa: 487.41 per 100000. Incidenza: 1.51 per 100000<br><br>

<strong>Piemonte</strong>: Rt: 0.5 (CI: 0.46-0.55). Incidenza cumulativa: 703.56 per 100000.Incidenza: 12.46 per 100000<br><br>

<strong>Provincia autonoma di Trento</strong>: Rt: 0.88 (CI: 0.68-1.09).Incidenza cumulativa: 999.45 per 100000. Incidenza: 12.57 per 100000<br><br>

<strong>Puglia</strong>: Rt: 0.62 (CI: 0.45-0.82). Incidenza cumulativa: 110.97 per 100000.Incidenza: 1.89 per 100000<br><br>

<strong>Sardegna</strong>: Rt: 0.51 (CI: 0.22-0.82). Incidenza cumulativa: 82.09 per 100000. Incidenza: 0.37 per 100000<br><br>

<strong>Sicilia</strong>: Rt: 0.75 (CI: 0.44-1.19).Incidenza cumulativa: 60.68 per 100000. Incidenza: 0.44 per 100000<br><br>

<strong>Toscana</strong>: Rt: 0.59 (CI: 0.47-0.73). Incidenza cumulativa: 266.19 per 100000. Incidenza: 2.63 per 100000<br><br>

<strong>Umbria</strong>: Rt: 0.94 (CI: 0.57-1.41). Incidenza cumulativa: 162.24 per 100000. Incidenza: 0.45 per 100000<br><br>

<strong>Valle d’Aosta</strong>: Rt: 0.8 (CI: 0.43-1.1).Incidenza cumulativa: 944.57 per 100000.Incidenza: 6.37 per 100000<br><br>

<strong>Veneto</strong>: Rt: 0.65 (CI: 0.49-0.83).Incidenza cumulativa: 389.47 per 100000. Incidenza: 1.63 per 100000<br><br>

    <script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<?php
    }
    else header('location:index.php');
?>