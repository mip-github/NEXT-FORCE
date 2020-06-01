<?php

require_once __DIR__.'/require/config.php';

$PROJECT_BUY_ID = $_GET['id'];

if($PROJECT_BUY_ID!=''){

    $sql = "DELETE FROM project_buy WHERE PROJECT_BUY_ID ='".$PROJECT_BUY_ID."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>";
        echo "alert('ลบรายการสั่งซื้อเรียบร้อยแล้ว');";
        echo "window.location.href='UserPayment.php';";
        echo "</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn->error;
        
    }
}  

if($PROJECT_BUY_ID!=''){

    $sql = "DELETE FROM files_buy WHERE PROJECT_BUY_ID ='".$PROJECT_BUY_ID."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>";
        echo "alert('ลบรายการสั่งซื้อเรียบร้อยแล้ว');";
        echo "window.location.href='UserPayment.php';";
        echo "</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn->error;
        
    }
}  

?>