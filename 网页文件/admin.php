<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
if($_COOKIE["admincheck"]!="login_success"){
	
	Header("Location: admin_login.php");
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统管理页面</title>
<style type="text/css">
html,body{margin:0;padding:0;}
</style>
</head>

<body>
<?php echo $_COOKIE["adminname"]; ?>
</body>
</html>