<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电影天堂_迅雷电影下载_<?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<script type="text/javascript">var Root='<?php echo ($root); ?>';var Sid='<?php echo ($sid); ?>';var Cid='<?php echo ($list_id); ?>';<?php if($sid == 1): ?>var Id='<?php echo ($vod_id); ?>';<?php else: ?>var Id='<?php echo ($news_id); ?>';<?php endif; ?></script>
<script charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script charset="utf-8" src="/Public/jquery/jquery.autocomplete-1.1.js"></script>
<script charset="utf-8" src="/Public/jquery/jquery.lazyload-1.8.4.js"></script>
<script charset="utf-8" src="<?php echo ($tpl); ?>style/js/shuangvod.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>style/js.css">
<link rel="stylesheet" type="text/css" href="<?php echo ($tpl); ?>style/style.css">
<link rel="alternate" media="only screen and(max-width: 640px)" href="<?php echo ($wapdomain); ?>" />
<base target="_blank" />



</head>
<body><?php $vod_stars = ff_mysql_vod('limit:14;order:vod_hits desc'); $vod_news = ff_mysql_vod('limit:36;order:vod_addtime desc'); $vod_hot_tv = ff_mysql_vod('limit:21;cid:2;order:vod_hits desc'); $vod_hot_dm = ff_mysql_vod('limit:10;cid:3;order:vod_hits desc'); $vod_hot_dy = ff_mysql_vod('limit:10;cid:1;order:vod_hits desc'); ?>
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
<div class="box">
    <div class="top"><h3><a href="<?php echo ($root); ?>">小编推荐</a></h3></div>
    <ul class="imgh4 index_stars">
        <?php if(is_array($vod_stars)): $i = 0; $__LIST__ = $vod_stars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li>
                <p>
                    <a href="<?php echo ($ppvod["vod_readurl"]); ?>">
                        <img class="lazy" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" src="<?php echo ($tpl); ?>/style/images/js/blank.png" alt="<?php echo ($ppvod["vod_name"]); ?>" />
                    </a>
                </p>
                <strong><?php echo (msubstr($ppvod["vod_name"],0,9)); ?></strong>
                <h4><a href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>"><?php echo ($ppvod["list_name"]); ?></a></h4>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    </volist></ul>
</div>
 <div class="box">
    <div class="top"><h3><span>今天到目前已更新<strong><?php echo getcount(999);?></strong>部</span><a href="<?php echo ff_mytpl_url('my_new.html');?>">最新更新节目</a></h3></div>

     <?php $vod_news = array_chunk($vod_news, 4); $total = count($vod_news); ?>

     <?php $__FOR_START_113516784__=0;$__FOR_END_113516784__=$total;for($i=$__FOR_START_113516784__;$i < $__FOR_END_113516784__;$i+=1){ $mod = $i%2 ?>
         <?php if(($mod == 0)): ?><ul class="hang2">
         <?php else: ?>
              <ul class="hang1"><?php endif; ?>
         <?php
 $data = $vod_news[$i]; ?>
         <?php if(is_array($data)): foreach($data as $key=>$ppvod): if($ppvod['list_name'] == '国产电视剧') { $listName = '国产'; } else { $listName = str_replace(['片', '电视', '国', '香', '湾', '本'], '', $ppvod['list_name']); } ?>
             <li><b><?php echo (getcolordate('m-d',$ppvod["vod_addtime"])); ?></b><a href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($listName); echo ($ppvod["vod_name"]); ?>">【<?php echo ($listName); ?>】<?php echo (getcolor($ppvod["vod_name"],$ppvod['vod_color'])); ?></a></li><?php endforeach; endif; ?>
         </ul><?php } ?>
</div>
<div class="index960"><?php echo getadsurl('index960');?></div>
<div class="index_right">
    <div class="top1">
    <div class="top"><span>排行榜</span><h2>电视剧</h2></div>
    <ul><?php if(is_array($vod_hot_tv)): $i = 0; $__LIST__ = $vod_hot_tv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li><span><?php echo ($ppvod["vod_gold"]); ?></span><h3><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></h3></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div>
    <!-- -->
    <div class="top2">
    <div class="top"><span>排行榜</span><h2>动漫</h2></div>
    <ul><?php if(is_array($vod_hot_dm)): $i = 0; $__LIST__ = $vod_hot_dm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li><span><?php echo ($ppvod["vod_gold"]); ?></span><h3><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></h3></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div>
    <!-- -->
    <div class="top3">
    <div class="top"><span>排行榜</span><h2>电影</h2></div>
    <ul><?php if(is_array($vod_hot_dy)): $i = 0; $__LIST__ = $vod_hot_dy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li><span><?php echo ($ppvod["vod_gold"]); ?></span><h3><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></h3></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div>
</div>
<div class="index_left">
    <?php $cid_arr = array(15,16,17,18,3,1); ?>
    <?php if(is_array($cid_arr)): $k = 0; $__LIST__ = $cid_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppcid): $mod = ($k % 2 );++$k; if(in_array(($ppcid), explode(',',"1,3"))): $vod_new = ff_mysql_vod('cid:'.$ppcid.';limit:30;order:vod_addtime desc'); ?>
        <div class="news1">
    <?php else: ?>
        <?php $vod_new = ff_mysql_vod('cid:'.$ppcid.';limit:12;order:vod_addtime desc'); ?>
        <div class="news2"><?php endif; ?>
        <div class="top"><span><a href="<?php echo getlistname($ppcid,'list_url');?>">显示更多</a></span>
            <h2><?php if(($ppcid) == "1"): ?>最新<?php endif; if(($ppcid) == "3"): ?>经典<?php endif; ?><a href="<?php echo getlistname($ppcid,'list_url');?>"><?php echo getlistname($ppcid);?></a></h2></div>
        <ul><?php if(is_array($vod_new)): $i = 0; $__LIST__ = $vod_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li><span><?php echo ($i); ?></span><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo ($ppvod["vod_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="links">
    <div class="title">
        <h4><span><a href="mailto:<?php echo ($email); ?>" target="_blank">申请友链</a></span>友情链接</h4>
    </div>
    <ul><?php if(is_array($list_link)): $i = 0; $__LIST__ = $list_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><a href="<?php echo ($ppvod["link_url"]); ?>" target="_blank"><?php echo ($ppvod["link_name"]); ?></a>┆<?php endforeach; endif; else: echo "" ;endif; ?></ul>
</div>
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
</div></div>
</body>
</html>