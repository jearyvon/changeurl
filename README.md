# changeurl
旋风转换器|迅雷链接转换|快车链接|各种连接|
	<h1>食用说明</h1>
		<p>把链接复制进去。</p>
		<p>然后点一下就可以了</p>
		<h3>api食用说明</h3>
		<p>api很好用哦直接用post方式把你的链接发送过来就OK了我们会返回你一个json</p>
		<p>你可以使用这个链接：<code>http://iitool.sinaapp.com/url/index.php</code></p>	
		当然也可以去把代码下载到你的电脑上。
		<p><i>本代码禁止用于商业</i></p>	
	<h1>使用方法</h1>
		可以使用我们给你的url调用这里我给出一些代码仅作为参考

<code>
	$url = "http://iitool.sinaapp.com/url/index.php";
	$youurl="";//你的链接任何类型都可以的我们会自动判断
　　$post_data = array ("url" => $youurl);
　　$ch = curl_init();
　　curl_setopt($ch, CURLOPT_URL, $url);
　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
　　// post数据
　　curl_setopt($ch, CURLOPT_POST, 1);
　　// post的变量
　　curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
　　$output = curl_exec($ch);
　　curl_close($ch);
　　//打印获得的数据
　　print_r($output);//这里输出的是json
</code>
