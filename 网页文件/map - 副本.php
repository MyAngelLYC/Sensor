<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<title>道路施工质量监控系统</title>
</head>
<body onLoad="initMap();">
<table width="1024" border="0" align="center" cellspacing="0">
<tr>
  	<td align="center" colspan="4"><a href="index.php"><img src="Image/Head.jpg" /></a></td>
  </tr>
  <tr bgcolor="#999999">
  	<td align="center" width="256"><a href="home.php">首页</a></td>
    <td align="center" width="256"><a href="data.php">数据采集</a></td>
    <td align="center" width="256"><a href="map.php">车辆跟踪</a></td>
    <td align="center" width="256"><a href="video.php">视频监控</a></td>
  </tr>
  
</table>
 <table align="center" width="1024">
 <tr>
 <td width="164"></td>
 <td>
	<div style="width:696px;height:550px;border:#ccc solid 1px;" id="dituContent"></div>
    </td>
 <td width="164"></td>
 </tr>
</table>
</body>
</html>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(118.790466,32.046842);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
                //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    
    initMap();//创建和初始化地图
</script>
