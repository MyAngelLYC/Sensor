<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
if($_COOKIE["usercheck"]!="login_success"){
	
	Header("Location: login.php");
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>道路施工质量监控系统</title>
<style type="text/css">
html,body{margin:0;padding:0;}
</style>
</head>

<body>
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
          <th colspan="6">视频监控摄像头列表</th>
        </tr>
        <tr>
          <th>序号</th>
          <th>名称</th>
          <th>MAC</th>
          <th>IP</th>
          <th>端口</th>
          <th>操作</th>
        </tr>
          <?php 
          	$link=mysql_pconnect("localhost","root","123") or die("链接出错：".mysql_error());          	
          	$result = mysql_db_query("Sensor","select No,Name,MAC,IP,Port from Camera");
          	while($row=mysql_fetch_row($result))
          	{
          		echo "<tr>";
          		echo "<th>".$row[0]."</th>";
          		echo "<th>".$row[1]."</th>";
          		echo "<th>".$row[2]."</th>";
          		echo "<th>".$row[3]."</th>";
          		echo "<th>".$row[4]."</th>";
			echo "<th><a href=http://".$row[3].":".$row[4].">打开</a></th>";
          		echo "</tr>";
          	}
          	mysql_free_result($result);
          	mysql_close($link); 
          ?>       
      </table>
    </td>
  </tr>
</table>
</body>
</html>
