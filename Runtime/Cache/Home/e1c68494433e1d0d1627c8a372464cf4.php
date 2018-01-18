<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php if(!empty($list_keywords)): echo ($list_keywords); else: ?>最新<?php echo ($list_name); ?>,<?php echo ($keywords); endif; ?>">
<meta name="description" content="最新<?php echo ($list_name); ?>包含的影片有<?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i; echo (msubstr($ppvod["vod_name"],0,10)); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>完全免费在线观看！">
<script type="text/javascript">var Root='<?php echo ($root); ?>';var Sid='<?php echo ($sid); ?>';var Cid='<?php echo ($list_id); ?>';<?php if($sid == 1): ?>var Id='<?php echo ($vod_id); ?>';<?php else: ?>var Id='<?php echo ($news_id); ?>';<?php endif; ?></script>
<script charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script charset="utf-8" src="/Public/jquery/jquery.autocomplete-1.1.js"></script>
<script charset="utf-8" src="/Public/jquery/jquery.lazyload-1.8.4.js"></script>
<script charset="utf-8" src="<?php echo ($tpl); ?>style/js/shuangvod.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>style/js.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>style/style.css">
<link rel="alternate" media="only screen and(max-width: 640px)" href="<?php echo ($wapdomain); ?>" />
<base target="_blank" />
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>



</head>
<body>
<?php $vod_list = ff_mysql_vod('tag:'.$tag_name.';limit:8;page:true;order:vod_addtime desc,vod_id desc');$page = $vod_list[0]['page']; ?>
<div class="wrap">
    <div class="topbar">
    <span><a href="<?php echo ($url_guestbook); ?>">留言反馈</a></span>
    <span class="br"><a href="javascript:void(0)" onclick="AddFavorite('<?php echo ($sitename); ?>',location.href)">收藏<?php echo ($sitename); ?></a></span>
    <span class="br"><a href="http://m.shuangvod.com/"><?php echo ($sitename); ?>手机版 <b>m.shuangvod.com</b></a></span>
</div>
<div class="header">
    <div class="logo-box">
        <div class="logo"><a href="<?php echo ($root); ?>"></a></div>
        <div class="search-box">
            <form id="ffsearch" name="ffsearch" method="post" action="<?php echo ($root); ?>index.php?s=vod-search">
                <input type="text" name="wd" id="wd" class="search-input" value="<?php echo ($wd); ?>"/>
                <input type="submit" value="搜索一下" class="search-submit"/>
            </form>
        </div>
    </div>
    <div class="nav">
        <a <?php if(($list_id == null) OR ($list_id > 14)): ?>class="on cur"<?php endif; ?> href="<?php echo ($root); ?>">首页</a>
        <?php if(is_array($list_menu)): $i = 0; $__LIST__ = $list_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i; if(($ppvod['list_id'] == 1) OR ($ppvod['list_id'] == 3) OR ($ppvod['list_id'] == 4)): if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><a href="<?php echo ($ppvod["list_url"]); ?>" <?php if(($ppvod["list_id"]) == $list_id): ?>class="on cur"<?php endif; if(($ppvod["list_id"]) == $list_pid): ?>class="on cur"<?php endif; ?>>最新<?php echo ($ppvod["list_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            <?php if(($ppvod['list_id'] == 3)): ?><a <?php if(($ppvod["list_id"]) == $list_id): ?>class="on cur"<?php endif; ?> href="<?php echo getlistname($ppvod['list_id'],'list_url');?>">最新<?php echo ($ppvod['list_name']); ?></a><?php endif; ?>
            <?php if(($ppvod['list_id'] == 4)): ?><a <?php if(($ppvod["list_id"]) == $list_id): ?>class="on cur"<?php endif; ?> href="<?php echo getlistname($ppvod['list_id'],'list_url');?>">最新<?php echo ($ppvod['list_name']); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="query">
        <div>
        <?php
 $listAs = ['国产电视剧'=>'国产剧', '香港电视剧'=>'港剧', '美国电视剧'=>'美剧', '台湾电视剧'=>'台湾剧', '日本电视剧'=>'日剧', '韩国电视剧'=>'韩剧', '泰国电视剧'=>'泰剧']; ?>
        <?php if(is_array($list_menu)): $i = 0; $__LIST__ = $list_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i; if(($ppvod['list_id'] == 2)): if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><a href="<?php echo ($ppvod["list_url"]); ?>">最新<?php echo $listAs[$ppvod['list_name']] ?></a><span>|</span><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
            <a href="<?php echo ff_mytpl_url('my_new.html');?>">今日更新</a>
        </div>
    </div>
</div>
<div class="top960"><?php echo getadsurl('top960');?></div>
    <div class="vodlist_l box">
      <div class="top">
		<h3><a href="<?php echo ($root); ?>">首页</a></label> > <a href="<?php echo ($tag_url); ?>"><?php echo ($tag_name); ?></a></h3>
      </div>
      <?php if(($vod_list["0"]["count"]) != "0"): if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><ul><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><img src="<?php echo ($ppvod["vod_picurl"]); ?>" alt="点击播放《<?php echo ($ppvod["vod_name"]); ?>》" /></a>
        <h2><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a><em><?php echo ($ppvod["vod_gold"]); ?></em><?php if(!empty($ppvod["vod_title"])): ?><span><?php echo ($ppvod["vod_title"]); ?></span><?php endif; ?></h2>
        <p class="space">主演∶<?php echo (ff_search_url($ppvod["vod_actor"])); ?></p>
        <p>地区∶<?php echo ((isset($ppvod["vod_area"]) && ($ppvod["vod_area"] !== ""))?($ppvod["vod_area"]):'未录入'); ?> 上映时间∶<?php echo (date('Y-m-d',$ppvod["vod_addtime"])); ?></p>
        <p class="content"><?php echo (msubstr($ppvod["vod_content"],0,100,'utf-8',true)); ?></p>
        <p><a href="<?php echo ($ppvod["vod_readurl"]); ?>">影片详情</a> | <a href="<?php echo ($ppvod["vod_readurl"]); ?>">下载观看</a> | 影评(<?php echo ($ppvod["vod_golder"]); ?>)</p>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="pages"><?php echo ($page); ?></div>
      <?php else: ?>
       	 <ul>该分类暂无数据！</ul><?php endif; ?>    
    </div>
    <div class="vodlist_r box">
    	<div class="top">
    		<h3><span>评分</span><a href="<?php echo ($list_url); ?>"><?php echo ($list_name); ?> 排行榜</a></h3>
        </div>
        <ul><?php $gold_desc = ff_mysql_vod('cid:'.$list_id.';limit:30;order:vod_gold desc,vod_hits desc'); if(is_array($gold_desc)): $i = 0; $__LIST__ = $gold_desc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li><span><?php echo ($ppvod["vod_gold"]); ?></span><em><?php echo ($i); ?></em><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo (msubstr($ppvod["vod_name"],0,12)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>        
    </div>     
    <div class="blank"></div>
   <div class="ft">
    <div class="ft_l">
      <p>友情提示：请勿长时间观看影视，注意保护视力并预防近视，合理安排时间，享受健康生活。</p>
       <?php if(($vod_name != '')): ?><p>相关事项：如果<?php echo ($vod_name); ?>迅雷下载地址无意侵犯了您的权益，请来邮件(<?php echo ($email); ?>)告知，我们会及时进行处理。</p><?php endif; ?>
      <p>版权声明：本网站为非赢利性站点，本网站所有内容均来源于互联网相关站点自动搜索采集信息，相关链接已经注明来源。</p>
      <p>免责声明：本网站将逐步删除和规避程序自动搜索采集到的不提供分享的版权影视。本站仅供测试和学习交流。请大家支持正版。</p>
    </div>
    <div class="ft_r">
      <ul>
      	<li><a href="<?php echo ($url_map_rss); ?>" target="_blank">Rss</a></li>
        <li><a href="<?php echo ($url_map_baidu); ?>" target="_blank">SiteMap</a></li>
        <li><a href="mailto:<?php echo ($email); ?>" >联系我们</a></li>
        <li><?php echo ($tongji); ?></li>
      </ul>
    </div>
</div>  
</div>
</body>
</html>