<?php 
Class changeurl{
	// 声明变量

	protected  $httpurl;//http ftp https url 1
	protected  $thuurl;// 迅雷地址 2
	protected  $FGurl;//快车链接 3
	protected  $qqurl;//旋风链接 4

	/**
	*本方法是把所给我链接转化成http的
	*@param str 字符串地址
	*@return $url http地址 
	*/
	public function check($str)
	{

		// 正则匹配
		// $str = base64_decode($str);
		if(stristr($str,"thunder://")){
			$str = substr($str,10);
			$str = base64_decode($str);
			$str = substr($str,2,-2);
			return $str;
		}
		if(stristr($str,"flashget://")){
			$str = substr($str,11);
			$str = base64_decode($str);
			$str = substr($str,10,-10);
			return $str;
		}
		if(stristr($str,"qqdl://")){
			// $data = str_replace(array('+','/','='),array('-','_',''),$str);
			$str = str_replace(' ','+',$str);
			 $str = substr($str,7);
			 
			 $str = base64_decode($str);
			return $str;
		}
		return $str;
		
	}
	/**
	*本方法返回转换完的数组
	* @param $url String 检查链接类型
	* @return $backurl $back StringArray 返回的数据类型
	*/
	public function change($url){

		$url = $this->check($url);
		$ret['http'] = $url;
		$ret['qqurl'] = 'qqdl://'.base64_encode($url);
		$ret['FGurl'] = 'flashget://'.base64_encode('[FLASHGET]'.$url.'[FLASHGET]');
		$ret['thuurl'] = 'thunder://'.base64_encode('AA'.$url.'ZZ');
		return $ret;
	}
		

}



?>