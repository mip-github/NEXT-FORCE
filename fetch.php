<?php

//fetch.php

require_once __DIR__.'/require/config_pdo.php';
$query = '';
$output = array();
$query .= "SELECT * FROM member ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE MEMBER_NAME LIKE "%'.$_POST["search"]["value"].'%" OR MEMBER_SERNAME LIKE "%'.$_POST["search"]["value"].'%" OR MEMBER_TEL LIKE "%'.$_POST["search"]["value"].'%" OR POSTCODE_ID LIKE "%'.$_POST["search"]["value"].'%" OR MEMBER_PHOTO LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY MEMBER_ID DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$data = array();
$filtered_rows = $stmt->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["MEMBER_NAME"];
 $sub_array[] = $row["MEMBER_SERNAME"];
 $sub_array[] = $row["MEMBER_TEL"];
 $sub_array[] = $row["MEMBER_BIRTH"];
 $sub_array[] = '<button type="button" name="view" id="'.$row["MEMBER_ID"].'" class="btn btn-primary btn-xs view">View</button>';
 $data[] = $sub_array;
}

function get_total_all_records($db)
{
 $stmt = $db->prepare("SELECT * FROM member");
 $stmt->execute();
 $result = $stmt->fetchAll();
 return $stmt->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($db),
 "data"    => $data
);
echo json_encode($output);
?>