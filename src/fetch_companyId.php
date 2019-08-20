<?php
include '../config/connection.php';
$sql = "SELECT companyId,companyName FROM company_master";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['companyId'];?>'><?php echo $row['companyName'];?></option>
    <?php
    }
  }
}
 ?>