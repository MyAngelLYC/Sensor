<?php
$server_ip=$_POST[dstIP];
$port = $_POST[dstPort];
$buf=$_POST[submitbuf];
$sock=@socket_create(AF_INET,SOCK_DGRAM,0);

if(!$sock){
     echo "socket create failure";
}

if($server_ip=="")
     $server_ip="10.129.7.246";
if($port=="")
     $port="8888";
if($buf=="")
     $buf="hello,how are you!\n";
	 
if(!@socket_sendto($sock,$buf,strlen($buf),0,$server_ip,$port)){
     echo "send error\n";
     socket_close($sock);
     exit();
}
$server_ip="";
$port ="";
$buf="";
socket_close($sock);
?>

发送UDP包专用网页</p>
<form action="udp.php" method="post">
IP:<input type=text name=dstIP></p>
Port:<input type=text name=dstPort></p>
Text:<input type=text name=submitbuf></p>
<input type=submit value="submit">
</form>