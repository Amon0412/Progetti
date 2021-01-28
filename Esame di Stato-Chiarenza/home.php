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
  <a href="#" class="w3-bar-item w3-button w3-padding">Statistiche generali</a>
  <a href="home2.php" class="w3-bar-item w3-button w3-padding">Statistiche personalizzate</a>
  <a href="home3.php" class="w3-bar-item w3-button w3-padding">Grafici</a>
  <a href="home4.php" class="w3-bar-item w3-button w3-padding">Sul virus</a>
  <a href="home5.php" class="w3-bar-item w3-button w3-padding">Indice di trasmissibilità</a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding">Esci</a>
  </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Statistiche generali</b></h5>
  </header>
<div class="w3-container">
<?php
	session_start();
    $conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
    if ($_SESSION['login']==1) {
    $sql="select cod,nreg from regione";
    $regioni=mysqli_query($conn,$sql);
    while ($rows=mysqli_fetch_array($regioni)){
    	$r[$rows['cod']]=$rows['nreg'];
    }
    $sql="select cod_r,t_casi,d_gua,rip,tamp from coovid where data='2020-06-08' group by cod_r";
    $karameru=mysqli_query($conn,$sql);
    ?><table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tr><td><b>Regione<td><b>Positivi<td><b>Guariti<td><b>Deceduti<td><b>Tamponi</b><?php
    while ($rows=mysqli_fetch_array($karameru)){?><tr><td><?php
    	  echo $r[$rows['cod_r']];?><td><?php echo $rows['t_casi'];?><td><?php echo $rows['d_gua'];?><td><?php echo $rows['rip'];?><td><?php echo $rows['tamp'];
    }
    ?>
    	</table>
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