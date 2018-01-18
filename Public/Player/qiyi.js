var Player = {
	'Url': url,
	'LastWebPage': '',
	'NextWebPage': nexturl,
	'Root': '/',
	'Buffer': '/Public/Player/loadings/baiduhd_loading.html',
	'Pase': '/Public/Player/loadings/baiduhd_loading.html',
	'Width': '100%',
	'Height': height,
	'Second': 8
};
function $Showhtml(){
	var player;	
		player = '<ifr' + 'ame class="embed-responsive-item" src="//api.mianbaoimg.com/odflv105/index.php?url='+url+'&type=iqiyi" width="100%" height="'+Player.height+'" frameborder="0" scrolling="no"></ifr' + 'ame>'; 
	return player;
}
playerhtml=$Showhtml();