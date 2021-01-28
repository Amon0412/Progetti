<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
	session_start();
    $conn=mysqli_connect('localhost','root','');
	if (!$conn) die();
    $db=mysqli_select_db($conn,'my_alkes');
    if (!$db) die();
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
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    
</html>
