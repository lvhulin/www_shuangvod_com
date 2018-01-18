<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新<?php echo (getlistname($type_id)); ?>-<?php echo ($list_dir); echo ($list_name_big); echo ($list_name); ?>-2011最新<?php echo ($list_name); echo ($list_title); ?></title>
<meta name="keywords" content="<?php if(!empty($list_keywords)): echo ($list_keywords); else: ?>最新<?php echo ($list_name); ?>,<?php echo ($keywords); endif; ?>">
<meta name="description" content="最新<?php echo ($list_name); ?>包含的影片有<?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i; echo (msubstr($ppvod["vod_name"],0,10)); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>完全免费在线观看！">

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
    <div class="type left box">
    	<div class="top">
			<h3>分类检索</h3>
        </div>
        <ul><?php if(is_array($list_menu)): $i = 0; $__LIST__ = $list_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cid): $mod = ($i % 2 );++$i;?><li><a href="<?php echo UU('Home-vod/type',array('id'=>$cid['list_id'],'wd'=>'','letter'=>'','year'=>0,'area'=>'','order'=>'addtime','p'=>1),false,true);?>" class="<?php if(($type_id) == $cid['list_id']): ?>hover<?php endif; if(($type_pid) == $cid['list_id']): ?>hover<?php endif; ?>"><?php echo ($cid["list_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </div>   
    <div class="type right box">
       	<div class="top"><h3>影片索引<span><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>'','letter'=>'','year'=>0,'area'=>'','order'=>'addtime','p'=>1),false,true);?>" class="f14">重置条件</a></span></h3></div>
<?php $array_area = explode(',',C('play_area')); $array_year = explode(',',C('play_year')); if($type_pid){ $array_list = getlistarr($type_pid); $type_cid = $type_pid; }else{ $array_list = getlistarr($type_id); $type_cid = $type_id; } ?>        
        <ul class="select">
        <?php if(!empty($array_list)): ?><li><span>类型</span><a href="<?php echo UU('Home-vod/type',array('id'=>$type_cid,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>$type_area,'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_pid) == "0"): ?>hover<?php endif; ?>">全部</a> <?php if(is_array($array_list)): $i = 0; $__LIST__ = $array_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cid): $mod = ($i % 2 );++$i;?><a href="<?php echo UU('Home-vod/type',array('id'=>$cid,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>$type_area,'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_id) == $cid): ?>hover<?php endif; ?>"><?php echo (getlistname($cid)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li><?php endif; ?>
        <li><span>字母</span><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>'','year'=>$type_year,'area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(empty($type_letter)): ?>hover<?php endif; ?>">全部</a> <?php for($i=1;$i<=26;$i++){if($type_letter==chr($i+64)){echo '<a href="'.UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>chr($i+64),'year'=>$year,'area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true).'" class="hover">'.chr($i+64).'</a>';}else{echo '<a href="'.UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>chr($i+64),'year'=>$year,'area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true).'">'.chr($i+64).'</a>';}} ?><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>'0,1,2,3,4,5,6,7,8,9','year'=>$type_year,'area'=>$type_area,'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_letter) == "0,1,2,3,4,5,6,7,8,9"): ?>hover<?php endif; ?>">0-9</a></li>
        <li><span>地区</span> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>'','order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(empty($type_area)): ?>hover<?php endif; ?>">全部</a> 
        <?php if(is_array($array_area)): $i = 0; $__LIST__ = $array_area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>urlencode($area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_area) == $area): ?>hover<?php endif; ?>"><?php echo ($area); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></li>
        
        
        <li><span>年份</span> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>0,'area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_year) == "0"): ?>hover<?php endif; ?>">全部</a> <?php if(is_array($array_year)): $i = 0; $__LIST__ = array_slice($array_year,0,14,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i;?><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$year,'area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_year) == $year): ?>hover<?php endif; ?>"><?php echo ($year); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>'19901999','area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_year) == "19901999"): ?>hover<?php endif; ?>">90年代</a><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>'19801989','area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_year) == "19801989"): ?>hover<?php endif; ?>">80后</a><a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>'19001980','area'=>urlencode($type_area),'order'=>$type_order,'p'=>1),false,true);?>" class="<?php if(($type_year) == "19001980"): ?>hover<?php endif; ?>">更早</a></li>
        <li><span>排序</span> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>urlencode($type_area),'order'=>'addtime','p'=>1),false,true);?>" class="<?php if(($type_order) == "addtime"): ?>hover<?php endif; ?>">最新播放</a> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>urlencode($type_area),'order'=>'hits','p'=>1),false,true);?>" class="<?php if(($type_order) == "hits"): ?>hover<?php endif; ?>">最热播放</a> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>urlencode($type_area),'order'=>'gold','p'=>1),false,true);?>" class="<?php if(($type_order) == "gold"): ?>hover<?php endif; ?>">最高评分</a> <a href="<?php echo UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'letter'=>$type_letter,'year'=>$type_year,'area'=>urlencode($type_area),'order'=>'filmtime','p'=>1),false,true);?>" class="<?php if(($type_order) == "filmtime"): ?>hover<?php endif; ?>">最新上映</a></li>
        </ul>
<?php if(strlen($type_year)==8){ $type_year = substr($type_year,0,4).','.substr($type_year,4,8); } if($type_id){ C('jumpurl',UU('Home-vod/type',array('id'=>$type_id,'wd'=>$type_wd,'year'=>$type_year,'area'=>$type_area,'order'=>$type_order,'p'=>'{!page!}'),false,true)); $vod_list = ff_mysql_vod('cid:'.$type_id.';tag:'.$type_wd.';year:'.$type_year.';area:'.$type_area.';letter:'.$type_letter.';actor:'.$type_actor.';limit:20;page:true;order:vod_'.$type_order.' desc,vod_id desc'); $page = $vod_list[0]['page']; } ?>
        <div class="list">
        	<?php if(!empty($vod_list)): if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><ul><a href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank"><img class="lazy" data-original="<?php echo ($ppvod["vod_picurl"]); ?>" src="<?php echo ($tpl); ?>/style/images/js/blank.png" alt="点击播放<?php echo ($ppvod["vod_name"]); ?>" width="128" height="170"/></a>
            <p class="h3"><a href="<?php echo ($ppvod["vod_readurl"]); ?>" target="_blank"><?php echo ($ppvod["vod_name"]); ?></a></p>
            <p>主演∶<?php echo (ff_search_url($ppvod["vod_actor"])); ?></p>
            <p>评分∶<?php echo ($ppvod["vod_gold"]); ?></p>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="pages"><?php echo ($page); ?></div>
        <?php else: ?>
        	<div class="zero">该条件暂无数据，请重新选择！</div><?php endif; ?>
        </div>     
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