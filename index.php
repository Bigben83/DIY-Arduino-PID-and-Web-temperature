<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="30">

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Time');
	data.addColumn('number', 'Temp');
	data.addColumn('number', 'Input');
	data.addColumn('number', 'Setpoint');

	data.addRows([
        <?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT TIMESTAMPDIFF(MINUTE,FROM_UNIXTIME(Time), now()) as Time1, Temp, Setpoint, Input FROM temp WHERE TIMESTAMPDIFF(MINUTE,FROM_UNIXTIME(Time), now()) < 120 Order By Time");
			if ($result !== false) {
				$num=mysql_numrows($result);

				$i=0;
				echo"";

				while ($i < $num) {
					$time=mysql_result($result,$i,"Time1");
					$temp=mysql_result($result,$i,"Temp");
					$input=mysql_result($result,$i,"Input");
					$setpoint=mysql_result($result,$i,"Setpoint");
					echo "['";
					echo "$time";
					echo "',";
					echo "$temp";
					echo ",";
					echo "$input";
					echo ",";
					echo "$setpoint";
					echo "]";
					if ($i < ($num - 1)) 
					{
					echo ",";
					}
					$i++;
				}
			}
		?>
		 
	]);

	var options = {
	    curveType: 'function',
	width: 1150, height: 300,
	hAxis: {title: 'Minutes Ago'},
	vAxis: {title: 'Temperature C', maxValue: 150, minValue: 10}
	};

	var chart = new google.visualization.LineChart(document.getElementById('chart_div1'));
	chart.draw(data, options);
	}
</script>

<script type='text/javascript'>
	google.load('visualization', '1', {packages:['gauge']});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Label');
	data.addColumn('number', 'Value');
	data.addRows([
		<?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT Time, Temp, Setpoint, Input, Kd, Ki, Kp FROM temp Order By Time desc limit 1");
			if ($result !== false) {
				$num=mysql_numrows($result);
				$time=mysql_result($result,0,"Time");
				$temp=mysql_result($result,0,"Temp");
				$input=mysql_result($result,0,"Input");
				$setpoint=mysql_result($result,0,"Setpoint");
				$ki=mysql_result($result,0,"Ki");
				$kp=mysql_result($result,0,"Kp");
				$kd=mysql_result($result,0,"Kd");
				echo "['Temp',";
				echo "$temp";
				echo "],";
			}
		?>
	]);

	var options2 = {
	width: 600, height: 300,
	minorTicks: 2, max: 150, min: 10
	};

	var chart = new google.visualization.Gauge(document.getElementById('chart_div2'));
	chart.draw(data, options2);
	}
</script>

<script type='text/javascript'>
	google.load('visualization', '1', {packages:['gauge']});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Label');
	data.addColumn('number', 'Value');
	data.addRows([
		<?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT Time, Temp, Setpoint, Input, Kd, Ki, Kp FROM temp Order By Time desc limit 1");
			if ($result !== false) {
				$num=mysql_numrows($result);
				$time=mysql_result($result,0,"Time");
				$temp=mysql_result($result,0,"Temp");
				$input=mysql_result($result,0,"Input");
				$setpoint=mysql_result($result,0,"Setpoint");
				$ki=mysql_result($result,0,"Ki");
				$kp=mysql_result($result,0,"Kp");
				$kd=mysql_result($result,0,"Kd");
				echo "['Setpoint',";
				echo "$setpoint";
				echo "]";
			}
		?>
	]);

	var options2 = {
	width: 600, height: 300,
	minorTicks: 2, max: 150, min: 10
	};

	var chart = new google.visualization.Gauge(document.getElementById('chart_div3'));
	chart.draw(data, options2);
	}
</script>

<script type='text/javascript'>
	google.load('visualization', '1', {packages:['gauge']});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Label');
	data.addColumn('number', 'Value');
	data.addRows([
		<?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT Time, Temp, Setpoint, Input, Kd, Ki, Kp FROM temp Order By Time desc limit 1");
			if ($result !== false) {
				$num=mysql_numrows($result);
				$time=mysql_result($result,0,"Time");
				$temp=mysql_result($result,0,"Temp");
				$input=mysql_result($result,0,"Input");
				$setpoint=mysql_result($result,0,"Setpoint");
				$ki=mysql_result($result,0,"Ki");
				$kp=mysql_result($result,0,"Kp");
				$kd=mysql_result($result,0,"Kd");
				echo "['PID Temp',";
				echo "$input";
				echo "],";
			}
		?>
	]);

	var options2 = {
	width: 600, height: 300,
	minorTicks: 2, max: 150, min: 10
	};

	var chart = new google.visualization.Gauge(document.getElementById('chart_div4'));
	chart.draw(data, options2);
	}
</script>

<script type='text/javascript'>
	google.load('visualization', '1', {packages:['gauge']});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Label');
	data.addColumn('number', 'Value');
	data.addRows([
		<?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT Time, Heat FROM temp Order By Time desc limit 1");
			if ($result !== false) {
				$num=mysql_numrows($result);
				$heat=mysql_result($result,0,"Heat");

				echo "['Heat %',";
				echo "$heat";
				echo "]";
			}
		?>
	]);

	var options3 = {
	width: 600, height: 300,
	minorTicks: 2, max: 100, min: 0
	};

	var chart = new google.visualization.Gauge(document.getElementById('chart_div5'));
	chart.draw(data, options3);
	}
</script>

<script>
	flag_time = true;
	timer = '';
	setInterval(function(){phpJavascriptClock();},1000);
	
	function phpJavascriptClock()
	{
		if ( flag_time ) {
		timer = <?php $date = new DateTime(); $current_timestamp = $date->getTimestamp(); echo $current_timestamp; ?>*1000;
		}
		var d = new Date(timer);
		months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		
		month_array = new Array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'Augest', 'September', 'October', 'November', 'December');
		
		day_array = new Array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		
		currentYear = d.getFullYear();
		month = d.getMonth();
		var currentMonth = months[month];
		var currentMonth1 = month_array[month];
		var currentDate = d.getDate();
		currentDate = currentDate < 10 ? '0'+currentDate : currentDate;
		
		var day = d.getDay();
		current_day = day_array[day];
		var hours = d.getHours();
		var minutes = d.getMinutes();
		var seconds = d.getSeconds();
		
		var ampm = hours >= 12 ? 'PM' : 'AM';
		hours = hours % 12;
		hours = hours ? hours : 12; // the hour ’0′ should be ’12′
		minutes = minutes < 10 ? '0'+minutes : minutes;
		seconds = seconds < 10 ? '0'+seconds : seconds;
		var strTime = hours + ':' + minutes+ ':' + seconds + ' ' + ampm;
		timer = timer + 1000;
		document.getElementById("time").innerHTML= current_day + ' ' + currentDate +' ' + currentMonth +' ' + strTime ;
						
		flag_time = false;
	}
</script>

  <link rel="stylesheet" href="alux.min.css">
  <link rel="stylesheet" href="alux.css">
  <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
  
</head>

<body>
	<div class="nav-wrap">
	    <div class="grid no-pad-menu">
	        <div class="nav-header">
	            <a href="#" class="logo">PID Temperature Controller</a>
	       </div>
	       <nav>
	           <ul id="menu-sub" class="primary">
	               <li><a href="#"><span id='time' ></span></a></li>
	           </ul>
	       </nav>
	   </div>
	</div>
	<div class="clearfix"></div>
	
<section class="grid">
    <div class="col-1-1 tab-100 no-pad">
        <div id="chart_div1"></div>
    </div>
</section>

<section class="grid no-pad">    
		<div class="col-1-4 tab-100">
		    <div id="chart_div2"></div>
		</div>
		<div class="col-1-4 tab-100">
		    <div id="chart_div3"></div>
		</div>
		<div class="col-1-4 tab-100">
		    <div id="chart_div4"></div>
		</div>
		<div class="col-1-4 tab-100">
		    <div id="chart_div5"></div>
		</div>
</section>

<section class="grid" style="font-family: 'VT323', monospace; font-size:50px;">
        <?php
			$db="PID-temp";
			$link = mysql_connect('localhost', 'user', 'Password');
			mysql_query('SET NAMES utf8'); 
			mysql_select_db($db , $link) or die("Couldn't open $db: ".mysql_error());
			// Retrieve all the data from the "example" table
			$result = mysql_query("SELECT Time, Temp, Setpoint, Input, Kd, Ki, Kp, Heat FROM temp Order By Time desc limit 1");
			if ($result !== false) {
				$num=mysql_numrows($result);

				$time=mysql_result($result,0,"Time");
				$temp=mysql_result($result,0,"Temp");
				$input=mysql_result($result,0,"Input");
				$setpoint=mysql_result($result,0,"Setpoint");
				$ki=mysql_result($result,0,"Ki");
				$kp=mysql_result($result,0,"Kp");
				$kd=mysql_result($result,0,"Kd");
				$heat=mysql_result($result,0,"Heat");
				echo "<div class='col-1-3 tab-100 module text-center'>Kp = ";
				echo $kp;
				echo "</div><div class='col-1-3 tab-100 module text-center'>Ki = ";
				echo $ki;
				echo "</div><div class='col-1-3 tab-100 module text-center'>Kd = ";
				echo $kd;
				echo "</div>";
			}
		?>
</section>
	
</body>
</html>
