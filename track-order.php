<?php
session_start();
include_once 'includes/config.php';
$oid=intval($_GET['oid']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Проследяване на поръчката</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Детайли за проследяването</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>ID на поръчката:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
      <tr height="20">
      <td class="fontkink1" ><b>Дата:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
    </tr>
     <tr height="20">
     <td class="fontkink">
     <tr height="20">
    <td class="fontkink1"><b>Статус:</b></td>
    <td class="fontkink">
    <?php 
        $status = $row['status'];
        switch ($status) {
            case 'in Process':
                echo 'В процес';
                break;
            case 'Delivered':
                echo 'Изпратена';
                break;
            default:
                echo 'Непознат';
                break;
        }
    ?>
</td>

    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Забележка:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2">Поръчката все още не е обработена</td>
   </tr>
   <?php  }
$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
   Продуктът е доставен успешно </b></td>
   <?php } 
 
  ?>
</table>
 </form>
</div>

</body>
</html>

     