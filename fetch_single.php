<?php

//fetch_single.php

require_once __DIR__.'/require/config_pdo.php';

if(isset($_GET["id"]))
{
 $query = "SELECT * FROM member WHERE MEMBER_ID = '".$_GET["id"]."'";

 $stmt = $db->prepare($query);
 $stmt->execute();
 $result = $stmt->fetchAll();
 $output = '<div class="row">';
 foreach($result as $row)
 {
  $images = '';
  if($row["MEMBER_PHOTO"] != '')
  {
   $images = '<img src="file_ico/profile_kyc/'.$row["MEMBER_PHOTO"].'" class="img-responsive img-thumbnail" />';
  }
  else
  {
   $images = '<img src="https://www.gravatar.com/avatar/38ed5967302ec60ff4417826c24feef6?s=80&d=mm&r=g" class="img-responsive img-thumbnail" />';
  }
  $output .= '
  <div class="col-md-3">
   <br />
   '.$images.'
  </div>
  <div class="col-md-9">
   <br />
   <p><label>Name :&nbsp;</label>'.$row["MEMBER_NAME"].'</p>
   <p><label>Address :&nbsp;</label>'.$row["MEMBER_SERNAME"].'</p>
   <p><label>Gender :&nbsp;</label>'.$row["MEMBER_TEL"].'</p>
   <p><label>Designation :&nbsp;</label>'.$row["MEMBER_BIRTH"].'</p>
   <p><label>Age :&nbsp;</label>'.$row["POSTCODE_ID"].' years</p>
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
