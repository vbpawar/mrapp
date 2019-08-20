<?php
include '../config/connection.php';
$sql = "SELECT revenueCode,title FROM revenue_master";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['revenueCode'];?>'><?php echo $row['title'];?></option>
    <?php
    }
  }
}
 ?>