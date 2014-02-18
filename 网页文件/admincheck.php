<?php
  $adminname = $_POST[adminname];
  $password = $_POST[password];
  if($adminname=="")  setcookie("admincheck","adminname_empty",time()+600);
  else if($password=="")  setcookie("admincheck","password_empty",time()+600);  
  else
  {
	  $link=mysql_pconnect("localhost","root","123") or die("链接出错：".mysql_error());
	  $result = mysql_db_query("Sensor","select * from admin where adminname='".$adminname."'");
	  $row=mysql_fetch_row($result);
	  if($row[0]!=$adminname) setcookie("admincheck","nosuchadmin",time()+600);
	  else if($row[1]==$password)
	  {
	  	setcookie("admincheck","login_success",time()+600);
	  	setcookie("adminname",$adminname,time()+600);
	  }
	  else setcookie("admincheck","password_error",time()+600);	  
      mysql_free_result($result);
      mysql_close($link);
  }	

  setcookie("from_admincheck","true",time()+600);
  Header("Location: admin.php");  
?>