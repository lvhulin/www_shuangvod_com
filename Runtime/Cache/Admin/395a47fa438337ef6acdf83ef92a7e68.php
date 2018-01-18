<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
 if ($list_name == '国产电视剧') { $listName = '大陆剧'; } else { $listName = str_replace(['片', '电视', '国', '香', '湾', '本'], '', $list_name); } $seoName = ''; if (strpos($vod_play, 'down') !== false || strpos($vod_play, 'bt') !== false || strpos($vod_play, 'magnet') !== false ) { $seoName = '迅雷下载'; } if (strpos($vod_play, 'xigua') !== false || strpos($vod_play, 'm3u8') !== false) { $seoName .= '_在线观看'; } ?>
    <title><?php if(($list_pid) == "2"): echo ($vod_name); echo ($seoName); ?>_<?php echo ($listName); ?>_<?php endif; if(($list_pid) == "1"): echo ($vod_name); ?>迅雷下载_电影_<?php endif; if(($list_id) == "3"): echo ($vod_name); ?>迅雷下载_动漫_<?php endif; if(($list_id) == "4"): echo ($vod_name); ?>迅雷下载_综艺_<?php endif; echo ($sitename); ?></title>
    <?php if(($list_pid) == "2"): ?><meta name="keywords" content="<?php echo ($vod_name); ?>迅雷下载,<?php echo ($vod_name); ?>全集,<?php echo ($vod_name); echo ($listName); ?>">
        <meta name="description" content="<?php echo ($sitename); ?>为您提供<?php echo ($listName); echo ($vod_name); ?>全集<?php echo ($seoName); ?>,剧情介绍：<?php echo (msubstr(h($vod_content),0,100)); ?>"><?php endif; ?>
    <?php if(($list_pid) == "1"): ?><meta name="keywords" content="<?php echo ($vod_name); ?>高清,<?php echo ($vod_name); echo ($listName); ?>,<?php echo ($vod_name); ?>迅雷下载">
        <meta name="description" content="<?php echo ($sitename); ?>为您提供<?php echo ($listName); echo ($vod_name); ?>高清<?php echo ($seoName); ?>，剧情介绍：<?php echo (msubstr(h($vod_content),0,100)); ?>"><?php endif; ?>
    <?php if(($list_id) == "3"): ?><meta name="keywords" content="<?php echo ($vod_name); ?>迅雷下载">
        <meta name="description" content="<?php echo ($sitename); ?>为您提供<?php echo ($listName); echo ($vod_name); echo ($seoName); ?>，剧情介绍：<?php echo (msubstr(h($vod_content),0,100)); ?>"><?php endif; ?>
    <?php if(($list_id) == "4"): ?><meta name="keywords" content="<?php echo ($vod_name); ?>迅雷下载">
        <meta name="description" content="<?php echo ($sitename); ?>为您提供<?php echo ($listName); echo ($vod_name); echo ($seoName); ?>；介绍：<?php echo (msubstr(h($vod_content),0,100)); ?>"><?php endif; ?>
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
    	<div class="top">
    		<h3><span><a href="<?php echo ($vod_rssurl); ?>" target="_blank">订阅更新</a></span><a href="<?php echo ($root); ?>">首页</a> > <a href="<?php echo ($list_url); ?>"><?php echo ($list_name); ?></a> > <a href="<?php echo ($vod_readurl); ?>"><?php echo ($vod_name); ?></a></h3>
        </div>
        <div class="vod_l">
          <p class="pic"><a href="<?php echo ($vod_readurl); ?>"><img class="lazy" data-original="<?php echo ($vod_picurl); ?>" src="<?php echo ($vod_picurl); ?>" alt="<?php echo ($vod_name); ?>剧照" /></a></p>
            <p class="title w"><?php echo ($vod_name); ?>
                <span>
                    <?php if(!empty($vod_title)): echo ($vod_title); ?>
                    <?php else: ?>
                        <?php if(($list_pid == 2) OR ($list_id == 3) OR ($list_id == 4)): if(($vod_continu) != "0"): if(!empty($vod_tvcont)): echo ($vod_tvcont); else: ?>连载中,待更新<?php endif; ?>
                            <?php else: ?>
                                <?php if(!empty($vod_total)): ?>共<?php echo preg_replace('/\D/s', '', $vod_total); ?>
                                    <?php if(($list_id) == "4"): ?>期<?php else: ?>集<?php endif; ?>全<?php else: if(!empty($vod_title)): echo ($vod_title); else: ?>连载中,待更新<?php endif; endif; endif; endif; endif; ?>
                </span>
            </p>
          <p class="w">影片类型：<a href="<?php echo ($list_url); ?>"><?php echo ($list_name); ?></a> <?php echo (ff_mcat_name($vod_mcid)); ?></p>
          <p class="w space">
              <?php if(($list_id) == "4"): ?>主持人：<?php else: ?>影片主演：<?php endif; if(!empty($vod_actor)): echo (ff_search_url($vod_actor)); else: ?>未录入<?php endif; ?></p>
          <p class="w">
              <?php if(($list_id) == "4"): ?>播出电视台：<?php else: ?>影片导演：<?php endif; if(!empty($vod_director)): echo (ff_search_url($vod_director)); else: ?>未录入<?php endif; ?>
          </p>
          <p class="w">出产地区：<span><?php echo ((isset($vod_area) && ($vod_area !== ""))?($vod_area):'未知'); ?></span>上映时间：<?php echo ((isset($vod_year) && ($vod_year !== ""))?($vod_year):'未录入'); ?></p>
          <p class="w">对白语言：<span><?php echo ((isset($vod_language) && ($vod_language !== ""))?($vod_language):'未知'); ?></span>更新时间：<?php echo (date('Y-m-d',$vod_addtime)); ?></p>
          <p class="up">请您打分：<?php if(c(url_html) == 1): ?><a href="javascript:void(0)" class="Up" id="Up">顶(<span><?php echo ($vod_up); ?></span>)</a><a href="javascript:void(0)" class="Down" id="Down">踩(<span><?php echo ($vod_down); ?></span>)</a>
<?php else: ?>
<a href="javascript:void(0)" class="Up">顶(<span><?php echo ($vod_up); ?></span>)</a><a href="javascript:void(0)" class="Down">踩(<span><?php echo ($vod_down); ?></span>)</a><?php endif; ?>
</label></p>
          <p class="k"><div class="vod_r_tool">
            <div class="bdsharebuttonbox" data-tag="share_1">
                <p class="els-ico" id="hony-share-services">
                    <a rel="nofollow" class="bds_more" data-cmd="more">更多</a>
                    <a rel="nofollow" class="s-sina" data-cmd="tsina"></a>
                    <a rel="nofollow" class="s-qzone" data-cmd="qzone"></a>
                    <a rel="nofollow" class="s-dou" data-cmd="weixin"></a>
                    <a rel="nofollow" class="s-ren" data-cmd="sqq"></a>
                </p>
            </div>
        <script>
            window._bd_share_config = {common : {bdText : '<?php echo ($vod_name); ?>',bdDesc : '<?php echo (msubstr(h($vod_content),0,160)); ?>',bdUrl : '<?php echo rtrim($siteurl,'/'); echo ($thisurl); ?>', bdPic : '<?php echo ($vod_picurl); ?>'},share : [{"bdSize" :4}]}
            with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
        </script>
    </div>
          </p>
</div>
        <div class="vod_r"><?php echo getadsurl('vod300');?></div>
    </div>
<script charset="utf-8" src="<?php echo ($tpl); ?>/style/js/shuangvod_down.js"></script>
    <?php if(!empty($vod_playlist)): ?><div class="box2">
        <?php if(is_array($vod_playlist)): $playerkey = 0; $__LIST__ = $vod_playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($playerkey % 2 );++$playerkey;?><h3><div><?php if(($ppvod['playname'] == xigua)): ?><span><a target="_blank" href="/down/xiguan_faq.html">西瓜影音在线观看帮助</a></span><?php endif; echo ($ppvod["playername"]); ?>在线观看
        </div></h3>
        <div class="playlist wbox">
            <?php $countjii=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);$count=count($ppvod['son']);} ?>
            <?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): $mod = ($iii % 2 );++$iii;?><a class="play-li" <?php if(($iii) > "25"): ?>rel="h" style="display:none;"<?php endif; ?> href="<?php echo ($ppvodson["playurl"]); ?>" target="_blank"><?php echo ($ppvodson["playname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(($count) > "25"): ?><a class="play-li btn" href="javascript:void(0)" re="<?php echo ($count); ?>">查看全部<?php echo ($count); ?>集</a><?php endif; ?>
        </div>
        <?php if(($playerkey) == "1"): ?><div class="vod960"><?php echo getadsurl('vod960');?></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div><?php endif; ?>
    <?php if(!empty($vod_downlist)): ?><div class="box2">
            <?php if(is_array($vod_downlist)): $playerkey = 0; $__LIST__ = $vod_downlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($playerkey % 2 );++$playerkey;?><h3><div><?php if(($ppvod['playname'] == down)): ?><span><a target="_blank" href="/down/down_faq.html">下载帮助</a></span><?php endif; echo ($ppvod["playername"]); ?>
                </div></h3>
                <div class="playlist wbox">
                    <?php $countjii=count($ppvod['son'])-1;if($ppvod['son']>10){krsort($ppvod['son']);$count=count($ppvod['son']);} ?>
                    <?php if(($ppvod['playname'] == down) OR ($ppvod['playname'] == magnet)): ?><div class="down_list">
                            <ul class="downurl" id="ul<?php echo ($playerkey); ?>">
                                <?php if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): $mod = ($i % 2 );++$i; $prefix = 'ftp://dy.d@shuangvod.com:1121/'; $vName = $ppvodson['playname'].'[双视影院shuangvod.com]'; $downName = $ppvodson['playname']; if (strpos($ppvodson['playpath'], 'thunder://') === false && strpos($ppvodson['playpath'], 'magnet:') === false) { $suffix = strrchr($ppvodson['playpath'],'.'); $xldown = 'AA'.$ppvodson['playpath'].'ZZ'; $ppvodson['playpath'] = 'thunder://'.base64_encode($xldown); $downName = $prefix.$vName.$suffix; } if (strpos($ppvodson['playpath'], 'thunder://') !== false) { $downUrl = trim(str_replace('thunder://', '', $ppvodson['playpath'])); $downUrl = base64_decode($downUrl); $downUrl = trim(str_replace(['AA','ZZ'], '', $downUrl)); $suffix = strrchr($downUrl,'.'); $downUrl = base64_decode($downUrl); $downName = $prefix.$vName.$suffix; } ?>
                                    <li id="li<?php echo ($playerkey); ?>_<?php echo ($i-1); ?>"><a href="<?php echo ($ppvodson['playpath']); ?>" title="<?php echo ($ppvodson["playname"]); ?>" target="_self"><?php echo ($ppvodson["playname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <script>echoDown(<?php echo ($playerkey); ?>);</script>
                            </ul>
                            <div class="ckall">
                        <span>
                            <input id="allcheck<?php echo ($playerkey); ?>" onclick="CheckAll(<?php echo ($playerkey); ?>)" type="checkbox" name="checkall"><em>全选</em>
                        </span>
                                <p>
                                    <a href="javascript:void(0);" onclick="zhongxz(<?php echo ($playerkey); ?>)" target="_self">迅雷下载选中的文件</a>
                                </p>
                            </div>
                        </div>
                        <?php elseif(($ppvod['playname'] == bt)): ?>
                        <div class="bt">
                            <ul>
                                <?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): $mod = ($iii % 2 );++$iii;?><li><a href="<?php echo ($ppvodson["playpath"]); ?>" title="<?php echo ($ppvodson["playname"]); ?>"><?php echo ($ppvodson["playname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>
                        <?php else: ?>
                        <?php if(is_array($ppvod['son'])): $iii = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): $mod = ($iii % 2 );++$iii;?><a class="play-li" <?php if(($iii) > "25"): ?>rel="h" style="display:none;"<?php endif; ?> href="<?php echo ($ppvodson["playurl"]); ?>" target="_blank"><?php echo ($ppvodson["playname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(($count) > "25"): ?><a class="play-li btn" href="javascript:void(0)" re="<?php echo ($count); ?>">查看全部<?php echo ($count); ?>集</a><?php endif; endif; ?>
                </div>
                <?php if(($playerkey) == "1"): endif; endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>
    <div class="box2 vod_hot">
        <h3><div>猜您喜欢</div></h3>
        <ul class="hot wbox">
            <?php $mcid=str_replace(array('/','|',' ','，','、'),',',$vod_mcid); $mcid=implode(',',array_slice(explode(',',$mcid),0,2)); $vod_gold=ff_mysql_vod('mcid:'.$mcid.';cid:'.$vod_cid.';limit:30;field:vod_id,vod_name,vod_cid,vod_letters,vod_title,vod_gold,vod_pic,vod_gold,vod_total,vod_continu,vod_actor,vod_mcid,vod_addtime;order:vod_stars desc,vod_hits desc'); if(!$vod_gold) { $vod_gold=ff_mysql_vod('cid:'.$vod_cid.';limit:30;field:vod_id,vod_name,vod_cid,vod_letters,vod_title,vod_gold,vod_pic,vod_gold,vod_total,vod_continu,vod_actor,vod_mcid,vod_addtime;order:vod_id desc'); } if ($vod_gold) { $ids = []; $data = []; foreach($vod_gold as $k=>$v) { if ($v['vod_id'] == $vod_id) { continue; } $id = $v['vod_id']; $ids[] = $id; $data[$id] = $v; } $ids = array_unique($ids); $ids = array_slice($ids, 0, 14); $vod_gold = []; foreach($ids as $id) { if ($id == $vod_id) { continue; } $vod_gold[] = $data[$id]; } } else { $vod_gold = []; } ?>
        <?php if(is_array($vod_gold)): $i = 0; $__LIST__ = $vod_gold;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><li>
                <p>
                    <a href="<?php echo ($ppvod["vod_readurl"]); ?>"><img class="lazy" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" src="<?php echo ($ppvod["vod_picurl"]); ?>" alt="<?php echo ($ppvod["vod_name"]); ?>" /></a>
                </p>
                <h4 class="space"><a href="<?php echo ($ppvod["vod_readurl"]); ?>"><?php echo (msubstr($ppvod["vod_name"],0,12)); ?></a></h4>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
     <div class="box2">
        <h3><div>剧情介绍</div></h3>
        <div class="vod_content">
<?php
echo htmlspecialchars_decode(ff_content_url($vod_content, $Tag)); ?><a href="<?php echo ($vod_readurl); ?>"><?php echo ($vod_name); ?>迅雷下载</a>由<a href="<?php echo ($root); ?>"><?php echo ($sitename); ?></a>为您提供！</div>
	</div>
 <!--   <div class="top960"><?php echo getadsurl('top960');?></div>-->
    <?php echo ($vod_hits_insert); ?>
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