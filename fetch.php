<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('config/connection.php');
mysqli_set_charset($con, 'utf8');
// $columns = array('order_id', 'order_customer_name', 'order_item', 'order_value', 'order_date');
$columns = array('visitid', 'companyName', 'companySubtitle', 'managerName', 'visitDate');

$query = "SELECT * From visits_master vm LEFT JOIN company_master cm ON vm.companyId =cm.companyId WHERE";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'visitDate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (visitid LIKE "%'.$_POST["search"]["value"].'%"
  OR companyName LIKE "%'.$_POST["search"]["value"].'%"
  OR companySubtitle LIKE "%'.$_POST["search"]["value"].'%"
  OR managerName LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY visitid DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["visitid"];
 $sub_array[] = $row["companyName"];
 $sub_array[] = $row["companySubtitle"];
 $sub_array[] = $row["managerName"];
 $sub_array[] = $row["visitDate"];
 $data[] = $sub_array;
}

function get_all_data($con)
{
 $query = "SELECT * From visits_master vm LEFT JOIN company_master cm ON vm.companyId =cm.companyId";
 $result = mysqli_query($con, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
