<!DOCTYPE html>
<html>
<?php 
if($_COOKIE["usercheck"]!="login_success"){
	
	Header("Location: login.php");
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
html,body{margin:0;padding:0;}
#map_canvas { height: 100% }
</style>
<?php require("mapFunction.php");?>
<title>道路施工质量监控系统</title>
</head>
<body onload="initialize()">
<table width="1024" border="0" align="center" cellspacing="0">
  <tr>
  	<td align="center" colspan="5"><a href="index.php"><img src="Image/Head.jpg" /></a></td>
  </tr>
  <tr bgcolor="#999999">
  	<td align="center" width="205"><a href="home.php">首页</a></td>
    <td align="center" width="205"><a href="data.php">数据采集</a></td>
    <td align="center" width="204"><a href="map.php">车辆跟踪</a></td>
    <td align="center" width="205"><a href="video.php">视频监控</a></td>
    <td align="center" width="205"><a href="admin.php">后台管理</a></td>
  </tr>  
  <tr>
  	<td align="center" colspan="5">
      <table border="1" align="center" cellspacing="0">
        <tr>
          <th colspan="5">运输车GPS定位数据</th>
        </tr>
        <tr>
          <th>序号</th>
          <th>日期</th>
          <th>时间</th>
          <th>纬度</th>
          <th>经度</th>
        </tr>
        <?php showLocation($row,$rowCounter);?>
      </table>
</table>
<table align="center" width="1024">
 <tr> 
 <td height="450">
 <div id="map_canvas" style="width:100%; height:100%"></div>
 </td> 
 </tr>
</table>

</body>
</html>