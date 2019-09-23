<?php

// IP ou URL do Xtream-Codes
define('IP','http://www.exemplo.com:80');

function apixtream($url_api){	
$ch = curl_init();	
$timeout = 10;	
curl_setopt ($ch, CURLOPT_URL, $url_api);	
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);	
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);	
$retorno = curl_exec($ch);	
curl_close($ch);	
return $retorno;
}

/ * USING THE XTREAM API SIMPLY
 * The methods are accessed via GET or POST by sending some parameters.
 *
 * Login and Password = Required on all requests
 *
 * Call Login:
 * api.php? op = login & username = USER & password = PASSWORD
 *
 * Call Channel Categories:
 * api.php? op = channel_category & user = USER & password = PASSWORD
 *
 * Call All Channels:
 * api.php? op = channels & user = USER & password = PASSWORD
 *
 * Call Channels by Category:
 * api.php? op = channels & category = user ID = USER & password = PASSWORD
 *
 * Call Categories of Vods (Movies):
 * api.php? op = category_vods & username = USER & password = PASSWORD
 *
 * All Vods Layer (Movies):
 * api.php? op = vods & category = user ID = USER & password = PASSWORD
 *
 * Call Vods by Category:
 * api.php? op = vods & category = user ID = USER & password = PASSWORD
 *
 * Call Categories Series:
 * api.php? op = category_series & user = USER & password = PASSWORD
 *
 * Call All Series:
 * api.php? op = series & username = USER & password = PASSWORD
 *
 * Call Series by Category:
 * api.php? op = series & category = user ID = USER & password = PASSWORD
 *
 * Call Vod Info (Movie):
 * api.php? op = vod & id = user ID = USER & password = PASSWORD
 *
 * Call Series Info
 * api.php? op = series & id = user ID = USER & password = PASSWORD
 *
 * EPG Channel Summary Layer
 * api.php? op = epg_simples & id = user ID = USER & password = PASSWORD
 *
 * Full EPG Layer Per Channel
 * api.php? op = epg & id = User ID = USER & Password = PASSWORD
 *
 * Whole EPG Full Layer
 * api.php? op = epgfull & username = USER & password = PASSWORD
 *
 * Parse Call Convert M3U List to JSON
 * api.php? op = list & user = USER & password = PASSWORD
 *
 * Make calls through your browser by the URL you use there
 * Example: www.mydomain.com/api.php?op=epgfull&user=USUARY&Password=SHAKE
 *
 * Summer 1.0
 * Need to Treat and Adapt Arrys and Values
 *
* /


if($_REQUEST['op'] == 'login') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'categoria_canais') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'canais') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}


if($_REQUEST['op'] == 'categoria_vods') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'vods') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}


if($_REQUEST['op'] == 'categoria_series') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}
 
if($_REQUEST['op'] == 'series') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'serie') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_info&series_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'vod') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_info&vod_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epg_simples') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_short_epg&stream_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epg') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_simple_data_table&stream_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epgfull') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	$id = $_REQUEST['id'];
	
	$url = IP."/xmltv.php?username=$user&password=$pwd";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'lista') {
	
	$user = $_REQUEST['usuario'];
	$pwd = $_REQUEST['senha'];
	
	$url = IP."/get.php?username=$user&password=$pwd&type=m3u_plus&output=m3u8";
	
	$resposta = apixtream($url);
	
	preg_match_all('/(?P<tag>#EXTINF:-1)|(?:(?P<prop_key>[-a-z]+)=\"(?P<prop_val>[^"]+)")|(?<something>,[^\r\n]+)|(?<url>http[^\s]+)/', $resposta, $match );

	$count = count( $match[0] );

	$resultados = [];
	$index = -1;

	for( $i =0; $i < $count; $i++ ){
	    $item = $match[0][$i];

	    if( !empty($match['tag'][$i])){

	    ++$index;
	    }elseif( !empty($match['prop_key'][$i])){

	    $resultados[$index][$match['prop_key'][$i]] = $match['prop_val'][$i];
	    }elseif( !empty($match['something'][$i])){

	    $resultados[$index]['something'] = $item;
	    }elseif( !empty($match['url'][$i])){
	    
	    $resultados[$index]['url'] = $item ;
	    }
	}

	echo json_encode($resultados);
	
}


if($_REQUEST['op'] == '') {
	
	echo 'API Xtream PHP 1.0';
	
}
?>
