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
  <a href="#" class="w3-bar-item w3-button w3-padding">Grafici</a>
  <a href="home4.php" class="w3-bar-item w3-button w3-padding">Sul virus</a>
  <a href="home5.php" class="w3-bar-item w3-button w3-padding">Indice di trasmissibilità</a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding">Esci</a>
  </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Grafici</b></h5>
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
    ?><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
        ['Provinces', 'Positivi'],<?php
    	while ($rows=mysqli_fetch_array($karameru)){?>
    		['<?php echo $r[$rows['cod_r']];?>', <?php echo $rows['t_casi']?>],
    <?php	
    }
    
    ?>]);

        var options = {
        	region: 'IT',
        	resolution:"provinces",
        	colorAxis: {colors: ['lightgray', 'red']}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
    <?php 
    	$sql="SELECT data,sum(t_casi) as t_casi,sum(d_gua) as gua,sum(rip) as rip FROM coovid WHERE 1 group by data;";
        $radwimps=mysqli_query($conn,$sql);
    ?>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Giorno', 'Positivi', 'Guariti','Morti'],
          <?php
    	while ($rows=mysqli_fetch_array($radwimps)){?>
    		['<?php echo $rows['data'];?>', <?php echo $rows['t_casi'];?>,<?php echo $rows['gua'];?>,<?php echo $rows['rip'];?>],
            <?php } ?>
          
        ]);

        var options = {
          title: 'Statistiche dell\'Italia',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
 
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