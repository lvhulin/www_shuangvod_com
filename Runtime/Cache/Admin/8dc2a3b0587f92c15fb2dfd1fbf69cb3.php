<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='/Public/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/js/admin.js"></script>
<script language="javascript">
$(document).ready(function(){
	$feifeicms.show.table();
});
</script>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
  <thead>
    <tr class="ct">
      <th class="r" style="text-align:left; padding-left:10px">ID.分类名称</th>
      <th class="r" width="80">创建</th>
      <th class="r" width="60">排序</th>
      <th class="r" width="90">中文名</th>
      <th class="r" width="70">管理操作</th>
    </tr>
  </thead>
  <form action="?s=Admin-Cat-Updateall" method="post" name="myform" id="myform"> 
  <?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><tbody><tr>
    <td class="r pd"><?php echo ($ppvod["list_id"]); ?>、<?php echo ($ppvod["list_name"]); if(($ppvod["list_sid"]) != "9"): ?>(<font color="red"><?php echo ($ppvod["total"]); ?></font>)<?php endif; ?></td>
    <td class="r ct"><a href="?s=Admin-Cat-Add-id-<?php echo ($ppvod["list_id"]); ?>">创建子类</a></td>
    <td class="r ct">&nbsp;</td>
    <td class="r ct">&nbsp;</td>
    <td class="r ct">&nbsp;</td>
  </tr></tbody>
  <?php if(is_array($ppvod["son"])): $i = 0; $__LIST__ = $ppvod["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><tbody><tr>
    <td class="r pd">&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='ids[]' value='<?php echo ($ppvod["m_cid"]); ?>' class="noborder" checked><?php echo ($ppvod["m_cid"]); ?>、<?php echo ($ppvod["m_name"]); ?></td>
    <td class="r ct">&nbsp;</td>
    <td class="r ct"><input type='text' name='m_order[<?php echo ($ppvod["m_cid"]); ?>]' value='<?php echo ($ppvod["m_order"]); ?>' class="w50"></td>
    <td class="r ct"><input type='text' name='m_name[<?php echo ($ppvod["m_cid"]); ?>]' value='<?php echo ($ppvod["m_name"]); ?>' class="w70"></td>
    <td class="r ct"><a href="?s=Admin-Cat-Add-mcid-<?php echo ($ppvod["m_cid"]); ?>" title="修改分类">编辑</a> <a href="?s=Admin-Cat-Del-mcid-<?php echo ($ppvod["m_cid"]); ?>" onClick="return confirm('确定删除?')" title="删除分类">删除</a> </td>
  </tr></tbody><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
  <tfoot>
    <tr>
      <td colspan="9" class="r"><input type="button" value="全选" class="submit" onClick="checkall('all');"> <input name="" type="button" value="反选" class="submit" onClick="checkall();"> <input type="button" value="批量修改" class="submit" onClick="post('?s=Admin-Cat-Updateall');"> <input type="button" value="批量删除" class="submit" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){post('?s=Admin-Cat-Delall');}else{return false}"></td>
    </tr>  
  </tfoot>
  </form>
</table>
<br /><center>Version：<font color="#FF0000"><?php echo (L("ppvod_version")); ?></font></center>
</body>
</html>