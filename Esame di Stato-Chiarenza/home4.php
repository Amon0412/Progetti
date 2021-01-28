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
  <a href="#" class="w3-bar-item w3-button w3-padding">Sul virus</a>
  <a href="home5.php" class="w3-bar-item w3-button w3-padding">Indice di trasmissibilità</a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding">Esci</a>
  </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Sul Virus</b></h5>
  </header>
<div class="w3-container">
<?php
	session_start();
    $conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
    if ($_SESSION['login']==1) {?>
    <h2>Sintomi del Covid-19 </h2>

Sintomi comuni:<br>
<li>febbre</li>
<li>tosse secca</li>
<li>spossatezza</li>

<br>Sintomi meno comuni:<br>
<li>indolenzimento e dolori muscolari</li>
<li>mal di gola</li>
<li>diarrea</li>
<li>congiuntivite</li>
<li>mal di testa</li>
<li>perdita del gusto o dell'olfatto</li>
<li>eruzione cutanea o scolorimento delle dita di piedi o mani</li>

<br>Sintomi gravi<br>
<li>difficoltà respiratoria o fiato corto</li>
<li>oppressione o dolore al petto</li>
<li>perdita della facoltà di parola o di movimento</li>

<h2>Per prevenire la trasmissione di COVID-19:</h2>

<li>Lava spesso le mani con acqua e sapone o usando un prodotto disinfettante a base alcolica per le mani.
</li>
<li>Mantieni una distanza di sicurezza da chiunque tossisca o starnutisca.
</li>
<li>Non toccarti gli occhi, il naso o la bocca.
</li>
<li>Tossisci o starnutisci nella piega del gomito o usa un fazzoletto di carta, coprendo il naso e la bocca.
</li>
<li>Se non ti senti bene, resta a casa.
</li>
<li>In caso di febbre, tosse e difficoltà respiratorie, chiama al telefono il tuo medico.
</li>
<li>Segui le istruzioni fornite dalle autorità sanitarie locali.
</li>
<li>Non recarti al pronto soccorso o presso gli studi medici; in questo modo permetterai agli operatori sanitari di lavorare meglio, proteggendo te stesso e gli altri.
</li>

<h2>Numeri verdi regionali </h2>

<li>
<strong>Basilicata</strong>
:800 99 66 88 
</li>
<li>
<strong>Calabria</strong>
:800 76 76 76
</li>
<li>
<strong>Campania</strong>
:800 90 96 99
</li>
<li>
<strong>Emilia-Romagna</strong>
:800 033 033
</li>
<li>
<strong>Friuli Venezia Giulia</strong>
:800 500 300
</li>
<li>
<strong>Lazio</strong>
:800 11 88 00
</li>
<li>
<strong>Liguria</strong>
:800 938 883
</li>
<li>
<strong>Lombardia</strong>
:800 89 45 45
</li>
<li>
<strong>Marche</strong>
:800 93 66 77
</li>
<li>
<strong>Piemonte</strong>
:800 19 20 20
</li>
<li>
<strong>Provincia autonoma di Trento</strong>
:800 867 388
</li>
<li>
<strong>Provincia autonoma di Bolzano</strong>
:800 751 751
</li>
<li>
<strong>Puglia</strong>
:800 713 931
</li>
<li>
<strong>Sardegna</strong>
:800 311 377
</li>
<li>
<strong>Sicilia</strong>
:800 45 87 87
</li>
<li>
<strong>Toscana</strong>
:800 55 60 60
</li>
<li>
<strong>Umbria</strong>
:800 63 63 63
</li>
<li>
<strong>Val d’Aosta</strong>
:800 122 121
</li>
<li>
<strong>Veneto</strong>
:800 462 340
</li>
<li>
<strong>Abruzzo</strong>
:800 556 600
</li>
<li>
<strong>Molise</strong>
:0874 313000
</li>
    
    
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