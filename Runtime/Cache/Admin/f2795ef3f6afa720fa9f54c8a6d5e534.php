<?php if (!defined('THINK_PATH')) exit(); if ($list_name == '国产电视剧') { $listName = '国产剧'; } else { $listName = str_replace(['电视', '国', '香', '湾', '本'], '', $list_name); } if($list_id){ $vod_stars = ff_mysql_vod('cid:'.$list_id.';limit:14;order:vod_hits desc'); $vod_news = ff_mysql_vod('cid:'.$list_id.';limit:36;order:vod_addtime desc'); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($listName); ?>榜单_热门<?php echo ($listName); ?>_<?php echo ($sitename); ?></title>
    <meta name="keywords" content="<?php echo ($listName); ?>榜单,热门<?php echo ($listName); ?>">
    <meta name="description" content="<?php echo ($listName); ?>榜单_热门<?php echo ($listName); ?>_<?php echo ($sitename); ?>">
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
<body><?php $vod_stars = ff_mysql_vod('cid:'.$list_id.';limit:49;order:vod_baiid desc'); ?>
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
        <div class="top"><h3><a href="/<?php echo ($list_dir); ?>/top50.html"><?php echo ($listName); ?>榜单</a></h3></div>
        <ul class="imgh4 index_stars">
            <?php if(is_array($vod_stars)): $i = 0; $__LIST__ = $vod_stars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li>
                    <p>
                        <a href="<?php echo ($ppvod["vod_readurl"]); ?>">
                            <img class="lazy" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" src="<?php echo ($tpl); ?>/style/images/js/blank.png" alt="<?php echo ($ppvod["vod_name"]); ?>" />
                        </a>
                    </p>
                    <strong><?php echo (msubstr($ppvod["vod_name"],0,9)); ?></strong>
                    <h4><a href="<?php echo ($ppvod["vod_readurl"]); ?>" title="<?php echo ($ppvod["vod_name"]); ?>">
                        <?php if(!empty($ppvod["vod_title"])): echo ($ppvod['vod_title']); ?>
                            <?php else: ?>
                            <?php if(($ppvod['vod_cid'] == 2) OR ($ppvod['vod_cid'] == 3) OR ($ppvod['vod_cid'] == 4)): if(($ppvod["vod_continu"]) != "0"): if(!empty($ppvod["vod_tvcont"])): echo ($ppvod['vod_tvcont']); else: ?>连载中,待更新<?php endif; ?>
                                    <?php else: ?>
                                    <?php if(!empty($ppvod["vod_total"])): ?>共<?php echo preg_replace('/\D/s', '', $ppvod['vod_total']); ?>
                                        <?php if(($ppvod["vod_cid"]) == "4"): ?>期<?php else: ?>集<?php endif; ?>全<?php else: if(!empty($ppvod["vod_title"])): echo ($ppvod['vod_title']); else: ?>连载中,待更新<?php endif; endif; endif; endif; endif; ?>
                    </a></h4>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        </volist></ul>
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