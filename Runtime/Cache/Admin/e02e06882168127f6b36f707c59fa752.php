<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>数据库备份</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='/Public/css/admin-style.css' />
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/jquery/jquery-1.7.2.min.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8" src="/Public/js/admin.js"></script>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<form action="?s=Admin-Data-Insert" method="post" id="myform" name="myform">
  <thead>
    <tr>
      <th colspan="2" class="l">数据库分卷备份</th>
      </tr>
  </thead>
  <?php if(is_array($list_table)): $i = 0; $__LIST__ = $list_table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): $mod = ($i % 2 );++$i;?><tbody> 
  <tr>
  	<td width="6%" class="l pd"><input type="checkbox" name="ids[]" value="<?php echo ($ppvod); ?>" style='border:none' checked><?php echo ($i); ?>、</td>
    <td class="r pd"><?php echo ($ppvod); ?></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
  <tfoot>
    <tr>
      <td colspan="2" class="r"><input type="button" value="全选" class="submit" onClick="checkall('all');"> <input name="" type="button" value="反选" class="submit" onClick="checkall();"> <label>每个分卷文件大小：</label><input type="text" name="filesize" value="2048" size="5" class="ct"> K <input type="submit" name="submit" value="开始备份" class="submit"> </td>
    </tr>  
  </tfoot> 
</form>            
</table>
<br /><center>Version：<font color="#FF0000"><?php echo (L("ppvod_version")); ?></font></center>
</body>
</html>