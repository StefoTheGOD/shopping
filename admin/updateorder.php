<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char

$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
echo "<script>alert('Подновяването на поръчката- обновено');</script>";
//}
}

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
<title>Подновяване на поръчката</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Поднови поръчката</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>ID на поръчката:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
      <tr height="20">
      <td class="fontkink1" ><b>Дата:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
    </tr>
    <tr height="20">
    <td class="fontkink1"><b>Статус:</b></td>
    <td class="fontkink">
        <?php 
            $status = $row['status'];
            if ($status == 'in Process') {
                echo 'В процес';
            } elseif ($status == 'Delivered') {
                echo 'Изпратена';
            } else {
                echo 'Изчакваща';
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
   <?php } ?>
   <?php 
$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
    Продуктът е доставен </b></td>
   <?php }else  {
      ?>
   
    <tr height="50">
      <td class="fontkink1">Статус: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Избери статус</option>
                 <option value="in Process">В процес</option>
                  <option value="Delivered">Изпратена</option>
        </select>
        </span></td>
    </tr>

     <tr style=''>
      <td class="fontkink1" >Забележка:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark"  required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="поднови"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Затвори този прозорец " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     