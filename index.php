
<?php 
// php 判断是否为 ajax 请求 
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
    // ajax 请求的处理方式 
	include 'changeurl.class.php';
	$url = $_POST['url'];
	$changeurl = new changeurl();
	$backurl = $changeurl->change($url);

	echo  json_encode($backurl);

}else{ 
    // 正常请求的处理方式 输出页面或者输出json
    $url = @$_POST['url'];
    if(!empty($url)){

    include 'changeurl.class.php';
	
	$changeurl = new changeurl();
	$backurl = $changeurl->change($url);

	echo  json_encode($backurl);


    }else{

   
?>
<html>
	<head>
		<title>旋风转换器|迅雷链接转换|快车链接|各种连接</title>
	<meta charset="utf-8">
	<meta name="description" content="可以快速转换的链接,旋风转换器,迅雷链接转换,快车链接,各种连接">
	<meta name="keywords" content="旋风转换器,迅雷链接转换,快车链接,各种连接,Bootstrap,CSS,CSS框架,CSS framework,javascript,bootcss,bootstrap开发,bootstrap代码,bootstrap入门">
	<script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
</html>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="#bottom">链接转换</a>
    </div>
   </div><!-- /.container-fluid -->
    </nav>


    <div class="row" style="margin:0 auto;">

  <div class="col-sm-12 col-md-12 center-block"  >
  	
 <div class="col-sm-12"  >
 <div class="panel panel-default" >
  <div class="panel-body">
  <label>输入链接地址支持：旋风（qqdl://），迅雷（thunder://），快车(flashget://)，和普通地址（http,https,ftp,ftps）</label>
   <div class="input-group">

      <input type="text" class="form-control" name="url" value="" id="url" placeholder="链接">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div>
	</div>
 </div>

<div class="col-sm-12 theoverdata" style="display:none;">
	 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">转换结果</h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
	<tr>
		<th>类型</th>
		<th>内容</th>
	</tr>
	<tbody>
	<tr>
		<td>http</td>
		<td class="success" id="http"></td>
	</tr>
	<tr>
			<td>旋风</td>
			<td class="warning" id="qqdl"></td>
		</tr>
	<tr>
			<td>迅雷</td>
			<td  class="danger" id="thunder"></td>
		</tr>	
	<tr>
		<td>快车</td>
		<td id="flashget"></td>
	</tr>
	</tbody>

	</table>
  </div>
</div>
</div>
  </div>
</center>
</div>
<footer class="row footer-bottom">
	<ul class="list-inline text-center">
        <li><a href="http://weibo.com/findlike" target="_blank">Powered by JearyVon</a></li><li>welcome to <a href="http://saytoyou.sinaapp.com" target="_blank">表白密信</a></li>
        <li><a href="./demo/loading/index.html">loadingdemo</a></li>
        <li><a href="./api.html">API调用说明</a></li>
      </ul>
</footer>
<script>
	$('button').click(function(){

	var url =$('#url').val();

		$.ajax({
		   type: "POST",
		   url: "index.php",
		   data: "url="+url,
		   dataType: "json",
		   success: function(m){

		    $('#http').html(m.http);
		    $("#qqdl").html(m.qqurl);
		    $('#thunder').html(m.thuurl);
		    $('#flashget').html(m.FGurl);
		    $('.theoverdata').show();
		   }
	});
	});
</script>

</body>
<?php 
 }
} ?>