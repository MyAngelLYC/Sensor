<?php
  $row;
  $rowCounter;
  
  function readLocation(&$row,&$rowCounter)
  { 
	$link=mysql_pconnect("127.0.0.1","root","123") or die("链接出错：".mysql_error());
	mysql_select_db('Sensor',$link) or die("数据库连接出错：".mysql_error());
	$result=mysql_db_query("Sensor","select No,Date,Time,Latitude,Longitude from location");
	$rowCounter = 0;
	$row = array();
	while($row[]=mysql_fetch_row($result))
	{
		$rowCounter++;
	}
	mysql_free_result($result);
	mysql_close($link);
  }  
  readLocation($row,$rowCounter);
  
  function showLocation($row,$rowCounter)
  {
	  for($i=0;$i<$rowCounter;$i++)
	  {
		  echo "<tr>";
		  echo "<th>".$row[$i][0]."</th>";
		  echo "<th>".$row[$i][1]."</th>";
		  echo "<th>".$row[$i][2]."</th>";
		  echo "<th>".$row[$i][3]."</th>";
		  echo "<th>".$row[$i][4]."</th>";
		  echo "</tr>";
	  }
  }
  
  function addMarker($row,$rowCounter)
  {
	for($i=0;$i<$rowCounter;$i++)
	{
	   echo "var marker".$i."= new google.maps.Marker({";
	   echo "map: map,";
	   echo "animation:google.maps.Animation.DROP,";
	   echo "icon: 'Marker/marker".chr($i+65).".png',";
	   echo "position: new google.maps.LatLng(".$row[$i][3].",".$row[$i][4]."),";
	   echo "title: '位置".($i+1)."'});"; 
	}
  }
  
  function addInfoWindow($row,$rowCounter)
  {
	for($i=0;$i<$rowCounter;$i++)
	{
	  echo "var infoWindow".$i."= new google.maps.InfoWindow({";
	  echo "content:'".$row[$i][1]." ".$row[$i][2]."</br>";
	  echo "经度：".$row[$i][4]." 纬度：".$row[$i][3]."'";
	  echo "});";
	}
  }
  
  function addMarkerClickListener($rowCounter)
  {
	for($i=0;$i<$rowCounter;$i++)
	{
	  echo "google.maps.event.addListener(marker".$i.", 'click', function() {";
	  echo "infoWindow".$i.".open(map,marker".$i.");});";
	}
  }
  
  function addMarkerDblClickListener($rowCounter)
  {
	for($i=0;$i<$rowCounter;$i++)
	{
	   echo "google.maps.event.addListener(marker".$i.", 'dblclick', function() {";
	   echo "map.setZoom(13);";
	   echo "map.setCenter(marker".$i.".getPosition());});";
	}	  
  }
  
  function addPolyline1($row,$rowCounter)
  {
	echo "var PolylinePath = [";
	for($i=0;$i<$rowCounter;$i++)
	{
		echo "new google.maps.LatLng(".$row[$i][3].",".$row[$i][4].")";
		if($i!=$rowCounter-1) echo ",";
	}
	echo "];";
	echo "var CarPath = new google.maps.Polyline({";
	echo "map: map,";
	echo "strokeColor: \"#FF0000\",";
    echo "strokeOpacity: 1.0,";
    echo "strokeWeight: 2,";
	echo "path: PolylinePath,";
	echo "icons:[{icon: {path:google.maps.SymbolPath.FORWARD_OPEN_ARROW},offset: '100%'}]";
	echo "});";  
  }
  
  function addPolyline2($row,$rowCounter)
  {
	for($i=0;$i<$rowCounter;$i++)
	{
		if($i!=$rowCounter-1)
		{
		  echo "var PolylinePath".$i." = [";
		  echo "new google.maps.LatLng(".$row[$i][3].",".$row[$i][4]."),";
		  echo "new google.maps.LatLng(".$row[$i+1][3].",".$row[$i+1][4].")];";
		  echo "var CarPath".$i." = new google.maps.Polyline({";
		  echo "map: map,";
		  echo "strokeColor: \"#FF0000\",";
		  echo "strokeOpacity: 1.0,";
		  echo "strokeWeight: 2,";
		  echo "path: PolylinePath".$i.",";
		  echo "icons:[{icon: {path:google.maps.SymbolPath.FORWARD_OPEN_ARROW},offset: '50%'}]";
		  echo "});";
		}
	}
  }
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFwceXtuZiuglfDVFJ3928tzS6oNeplpg&sensor=false&region=CN">
</script>

<script type="text/javascript">
function initialize() {
  var mapOptions = {
	center: new google.maps.LatLng(<?php echo $row[0][3];?>,<?php echo $row[0][4];?>),	
	zoom: 10,
	mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"),
	  mapOptions);
  <?php
  	addMarker($row,$rowCounter);
	addPolyline2($row,$rowCounter);
	addInfoWindow($row,$rowCounter);
	addMarkerClickListener($rowCounter);
	addMarkerDblClickListener($rowCounter);
  ?>	
}
</script>