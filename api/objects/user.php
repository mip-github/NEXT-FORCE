<?php
class User{
    private $conn;
    private $table_name = "member";
 
    public $MEMBER_CARD_NUMBER;
    public $MEMBER_NAME;
    public $MEMBER_SERNAME;
    public $MEMBER_GENDER;
    public $MEMBER_BIRTH;
    public $MEMBER_TEL;
    public $MEMBER_HOUSE;
    public $MEMBER_VILLAGE;
    public $MEMBER_ALLEY;
    public $MEMBER_PHOTO;
    public $MEMBER_MAIL;
    public $MEMBER_PASSWORD;
    public $MEMBER_STATUS;
    public $MEMBER_SUBSCRIPTION;
    public $PROVINCE_ID;
    public $AMPHURE_ID;
    public $DISTRINCT_ID;
    public $POSTCODE_ID;
    public $MEMBER_ACTIVATE_CODE;

    public function __construct($db){
        $this->conn = $db;
    }

        function create(){
        $sql = "INSERT INTO " . $this->table_name . "
                SET
                    MEMBER_NAME = :MEMBER_NAME,
                    MEMBER_SERNAME = :MEMBER_SERNAME,
                    MEMBER_MAIL = :MEMBER_MAIL,
                    MEMBER_PASSWORD = :MEMBER_PASSWORD,
                    MEMBER_TEL = :MEMBER_TEL";
    
        $stmt = $this->conn->prepare($sql);
        $this->MEMBER_CARD_NUMBER=htmlspecialchars(strip_tags($this->MEMBER_CARD_NUMBER));
        $this->MEMBER_NAME=htmlspecialchars(strip_tags($this->MEMBER_NAME));
        $this->MEMBER_SERNAME=htmlspecialchars(strip_tags($this->MEMBER_SERNAME));
        $this->MEMBER_GENDER=htmlspecialchars(strip_tags($this->MEMBER_GENDER));
        $this->MEMBER_BIRTH=htmlspecialchars(strip_tags($this->MEMBER_BIRTH));
        $this->MEMBER_TEL=htmlspecialchars(strip_tags($this->MEMBER_TEL));
        $this->MEMBER_HOUSE=htmlspecialchars(strip_tags($this->MEMBER_HOUSE));
        $this->MEMBER_VILLAGE=htmlspecialchars(strip_tags($this->MEMBER_VILLAGE));
        $this->MEMBER_ALLEY=htmlspecialchars(strip_tags($this->MEMBER_ALLEY));
        $this->MEMBER_PHOTO=htmlspecialchars(strip_tags($this->MEMBER_PHOTO));
        $this->MEMBER_MAIL=htmlspecialchars(strip_tags($this->MEMBER_MAIL));
        $this->MEMBER_PASSWORD=htmlspecialchars(strip_tags($this->MEMBER_PASSWORD));
        $this->MEMBER_STATUS=htmlspecialchars(strip_tags($this->MEMBER_STATUS));
        $this->MEMBER_SUBSCRIPTION=htmlspecialchars(strip_tags($this->MEMBER_SUBSCRIPTION));
        $this->PROVINCE_ID=htmlspecialchars(strip_tags($this->PROVINCE_ID));
        $this->AMPHURE_ID=htmlspecialchars(strip_tags($this->AMPHURE_ID));
        $this->DISTRINCT_ID=htmlspecialchars(strip_tags($this->DISTRINCT_ID));
        $this->POSTCODE_ID=htmlspecialchars(strip_tags($this->POSTCODE_ID));
        $this->MEMBER_ACTIVATE_CODE=htmlspecialchars(strip_tags($this->MEMBER_ACTIVATE_CODE));

        $stmt->bindParam(':MEMBER_NAME', $this->MEMBER_NAME);
        $stmt->bindParam(':MEMBER_SERNAME', $this->MEMBER_SERNAME);
        $stmt->bindParam(':MEMBER_MAIL', $this->MEMBER_MAIL);
        $stmt->bindParam(':MEMBER_TEL', $this->MEMBER_TEL);
    
        $password_hash = password_hash($this->MEMBER_PASSWORD, PASSWORD_BCRYPT);
        $stmt->bindParam(':MEMBER_PASSWORD', $password_hash);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function emailExists(){

        $sql = "SELECT MEMBER_ID, MEMBER_NAME, MEMBER_SERNAME, MEMBER_PASSWORD
                FROM " . $this->table_name . "
                WHERE MEMBER_MAIL = ?
                LIMIT 0,1";
        $stmt = $this->conn->prepare($sql);
        $this->MEMBER_MAIL=htmlspecialchars(strip_tags($this->MEMBER_MAIL));
        $stmt->bindParam(1, $this->MEMBER_MAIL);
        $stmt->execute();
        $num = $stmt->rowCount();

        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->MEMBER_ID = $row['MEMBER_ID'];
            $this->MEMBER_NAME = $row['MEMBER_NAME'];
            $this->MEMBER_SERNAME = $row['MEMBER_SERNAME'];
            $this->MEMBER_PASSWORD = $row['MEMBER_PASSWORD'];
            
            return true;
        }
        return false;
    }
        // update a user record
    public function update(){
    
        // if password needs to be updated
        $password_set=!empty($this->password) ? ", password = :password" : "";
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email
                    {$password_set}
                WHERE id = :id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->email=htmlspecialchars(strip_tags($this->email));
    
        // bind the values from the form
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
    
        // hash the password before saving to database
        if(!empty($this->password)){
            $this->password=htmlspecialchars(strip_tags($this->password));
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        }
    
        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
}