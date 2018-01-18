var XgPlayer = {
	'Url': $xiguaurl(url,pid,false),
	'NextcacheUrl': nextpath.replace('xigua',''),
	'LastWebPage': '',
	'NextWebPage': nexturl,
	'Root': '/',
	'Buffer': '/Public/Player/loadings/baiduhd_loading.html',
	'Pase': '/Public/Player/loadings/baiduhd_loading.html',
	'Width': '100%',
	'Height': height,
	'Second': 8,
	"Installpage":'/Public/Player/xigua_installpage.html'
};

document.write('<script language="javascript" src="/Public/Player/m_xiguaplayer.js" charset="utf-8"></script>');
function $xiguaurl(onurl,pid,nextname){
	var baiduurl;
	var vodname = parent.pp_vodname.replace(/\//g,"");
	if(nextname && (onurl!='no')){
		urlnamebdhd = urls[pid].split("++")[0];
	}else{
		urlnamebdhd = urlname;
	}
	if(url.indexOf("dhd://")>0){
		onurl = onurl.split("|");
		baiduurl = onurl[0]+"|"+onurl[1]+"|"+vodname+urlnamebdhd+"[www.shuangvod.com].rmvb|";
		return(baiduurl.replace(/\+/g,' '));
	}
	return(onurl.replace(/\+/g,' '));
}