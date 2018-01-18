<?php if (!defined('THINK_PATH')) exit();?><?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
<title><?php echo ($vod_name); ?></title> 
<link><?php echo get_base_url($siteurl,$vod_readurl);?></link> 
<description><![CDATA["<?php echo (msubstr($vod_content,0,200)); ?>"]]></description> 
<language>zh-cn</language> 
<generator><?php echo ($siteurl); ?></generator> 
<webmaster><?php echo ($eamil); ?></webmaster> 
<?php if(is_array($vod_playlist)): $i = 0; $__LIST__ = $vod_playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i; if(is_array($ppvod['son'])): $i = 0; $__LIST__ = $ppvod['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvodson): $mod = ($i % 2 );++$i;?><item>
<title><?php echo (htmlspecialchars($vod_name)); echo (htmlspecialchars($vod_title)); echo ($ppvodson["playname"]); ?></title> 
<link><?php echo get_base_url($siteurl,$ppvodson['playurl']);?></link>
<description><![CDATA["<?php echo (htmlspecialchars($vod_name)); echo ($ppvodson["playname"]); ?>在线观看地址，<?php echo get_base_url($siteurl,$ppvodson['playurl']);?>"]]></description>
<pubDate><?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?></pubDate>
<category><?php echo ($vod_name); ?></category> 
<author><?php echo (htmlspecialchars($vod_actor)); ?></author>
<comments><?php echo ($sitename); ?></comments>
</item><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
</channel>
</rss>