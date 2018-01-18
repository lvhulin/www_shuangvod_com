<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='/Public/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/js/admin.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/editor/kindeditor.js"></script>
<script language="javascript">
$(document).ready(function(){
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','vod_name') == false){
			return false;
		}
		if($("#vod_cid").val()==0){
			alert('请选择分类');
			return false;
		}
	});
	$("#tabs>a").click(function(){
		var no = $(this).attr('id');
		var n = $("#tabs>a").length;
		showtab('tabs',no,n);
		$("#tabs>a").removeClass("on");
		$(this).addClass("on");
		return false;
	});
});
function changeCat(id,mcid){
	$.ajax({
		type:'get',
		url:'?s=Admin-Vod-Ajaxcat-id-'+id+'-mcid-'+mcid,
		success:function(html){
			$("#vod_cat_list").html(html);
		}
	})
}
</script>
</head>
<body class="body">
<!--图片预览框-->
<div id="showpic" class="showpic" style="display:none;"><img name="showpic_img" id="showpic_img" width="120" height="160"></div>
<script language="javascript">
// 显示标签框
function showtags($sid){
	var offset = $(".xy_tag").offset();
	var left = offset.left;
	var top = offset.top+30;
	var html = $.ajax({
		url: "?s=Admin-Tag-Showajax-sid-"+$sid,
		async: false
	}).responseText;
	$("#showtags").html(html);
	$("#showtags").css({left:left,top:top,display:""});
}
// 添加标签
function addtag($tag,$sid){
	if($sid == 1){
		var val = $('#vod_keywords').val();
		if(val!=''){
			val = val+','+$tag;
		}else{
			val = $tag;
		}
		$('#vod_keywords').val(val);		
	}else if($sid == 1){
		var val = $('#news_keywords').val();
		if(val!=''){
			val = val+','+$tag;
		}else{
			val = $tag;
		}
		$('#news_keywords').val(val);			
	}else{
		alert('tag error');
	}
}
// 关闭标签框
function tag_close(){
	$("#showtags").css('display','none');
}
</script>
<!--标签选择框-->
<div id="showtags" style="position:absolute;display:none;" class="showtags"><a href="javascript:tag_close()">关闭</a></div>
<?php if(($vod_id) > "0"): ?><form name="update" action="?s=Admin-Vod-Update" method="post" name="myform" id="myform">
<input type="hidden" name="vod_id" value="<?php echo ($vod_id); ?>">
<?php else: ?>
<form name="add" action="?s=Admin-Vod-Insert" method="post" name="myform" id="myform"><?php endif; ?> 
<div class="title">
	<div class="tabs" id="tabs"><a href="javascript:void(0)" class="on" id="1"><?php echo ($vod_tplname); ?>视频</a><a href="javascript:void(0)" id="2">其它设置</a></div>
    <div class="right"><a href="?s=Admin-Vod-Show">返回视频管理</a></div>
</div>
<div class="form">
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs1">
  <tr>
    <td class="tl">影片名称：</td>
    <td class="tr"><input type="text" name="vod_name" id="vod_name" value="<?php echo ($vod_name); ?>" maxlength="255" error="* 名称不能为空" class="w300 ti_5">
    <label><select name="vod_cid" id="vod_cid" style="width:100px" onchange="changeCat(this.value)"><option value=0>选择分类</option><?php if(is_array($listvod)): $i = 0; $__LIST__ = $listvod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"]) == $vod_cid): ?>selected<?php endif; ?>><?php echo ($ppvod["list_name"]); ?></option><?php if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"]) == $vod_cid): ?>selected<?php endif; ?>>├ <?php echo ($ppvod["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?></select></label> <label><select name="vod_status"><option value="1">显示</option><option value="0" <?php if(($vod_status) == "0"): ?>selected<?php endif; ?>>隐藏</option></select></label> <label><select name="vod_language" id="vod_language" class="w70"><?php if(!empty($vod_language)): ?><option value='<?php echo ($vod_language); ?>'><?php echo ($vod_language); ?></option><?php endif; ?><option value=''>对白</option><?php if(is_array($vod_language_list)): $i = 0; $__LIST__ = $vod_language_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> 影片时长：<label><input type="text" name="vod_length" id="vod_length" maxlength="3" value="<?php echo ($vod_length); ?>" class="w50 ct" title="单位：分钟"></label>
        拼音：<label><input type="text" name="vod_pinyin" id="vod_pinyin" maxlength="150" value="<?php echo ($vod_pinyin); ?>" class="w150 ct" title=""></label>&nbsp;<span style="display: inline-block;width: 60px;height: 30px;background: #ccc;cursor: pointer;" id="py">获取拼音</span>
    </td>
  </tr>
   <tr>
	<td class="tl">类型:</td>
		<td class="tr" id="vod_cat_list"><?php if($vod_cat_list){ foreach($vod_cat_list as $v){ $vod_mcid_arr = explode(',',$vod_mcid); ?>
			<input class="mcid" type="checkbox" name="vod_mcids[]" value="<?php echo ($v['m_cid']); ?>" <?php if (in_array($v['m_cid'],$vod_mcid_arr)){ ?>  checked="checked" <?php } ?> /><?php echo ($v['m_name']); ?>
			<?php }} ?>
		</td>
	</tr>
  <tr>
    <td class="tl">影片备注：</td>
    <td class="tr"><input type="text" name="vod_title" id="vod_title" maxlength="255" value="<?php echo ($vod_title); ?>" class="w300 ti_5"> <label><select name="vod_area" id="vod_area" style="width:100px"><?php if(!empty($vod_area)): ?><option value='<?php echo ($vod_area); ?>'><?php echo ($vod_area); ?></option><?php endif; ?><option value=''>出产地区</option><?php if(is_array($vod_area_list)): $i = 0; $__LIST__ = $vod_area_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> <lable><select name="vod_year" id="vod_year"><?php if(!empty($vod_year)): ?><option value='<?php echo ($vod_year); ?>'><?php echo ($vod_year); ?></option><?php endif; ?><option value=''>年代</option><?php if(is_array($vod_year_list)): $i = 0; $__LIST__ = $vod_year_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val); ?>"><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></label> <lable><select name="vod_isfilm" class="w70"><option value="1">已上映</option><option value="2" <?php if(($vod_isfilm) == "2"): ?>selected<?php endif; ?>>未上映</option><option value="3" <?php if(($vod_isfilm) == "3"): ?>selected<?php endif; ?>>热映中</option></select></lable></td>
  </tr>
   <tr>
    <td class="tl">周期：</td>
    <td class="tr">
<input name="vod_weekday1" type="hidden" value="<?php echo ($vod_weekday); ?>" />
    <input type="checkbox" value="1" name="vod_weekday[1]" <?php if(strripos(','.$vod_weekday,'1') > 0): ?>checked="checked"<?php endif; ?> />星期一
    <input type="checkbox" value="2" name="vod_weekday[2]" <?php if(strripos(','.$vod_weekday,'2') > 0): ?>checked="checked"<?php endif; ?> />星期二
    <input type="checkbox" value="3" name="vod_weekday[3]" <?php if(strripos(','.$vod_weekday,'3') > 0): ?>checked="checked"<?php endif; ?> />星期三
    <input type="checkbox" value="4" name="vod_weekday[4]" <?php if(strripos(','.$vod_weekday,'4') > 0): ?>checked="checked"<?php endif; ?> />星期四
    <input type="checkbox" value="5" name="vod_weekday[5]" <?php if(strripos(','.$vod_weekday,'5') > 0): ?>checked="checked"<?php endif; ?> />星期五
    <input type="checkbox" value="6" name="vod_weekday[6]" <?php if(strripos(','.$vod_weekday,'6') > 0): ?>checked="checked"<?php endif; ?> />星期六
    <input type="checkbox" value="7" name="vod_weekday[7]" <?php if(strripos(','.$vod_weekday,'7') > 0): ?>checked="checked"<?php endif; ?> />星期日
</td>
  </tr>
  <tr>
    <td class="tl">影片主演：</td>
    <td class="tr" style="position:relative"><input type="text" name="vod_actor" id="vod_actor" maxlength="255" value="<?php echo ($vod_actor); ?>" class="w300 ti_5" title="可使用半角逗号,分隔"> 上映日期：<label><input type="text" name="vod_filmtime" id="vod_filmtime" maxlength="10" value="<?php if(!empty($vod_filmtime)): echo (date('Y-m-d',$vod_filmtime)); endif; ?>" class="w100 ct" title="如：2013-07-20"></label> 更新日期：<label><input type="text" name="vod_addtime" id="vod_addtime" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w120"> <input name="checktime" type="checkbox" style="border:none;width:auto; position:absolute; top:5px" value="1" <?php echo ($checktime); ?> title="勾选则使用系统当前时间"></label></td>
  </tr>
  <tr>
    <td class="tl">影片导演：</td>
    <td class="tr"><input type="text" name="vod_director" id="vod_director" maxlength="255" value="<?php echo ($vod_director); ?>" class="w300 ti_5"> 总共集数：<label><input type="text" name="vod_total" id="vod_total" maxlength="10" value="<?php echo ($vod_total); ?>" class="w100 ct" title="如：共40集"></label> 连载信息：<label><input type="text" name="vod_continu" id="vod_continu" maxlength="15" value="<?php echo ($vod_continu); ?>" class="w120 ct" title="留空为完结"></label></td>
  </tr>  
     <tr>
  <td class="tl">电视台：</td>
  <td class="tr"> <input type="text" name="vod_diantai" id="vod_diantai" maxlength="20" value="<?php echo ($vod_diantai); ?>" class="w200 ti_5" title="多电台可使用半角逗号,分隔">&nbsp;&nbsp;<label style=" color:#666666">注：多电台可使用半角逗号,分隔</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提醒时间：<input type="text" name="vod_tvcont" id="vod_tvcont" maxlength="20" value="<?php echo ($vod_tvcont); ?>" class="w200"></td>
  </tr>    
  <tr>
    <td class="tl">海报剧照：</td>
    <td class="tr"><label style="float:left; margin-top:3px; margin-right:5px"><input type="text" name="vod_pic" id="vod_pic" maxlength="255" value="<?php echo ($vod_pic); ?>" class="w300 ti_5" onMouseOver="if(this.value)showpic(event,this.value,'Uploads/');" onMouseOut="hiddenpic();"></label><iframe src="?s=Admin-Upload-Show-sid-vod" scrolling="no" topmargin="0" width="280" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:3px; float:left"></iframe></span></td>
  </tr>
  <tr>
    <td class="tl">影片TAG：</td>
    <td class="tr"><input type="text" name="vod_keywords" id="vod_keywords"  maxlength="255" value="<?php echo ($vod_keywords); ?>" class="w300 xy_tag ti_5"> <img src="/Public/images/admin/edit.gif" onClick="javascript:showtags(1);" class="navpoint" ></td>
  </tr>
    <tr>
        <td class="tl">LOL下载采集：</td>
        <td class="tr"><input type="text" id="lolcj"  maxlength="255" value="" class="w500 xy_tag ti_5"> <span style="display: inline-block;width: 30px;height: 30px;background: #ccc;cursor: pointer;" id="lol">采集</span></td>
    </tr>
    <tr>
        <td class="tl">面包下载采集：</td>
        <td class="tr"><input type="text" id="mbcj"  maxlength="255" value="" class="w500 xy_tag ti_5"> <span style="display: inline-block;width: 30px;height: 30px;background: #ccc;cursor: pointer;" id="mb">采集</span></td>
    </tr>
    <tr>
        <td class="tl">豆瓣ID：</td>
        <td class="tr"> <input type="text" name="vod_douid" id="douid" maxlength="20" value="<?php echo ($vod_douid); ?>" class="w100 ti_5" title="">&nbsp;<input type="text" name="vod_keywords" id="vod_keywords"  maxlength="255" value="<?php echo ($vod_keywords); ?>" class="w300 xy_tag ti_5"><span style="display: inline-block;width: 30px;height: 30px;background: #ccc;cursor: pointer;" id="dbcj">采集</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;百度指数：<input type="text" name="vod_baiid" id="bd_index" maxlength="20" value="<?php echo ($vod_baiid); ?>" class="w200"></td>
    </tr>
    <script language="javascript">
	var $urln=<?php echo count($vod_url);?>;
	function addurl(){
		var $old = $("#urllist>tr:last").html();
		$urln = $("#urllist>tr").length;
		$old = $old.replace("播放地址"+$urln,"播放地址"+($urln+1));
		$("#urllist>tr:last-child").after('<tr>'+$old+'</tr>');
		$("#urllist>tr:last #vod_play").val($("#vod_play:last option").val());
		$("#urllist>tr:last #vod_server").val($("#vod_server:last option").val());
		$("#urllist>tr:last textarea").val('');
	}
  </script>
  <!--地址列表 -->
  <tbody id="urllist">
  <?php if(is_array($vod_url)): $uu = 0; $__LIST__ = $vod_url;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): $mod = ($uu % 2 );++$uu; $playername=$vod_play[$uu-1];$serverdown=$vod_server[$uu-1]; ?>
  <tr>
    <td class="tl">播放地址<?php echo ($uu); ?><br /></td>
    <td class="tr" style="padding-bottom:5px"><select name="vod_play[]" id="vod_play"><?php if(is_array($vod_play_list)): $i = 0; $__LIST__ = $vod_play_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$play): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $playername): ?>selected<?php endif; ?>><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($play[1]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="vod_server[]" id="vod_server" style="width:140px"><option value="">不使用公共前缀</option><?php if(is_array($vod_server_list)): $i = 0; $__LIST__ = $vod_server_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $serverdown): ?>selected<?php endif; ?>><?php echo ($server); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <label style=" color:#666666">注：自定义分集名称用"$"分隔，一行一集播放地址，留空则删除该组地址。</label><br><textarea name='vod_url[]' style="width:98%;height:150px;color:#333333"><?php echo ($url); ?></textarea></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <div id="downUrl"></div>
  </tbody>
  <!-- --> 
  <tr>
    <td class="tl">增加播放地址：</td>
    <td class="tr"><a href="javascript:addurl();" style="color:#FF0000;font-weight:bold;font-size:14px"><img src="/Public/images/admin/add.gif" border="0">点击这里添加一组观看地址</a></td>
  </tr>    
  <tr>
    <td class="tl">影片简介：</td>
    <td class="tr padding-5050" id="vod-content"><textarea name="vod_content" id="content" style="width:99%;height:300px;"><?php echo ($vod_content); ?></textarea></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs2" style="display:none">
  <tr>
    <td class="tl">推荐星级：</td>
    <td class="tr" id="abc"><input name="vod_stars" id="vod_stars" type="hidden" value="<?php echo ($vod_stars); ?>"><?php if(is_array($vod_starsarr)): $i = 0; $__LIST__ = $vod_starsarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajaxstar): $mod = ($i % 2 );++$i;?><img src="/Public/images/admin/star<?php echo ($ajaxstar); ?>.gif" onClick="addstars('vod',<?php echo ($i); ?>);" id="star_<?php echo ($i); ?>" class="navpoint"><?php endforeach; endif; else: echo "" ;endif; ?></td>
  </tr>  
  <tr>
    <td class="tl">标题颜色：</td>
    <td class="tr" id="abc"><select name="vod_color" id="vod_color" class="w70">
    <?php if(!empty($vod_color)): ?><option value='<?php echo ($vod_color); ?>'><?php echo ($vod_color); ?></option><?php endif; ?><option value="">颜色</option>                               
    <option value='#000000' style='background-color:#000000' <?php if(($news_color) == "#000000"): ?>selected<?php endif; ?>></option>
    <option value='#FFFFFF' style='background-color:#FFFFFF' <?php if(($news_color) == "#FFFFFF"): ?>selected<?php endif; ?>></option>
    <option value='#008000' style='background-color:#008000' <?php if(($news_color) == "#008000"): ?>selected<?php endif; ?>></option>
    <option value='#FFFF00' style='background-color:#FFFF00' <?php if(($news_color) == "#FFFF00"): ?>selected<?php endif; ?>></option>
    <option value='#FF0000' style='background-color:#FF0000' <?php if(($news_color) == "#FF0000"): ?>selected<?php endif; ?>></option>
    <option value='#0000FF' style='background-color:#0000FF' <?php if(($news_color) == "#0000FF"): ?>selected<?php endif; ?>></option>
    <option value=''>无色</option></select></td>
  </tr>
  <tr>
    <td class="tl">首字母：</td>
    <td class="tr"><input type="text" name="vod_letter" id="vod_letter" value="<?php echo ($vod_letter); ?>" maxlength="1" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">总人气：</td>
    <td class="tr"><input type="text" name="vod_hits" id="vod_hits" maxlength="15" value="<?php echo ($vod_hits); ?>" class="w50"></td>
  </tr>       
  <tr>
    <td class="tl">月人气：</td>
    <td class="tr"><input type="text" name="vod_hits_month" id="vod_hits_month" maxlength="15" value="<?php echo ($vod_hits_month); ?>" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">周人气：</td>
    <td class="tr"><input type="text" name="vod_hits_week" id="vod_hits_week" maxlength="15" value="<?php echo ($vod_hits_week); ?>" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">日人气：</td>
    <td class="tr"><input type="text" name="vod_hits_day" id="vod_hits_day" maxlength="15" value="<?php echo ($vod_hits_day); ?>" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">评分值：</td>
    <td class="tr"><input type="text" name="vod_gold" id="vod_gold" value="<?php echo ($vod_gold); ?>" maxlength="4" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">评分人数：</td>
    <td class="tr"><input type="text" name="vod_golder" id="vod_golder" value="<?php echo ($vod_golder); ?>" maxlength="8" class="w50"></td>
  </tr> 
  <tr>
    <td class="tl">顶：</td>
    <td class="tr"><input type="text" name="vod_up" id="vod_up" value="<?php echo ($vod_up); ?>" maxlength="8" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">踩：</td>
    <td class="tr"><input type="text" name="vod_down" id="vod_down" value="<?php echo ($vod_down); ?>" maxlength="8" class="w50"></td>
  </tr>
  <tr>
    <td class="tl">录入编辑：</td>
    <td class="tr"><input type="text" name="vod_inputer" id="vod_inputer" value="<?php echo ($vod_inputer); ?>" maxlength="15" class="w150"></td>
  </tr>   
  <tr>
    <td class="tl">时间：</td>
    <td class="tr"><input type="text" name="vod_addtime" id="vod_addtime" maxlength="25" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w150"> <input name="checktime" type="checkbox" style="border:none;width:auto" value="1" <?php echo ($checktime); ?> title="勾选则使用系统当前时间"></td>
  </tr> 
  <tr>
    <td class="tl">独立模板：</td>
    <td class="tr"><input type="text" name="vod_skin" id="vod_skin" value="<?php echo ($vod_skin); ?>" maxlength="25" class="w150"></td>
  </tr>  
  <tr>
    <td class="tl">来源：</td>
    <td class="tr"><input type="text" name="vod_reurl" id="vod_reurl" value="<?php echo ($vod_reurl); ?>" maxlength="150" class="w300"></td>
  </tr>              
  <tr>
    <td class="tl">跳转URL：</td>
    <td class="tr"><input type="text" name="vod_jumpurl" id="vod_jumpurl" value="<?php echo ($vod_jumpurl); ?>" maxlength="150" class="w300"></td>
  </tr>   
</table>
<ul class="footer">
	<input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置">
</ul>
</div>
</form>
<script type="text/javascript">
KE.show({
	id : 'content',
	resizeMode : 1,
	allowPreviewEmoticons : false,
	allowUpload : false,
	items : [
	'source', '|', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
	'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
	'insertunorderedlist', '|', 'image', 'link', 'unlink', 'about']
});
//KE.show({ id : 'content'});
var $content = $('#content').val();
	document.getElementById("myform").onreset = function(){
	KE.html('content', $content);
}
</script>
<br /><center>Version：<font color="#FF0000"><?php echo (L("ppvod_version")); ?></font></center>
<script type="text/javascript">

   var cateJson = '{"大陆电视剧":"15","香港电视剧":"16","台湾电视剧":"17","美国电视剧":"18","韩国电视剧":"19","日本电视剧":"20","泰国电视剧":"21","动作片":"8","喜剧片":"9","爱情片":"10","科幻片":"11","恐怖片":"12","战争片":"13","剧情片":"14","动漫":"3","综艺":"4"}';

    $(function () {
        $('#lol').click(function () {
            var url = $('#lolcj').val();
            url = url.replace('https://www.loldytt.com/', '');
            url = url.replace('/', '_');
            $.ajax({
                type : 'GET',
                url : '/index.php?s=Admin-Cj-insertcj',
                data: {name:'loldytt', url:url},
                dataType: 'json',
                success : function (res) {

                    var urls = res.urls;
                    var names = res.names;
                    var con = res.con;

                    var html = '';
                    $.each(urls, function (k, v) {

                        html +='<tr>';
                        html +='<td class="tl">下载地址'+(k+1)+'<br /></td>';
                        html +='<td class="tr" style="padding-bottom:5px">';
                        html +='<select name="vod_play[]" id="vod_play"><option value="'+names[k]+'">'+names[k]+'</select> ';
                        html +='<label style=" color:#666666">注：自定义分集名称用"$"分隔，一行一集播放地址，留空则删除该组地址。</label><br>';
                        html +='<textarea name=\'vod_url[]\' style="width:98%;height:150px;color:#333333">'+v+'</textarea></td>';
                        html +='</tr>';

                    });

                    $('#urllist').append(html);

                    //var content = '<textarea name="vod_content" id="content" style="width:99%;height:300px;">'+con+'</textarea>';
                    //$('#vod-content').empty().append(content);
                }
            });
        });

        $('#mb').click(function () {
            var url = $('#mbcj').val();
            url = url.replace('/', '_');

            var cates = $.parseJSON(cateJson);

            $.ajax({
                type : 'GET',
                url : '/index.php?s=Admin-Cj-insertcj',
                data : {name:'mianbao', url:url},
                dataType: 'json',
                success : function (res) {

                    $('#vod_name').val(res.vod_name);
                    $('#vod_actor').val(res.vod_actor);
                    $('#vod_title').val(res.vod_title);
                    $('#vod_director').val(res.vod_director);
                    $('#vod_pic').val(res.vod_pic);
                    $('#vod_language').html('<option value="'+res.vod_language+'">'+res.vod_language+'</option>');
                    $('#vod_area').html('<option value="'+res.vod_area+'">'+res.vod_area+'</option>');
                    $('#vod_year').html('<option value="'+res.vod_year+'">'+res.vod_year+'</option>');

                    var cateid = cates[res.cateName];


                    $('#vod_cid option').each(function (k, v) {
                        if ($(this).val() == cateid) {
                            $(this).attr('selected', 'selected');
                        }
                    });

                    changeCat(cateid, res.cidName);


                    $('.mcid').each(function () {
                        console.log($(this))
                    });


                    var html = '';
                    html +='<tr>';
                    html +='<td class="tl">下载地址1<br /></td>';
                    html +='<td class="tr" style="padding-bottom:5px">';
                    html +='<select name="vod_play[]" id="vod_play"><option value="down">down</select> ';
                    html +='<label style=" color:#666666">注：自定义分集名称用"$"分隔，一行一集播放地址，留空则删除该组地址。</label><br>';
                    html +='<textarea name="vod_url[]" style="width:98%;height:150px;color:#333333">'+res.down+'</textarea></td>';
                    html +='</tr>';
                    $('#urllist').append(html);

                    var con = '<textarea name="vod_content" id="content" style="width:99%;height:300px;">'+res.vod_content+'</textarea>';

                    $('#vod-content').empty().append(con);


                }
            });
        });


        $('#py').click(function () {
            var name = $('#vod_name').val();
            $.ajax({
                type : 'GET',
                url : '/index.php?s=Admin-Cj-getPinyin',
                data : {name:name},
                dataType: 'json',
                success : function (res) {
                    $('#vod_pinyin').val(res.data);
                }
            });
        });

    });
</script>
</body>
</html>