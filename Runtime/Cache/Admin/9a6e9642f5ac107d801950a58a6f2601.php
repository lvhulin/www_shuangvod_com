<?php if (!defined('THINK_PATH')) exit();?><?xml version="1.0" encoding="UTF-8"?>
<urlset>
<?php if(is_array($list_map)): $i = 0; $__LIST__ = $list_map;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><url>
<loc><?php echo get_base_url($siteurl,$ppvod['vod_readurl']);?></loc>
<lastmod><?php echo (date('Y-m-d',$ppvod["vod_addtime"])); ?></lastmod>
<changefreq>always</changefreq>
<priority>1.0</priority>
</url><?php endforeach; endif; else: echo "" ;endif; ?>
</urlset>