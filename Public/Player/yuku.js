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
	if(!isNaN(url)){
		player='<embed src="//www.tudou.com/v/'+url+'/dW5pb25faWQ9MTAyMTk1XzEwMDAwMV8wMV8wMQ/&videoClickNavigate=false&withRecommendList=false&withFirstFrame=false&autoPlay=true/v.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allownetworking="internal" allowfullscreen="true" wmode="opaque" width="'+width+'" height="'+height+'"></embed>';
	}else if(url.indexOf("youku.com")>0){
		url=url.split('/')[5];
		player='<iframe width="100%" height="'+Player.Height+'" src="'+Player.Root+'Public/Player/youku.html?s=http://www.56.com/&a='+url+'&b=youku&w='+Player.Width+'&h='+Player.Height+'" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';	
	}else{
		player='<embed id="playerswf" src="'+url+'" width="100%" height="'+height+'" type=application/x-shockwave-flash allowFullScreen="true" wmode="transparent" allownetworking="internal" allowscriptaccess="never" wmode="opaque"></embed>';
	}
	return(player);
}
playerhtml=$Showhtml();