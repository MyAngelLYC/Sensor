<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if($_COOKIE["usercheck"]!="login_success"){
	
	Header("Location: login.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <td align="left" valign="middle" colspan="5">
      <table width="1024" align="center" border="0" cellspacing="0">
      <tr>
      <td width="150"></td>
      <td align="left">
      <font face="Arial, Verdana, Helvetica, sans-serif">
	  <b><font color="#0033FF"><?php echo $_COOKIE["username"]?></font></b>欢迎您！</p>
      
      本网站采用Linux+Apache+MySQL+PHP架构进行构建，可满足大型数据收集处理及查询功能。
      网站由<b><a href="mailto:ycliu0930@gmail.com">Yichen Liu</a></b>为您进行开发和维护。</p>
      
      本网站针对道路施工质量监控系统进行开发，可对沥青拌合站生产数据进行查询，可对运输和施工车辆进行定位
      及轨迹跟踪，并通过Google地图进行可视化显示，可实现对视频监控摄像头的统一化管理，并可在线查看各摄
      像头的监控画面，并进行相关调整。另外，系统设置了管理员后台，可以对整个网站查询和监控系统进行个性化
      设定，以更方便用户的使用和管理。</p>
      
      当您使用本系统结束时，可以点此<b><a href="logout.php">登出</a></b>！      
      </font>
      </td>
      <td width="150"></td>
      </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
