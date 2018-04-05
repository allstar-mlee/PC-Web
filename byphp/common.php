<?php
date_default_timezone_set("Asia/Seoul");

if(!function_exists('pj_code')) {
	function pj_code($str) {
		$enc='';
		$len=strlen($str);
		while($len--) {
			$enc.=base_convert(ord(substr($str,$len,1)),10,36).'-';
		}
		return $enc;
	}
}
if(!function_exists('pj_decode')) {
	function pj_decode($str) {
		$dec='';
		$ords=explode('-',$str);
		$c=count($ords);
		while($c--) {
			$dec.=chr(base_convert($ords[$c],36,10));
		}
		return $dec;
	}
}

if(!function_exists('Jcurl')) {
	function Jcurl($method='get',$url,$params) {
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_HEADER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($ch,CURLOPT_TIMEOUT,30);
	//	curl_setopt($ch,CURLOPT_HTTPHEADER,array());
		if(strtolower($method)=='post') {
			curl_setopt($ch,CURLOPT_POST,true);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
		}
		elseif(strtolower($method)=='put') {
			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
			curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
		}
		elseif(strtolower($method)=='delete') {
			curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
		}
	//	curl_setopt($ch,CURLOPT_COOKIE,'');
	//	curl_setopt($ch,CURLOPT_REFERER,'');
	//	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0');
	//	curl_setopt($ch,CURLOPT_ENCODING,'gzip, deflate');
		$resp=curl_exec($ch);
		curl_close($ch);
		return $resp;
	}
}

session_start();

if($_SERVER['QUERY_STRING']=='logout') {
	$_SESSION['identifier']=false;
	echo '<script type="text/javascript">';
	echo 'self.location.replace("./index.php");';
	echo '</script>';
	exit;
}


if(!array_key_exists('identifier',$_SESSION)) {
	$_SESSION['identifier']=false;
}

$mbsx=array(
	'login'=>false,
);

if($_SESSION['identifier']!==false) {
	$ss=json_decode($_SESSION['identifier'],true);
	if(isset($ss['email'])&&isset($ss['token'])) {
		$rsp=Jcurl('GET','https://api.allstarbit.com/public/user/'.$ss['email'].'/'.$ss['token'],false);
		$rsx=json_decode($rsp,true);
		if(json_last_error()==JSON_ERROR_NONE) {
			if(isset($rsx['data'])) {
				if(
					is_array($rsx['data'])
					&&
					(isset($rsx['data']['email'])&&$rsx['data']['email']==$ss['email'])
					&&
					(isset($rsx['data']['password'])&&$rsx['data']['password']==$ss['token'])
				) {
					$mbsx['login']=true;
					$mbsx['token']=$ss['token'];
					foreach($rsx['data'] as $key=>$row) {
						if(!array_key_exists($key,$mbsx))	$mbsx[$key]=$row;
					}
				}
			}
		}
	}
}
if($mbsx['login']!==true) {
	$_SESSION['identifier']=false;
}

require_once(__DIR__.'/global-wallet-names.php');
$_global_wallet_names=array();
for($x=0; $x<sizeof($upbit); $x++) {
	for($y=0; $y<sizeof($upbit[$x]); $y++) {
		if(!array_key_exists(strtoupper($upbit[$x][$y]),$_global_wallet_names)) {
			if(isset($upbitKOR[$x][$y])) {
				$_global_wallet_names[strtoupper($upbit[$x][$y])]=array(
					'ko'=>$upbitKOR[$x][$y],
					'group'=>$x,
				);
			}
		}
	}
}

?>