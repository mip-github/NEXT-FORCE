<?php
    
    if(isset($_POST["do"]) && $_POST["do"] != "" ){
        $do = $_POST["do"];
        require_once __DIR__.'/require/config_pdo.php';
        switch($do){
            case 'detail_member':
                $sql = "SELECT 
                member.*,
                account_bank.*,
                account_bank_type.*
                FROM member 
                LEFT JOIN account_bank ON(member.MEMBER_CARD_NUMBER = account_bank.MEMBER_ID)
                LEFT JOIN account_bank_type ON(account_bank.ACCOUNT_TYPE_ID = account_bank_type.ACCOUNT_TYPE_ID)
                WHERE MEMBER_CARD_NUMBER = :ID";
                $ID = $_POST["MEMBER_CARD_NUMBER"];
                $stmt=$db->prepare($sql);
                $stmt->bindparam(':ID',$ID);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $row['ACCOUNT_TYPE_NAME'] = str_replace($_POST["old_ACCOUNT_TYPE_ID"],$_POST["ACCOUNT_TYPE_ID"],$row["ACCOUNT_TYPE_NAME"]);
                echo json_encode($row);
            break;
        }
    }
?>