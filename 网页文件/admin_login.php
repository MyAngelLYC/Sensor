<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_COOKIE["from_admincheck"]))
{
	setcookie("from_admincheck","false",time()+600);
	$from_admincheck = "false";
}
else
{
	$from_admincheck = $_COOKIE["from_admincheck"];
	setcookie("from_admincheck","false",time()+600);
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
  	<td width="1024" align="center" valign="middle" colspan="5"><font face="Arial, Verdana, Helvetica, sans-serif">管理员登录</font></td>
  </tr>
  <tr>
  	<td width="1024" align="center" valign="middle" colspan="5">
      <table width="240" border="0" align="center" cellspacing="0">
      <form action="admincheck.php" method="post">
  	  <tr>
        <td width="1024" align="right" valign="middle">    
        <font face="Arial, Verdana, Helvetica, sans-serif">用户名：</font>
        <input type="text" name="adminname" value="">
        </td>
      </tr>
      <tr>
        <td width="1024" align="right" valign="middle">    
        <font face="Arial, Verdana, Helvetica, sans-serif">密码：</font>
        <input type="password" name="password" value="">
        </td>
      </tr>  
      <tr>
        <td width="1024" align="center" valign="middle">
        <input type="reset" value="取消">&nbsp;&nbsp;&nbsp;&nbsp;  
        <input type="submit" value="确定">
        </td>
      </tr>	
      </form>       
      </table>
    </td>
  </tr>
  <tr>
  	<td width="1024" align="center" valign="middle" colspan="5">
    <font face="Arial, Verdana, Helvetica, sans-serif">
    <?php
	if($from_admincheck=="true")
	{
	  $cookie = $_COOKIE["admincheck"];
	  if($cookie=="adminname_empty") echo "管理员名不能为空！";
	  else if($cookie=="password_empty") echo "管理密码不能为空！";
	  else if($cookie=="nosuchadmin") echo "该管理员不存在！";
	  else if($cookie=="password_error") echo "管理员密码错误！";
	  else if($cookie=="login_success") echo "管理员登录成功！";
	}
	?>
    </font>
    </td>
  </tr>       
</table>
</body>
</html>
