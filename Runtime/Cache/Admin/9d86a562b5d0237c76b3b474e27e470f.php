<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>留言本管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='/Public/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/js/admin.js"></script>
<script language="javascript">
function changeurl(cid,status,intro){
	self.location.href='?s=Admin-Gb-Show-cid-'+cid+'-status-'+status+'-intro-'+intro+'';
}
$(document).ready(function(){
	$feifeicms.show.table();
	$('#selectcid').change(function(){
		changeurl($(this).val(),'','','','');
	});
	$('#selectstars').change(function(){
		changeurl('','','',$(this).val(),'');
	});		
});
</script>
</head>
<body class="body">
<form action="?s=Admin-Gb-Show" method="post" name="myform" id="myform">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th class="r"><span style="float:left">留言本管理</span></th></tr></thead>
  <tr>
    <td class="tr ct" style="height:40px"><input type="button" value="所有" class="submit" onClick="changeurl(<?php echo ($cid); ?>,0,0);"> <input type="button" value="未审核" class="submit" onClick="changeurl(<?php echo ($cid); ?>,2,0);"> <input type="button" value="已审核" class="submit" onClick="changeurl(<?php echo ($cid); ?>,1,1);"> <input type="button" value="未回复" class="submit" onClick="changeurl(<?php echo ($cid); ?>,0,2);"> <input type="text" name="wd" id="wd" maxlength="20" value="<?php echo (urldecode((isset($wd) && ($wd !== ""))?($wd):'可搜索(留言内容,用户呢称,用户IP)')); ?>" onClick="this.select();" style="color:#666;width:200px"> <input type="button" value="搜索" class="submit" onClick="post('?s=Admin-Gb-Show');"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table">
  <thead>
    <tr class="ct">
      <th class="r" width="20">ID</th>
      <th class="l" >留言内容</th>
      <th class="l" width="80">用户名</th>
      <th class="l" width="60">用户IP</th>
      <th class="l" width="80">留言时间</th>
      <th class="l" width="60">回复状态</th>
      <th class="r" width="100">相关操作</th>
    </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><tbody>
  <tr>
    <td class="r ct"><input name='ids[]' type='checkbox' value='<?php echo ($ppvod["gb_id"]); ?>' class="noborder" checked="checked"></td>
    <td class="l pd" style="color:#999"><?php if(($ppvod["gb_cid"]) > "0"): ?><a href="?s=Admin-Vod-Add-id-<?php echo ($ppvod["gb_cid"]); ?>">查错</a><?php endif; ?> <?php echo (remove_xss(htmlspecialchars(msubstr($ppvod["gb_content"],0,40,'utf-8',true)))); ?></td>
    <td class="l ct"><a href="?s=Admin-Gb-Show-cid-<?php echo ($cid); ?>-wd-<?php echo ($ppvod["user_name"]); ?>"><?php echo ($ppvod["user_name"]); ?></a></td>
    <td class="l ct"><a href="?s=Admin-Gb-Show-cid-<?php echo ($cid); ?>-wd-<?php echo ($ppvod["gb_ip"]); ?>"><?php echo ($ppvod["gb_ip"]); ?></a></td>
    <td class="l ct"><?php echo (date('Y-m-d',$ppvod["gb_addtime"])); ?></td>
    <td class="l ct"><?php if(!empty($ppvod["gb_intro"])): ?><a href="?s=Admin-Gb-Add-id-<?php echo ($ppvod["gb_id"]); ?>" title="点击编辑留言与回复内容">已回复</a><?php else: ?><a href="?s=Admin-Gb-Add-id-<?php echo ($ppvod["gb_id"]); ?>" title="点击回复留言"><font color="red">未回复</font></a><?php endif; ?></td>
    <td class="r ct"><?php if(($ppvod["gb_status"]) == "1"): ?><a href="?s=Admin-Gb-Status-id-<?php echo ($ppvod["gb_id"]); ?>-value-0" title="点击隐藏留言">隐藏</a><?php else: ?><a href="?s=Admin-Gb-Status-id-<?php echo ($ppvod["gb_id"]); ?>-value-1" title="点击显示留言"><font color="red">显示</font></a><?php endif; ?> <a href="?s=Admin-Gb-Del-id-<?php echo ($ppvod["gb_id"]); ?>" onClick="return confirm('确定删除该留言吗?')" title="点击删除留言">删除</a> <?php if(($ppvod["gb_oid"]) == "1"): ?><a href="?s=Admin-Gb-Order-id-<?php echo ($ppvod["gb_id"]); ?>-value-0" title="点击取消置顶"><font color="green">解除</font></a><?php else: ?><a href="?s=Admin-Gb-Order-id-<?php echo ($ppvod["gb_id"]); ?>-value-1" title="点击置顶留言">置顶</a><?php endif; ?></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
      <td colspan="8" class="r pages"><?php echo ($pages); ?></td>
    </tr>   
  <tfoot>
    <tr>
      <td colspan="9" class="r"><input type="button" value="全选" class="submit" onClick="checkall('all');"> <input name="" type="button" value="反选" class="submit" onClick="checkall();"> <input type="button" value="批量审核" class="submit" onClick="post('?s=Admin-Gb-Statusall-value-1');"> <input type="button" value="取消审核" class="submit" onClick="post('?s=Admin-Gb-Statusall-value-0');"> <input type="button" value="批量删除" class="submit" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){post('?s=Admin-Gb-Delall');}else{return false;}"> <input type="button" value="清空留言" class="submit" onClick="if(confirm('清空后将无法还原,确定要清空吗?')){post('?s=Admin-Gb-Delclear');}else{return false;}"></td>
    </tr>  
  </tfoot>
</table>
</form>
<br /><center>Version：<font color="#FF0000"><?php echo (L("ppvod_version")); ?></font></center>
</body>
</html>