
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料篩選</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>城市：
    <input name="city" type="text" id="city" value="<?php echo $city?>" />
  </p>
  <p>
    <input name="sex" type="radio" id="radio" value="%" checked="checked" />
  不拘
  <input type="radio" name="sex" id="radio2" value="男" />
  男
  <input type="radio" name="sex" id="radio3" value="女" />
  女</p>
  <p>
    <input type="submit" name="button" id="button" value="搜尋" />
  </p>
</form>
<p></p>
<table width="700" border="1">
   <tr>
    <td >編號</td>
    <td >姓名</td>
    <td >性別</td>
    <td >生日</td>
    <td >地址</td>
    <td >城市</td>
    <td >國籍</td>
    <td>郵遞區號</td>
    <td >電話</td>
    <td>備註</td>
  </tr>
  <?php
  for($i=1;$i<=mysql_num_rows($data);$i++){
$rs=mysql_fetch_row($data);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
    <td><?php echo $rs[7]?></td>
    <td><?php echo $rs[8]?></td>
    <td><?php echo $rs[9]?></td>
  </tr>
  
  <?php
}
?>
</table>
<p>&nbsp;</p>
</body>
</html>