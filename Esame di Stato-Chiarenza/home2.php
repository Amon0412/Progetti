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
  <a href="#" class="w3-bar-item w3-button w3-padding">Statistiche personalizzate</a>
  <a href="home3.php" class="w3-bar-item w3-button w3-padding">Grafici</a>
  <a href="home4.php" class="w3-bar-item w3-button w3-padding">Sul virus</a>
  <a href="home5.php" class="w3-bar-item w3-button w3-padding">Indice di trasmissibilità</a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding">Esci</a>
  </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Statistiche personalizzate</b></h5>
  </header>
<div class="w3-container">
<?php
	session_start();
    $conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
    if ($_SESSION['login']==1) {?>
    <form action="home2.php" method=POST>
    Regioni:<br> <select name="regione">         <option    value="1">Piemonte</option>         <option value="2">Valle d'Aosta</option>         <option value="3">Lombardia</option>         <option value="5">Veneto</option>         <option value="6">Friuli-Venezia Giulia</option>         <option value="7">Liguria</option>         <option value="8">Emilia-Romagna</option>         <option value="9">Toscana</option>         <option value="10">Umbria</option>         <option value="11">Marche</option>         <option value="12">Lazio</option>         <option value="13">Abruzzo</option>         <option value="14">Molise</option>         <option value="15">Campania</option>         <option value="16">Puglia</option>         <option value="17">Basilicata</option>         <option value="18">Calabria</option>         <option value="19">Sicilia</option>         <option value="20">Sardegna</option>         <option value="21">P. A. Bolzano</option>         <option value="22">P. A. Trento</option></select>
    <br>Seleziona campi:<br><input type="checkbox" id="ric" name="a" value=",ric">   <label for="vehicle3"> Ricoverati</label>	<input type="checkbox" id="ter" name="b" value=",ter">   <label for="vehicle3"> Terapia intensiva</label>	<input type="checkbox" id="osp" name="c" value=",osp">   <label for="vehicle3"> Ospidalizzati</label>	<input type="checkbox" id="iso" name="d" value=",iso_d">   <label for="vehicle3"> Isolamento domiciliare</label>	<input type="checkbox" id="d_gua" name="e" value=",d_gua">   <label for="vehicle3"> Dimessi guariti</label>	<input type="checkbox" id="rip" name="f" value=",rip">   <label for="vehicle3"> Deceduti</label>	<input type="checkbox" id="t_casi" name="g" value=",t_casi">   <label for="vehicle3"> Totale casi</label>	<input type="checkbox" id="tamp" name="h" value=",tamp">   <label for="vehicle3"> Tamponi</label><br><input type="submit" value="Conferma">
    </form>
    <?php if ($_POST) {
    	$r=$_POST['regione'];
    	$sel=$_POST['a'].$_POST['b'].$_POST['c'].$_POST['d'].$_POST['e'].$_POST['f'].$_POST['g'].$_POST['h'];
        ?><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <?php 
    	$sql="SELECT data,t_pos,d_gua,rip,ric FROM coovid WHERE cod_r=$r group by data;";
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
    		['<?php echo $rows['data'];?>', <?php echo $rows['t_pos'];?>,<?php echo $rows['d_gua'];?>,<?php echo $rows['rip'];?>],
            <?php } ?>
          
        ]);

        var options = {
          title: 'Statistiche della Regione',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    	<div id="curve_chart" style="width: 900px; height: 500px"></div> <?php
        $sql="select data$sel from coovid where cod_r=$r order by data;";
        $prova=mysqli_query($conn,$sql);
         ?><table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tr><?php 
         	if($_POST['a'] or $_POST['b'] or $_POST['c'] or $_POST['d'] or $_POST['e'] or $_POST['f'] or $_POST['g'] or $_POST['h']) echo "<td>Data</td>";
            if(isset($_POST['a'])) echo "<td>Ricoverati</td>";
        	if(isset($_POST['b'])) echo "<td>Terapia Intensiva</td>"; if(isset($_POST['c'])) echo "<td>Ospedalizati</td>";if(isset($_POST['d'])) echo "<td>Isolamento domiciliare</td>";
         	if(isset($_POST['e'])) echo "<td>Dimessi Guariti</td>"; if(isset($_POST['f'])) echo "<td>Deceduti</td>";if(isset($_POST['g'])) echo "<td>Totale Casi</td>";
            if(isset($_POST['h'])) echo "<td>Tamponi</td>";
         
         
         
         ?>
    	<?php while ($rows=mysqli_fetch_array($prova)){?><tr><?php
        	if($_POST['a'] or $_POST['b'] or $_POST['c'] or $_POST['d'] or $_POST['e'] or $_POST['f'] or $_POST['g'] or $_POST['h']) echo "<td>".$rows['data']."</td>";
        	if(isset($_POST['a'])) echo "<td>".$rows['ric']."</td>";
    	  	if(isset($_POST['b'])) echo "<td>".$rows['ter']."</td>"; if(isset($_POST['c'])) echo "<td>".$rows['osp']."</td>";if(isset($_POST['d'])) echo "<td>".$rows['iso_d']."</td>";
         	if(isset($_POST['e'])) echo "<td>".$rows['d_gua']."</td>"; if(isset($_POST['f'])) echo "<td>".$rows['rip']."</td>";if(isset($_POST['g'])) echo "<td>".$rows['t_casi']."</td>";
            if(isset($_POST['h'])) echo "<td>".$rows['tamp']."</td>";
    }
    ?>
    	</table>
     <?php  
    }?>
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