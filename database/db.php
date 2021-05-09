<?php
    
    // Model File :-
    //-------------
    class Database{

        private $dsn = "mysql:host=localhost;dbname=2_pdo_curd";
        // private $DBName = "2_pdo_curd";
        private $DBUserName = "root";
        private $DBPass = "";

        public $Cons;

        public function __construct(){
            try{

                $this->Cons = new PDO($this->dsn, $this->DBUserName, $this->DBPass);
                //echo "Connection Successfull";

            }catch(PDOException $e){
                echo "Error : " .$e->getMessage();
            }
        }

        public function Insert($Model_FName,$Model_LName,$Model_Email,$Model_Num,$Model_Gen,$Model_Sel){

            $Sql = "INSERT INTO pdo_user(first_name ,last_name ,email ,phone ,gender ,language) 
                    VALUES(:fname, :lname, :email, :phone, :gender, :language)";
            $Stmt = $this->Cons->prepare($Sql);
            $Stmt->execute(['fname'=>$Model_FName,'lname'=>$Model_LName,
                            'email'=>$Model_Email,'phone'=>$Model_Num,
                            'gender'=>$Model_Gen,'language'=>$Model_Sel]);
            return true;

        }


        public function Read_Data(){

            $Sql = "SELECT * FROM pdo_user";
            $Stmt = $this->Cons->prepare($Sql);
            $Stmt->execute();
            
            $Results = $Stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($Results as $Rows){
                $Datas[] = $Rows;
            }
            return $Datas;
        }

        public function GetUserById($id){
            $Sql = "SELECT * FROM pdo_user WHERE id = :id";
            $Stmt = $this->Cons->prepare($Sql);
            $Stmt ->execute(["id"=>$id]);
            $Results = $Stmt->fetch(PDO::FETCH_ASSOC);
            return $Results;
        }

        public function Update_Data($id,$Update_FName,$Update_LName,$Update_Email,$Update_Num,$Update_Gen,$Update_Sel){
            $Sql = "UPDATE pdo_user SET first_name = :fnames, last_name = :lnames, email = :emails, phone = :phones,
                    gender= :genders, language = :languages WHERE id= :id";

            $Stmt = $this->Cons->prepare($Sql);
            $Stmt -> execute(['fnames'=>$Update_FName, 'lnames'=>$Update_LName,
                                'emails'=>$Update_Email, 'phones'=>$Update_Num,
                                'genders'=>$Update_Gen, 'languages'=>$Update_Sel,
                                'id'=>$id]);
            return true;
                    
        }

        public function Delete($id){
            $Sql = "DELETE FROM pdo_user WHERE id= :id";
            $Stmt = $this->Cons->prepare($Sql);
            $Stmt->execute(['id' => $id]);
            return true;
        }

        public function TotalrowCount(){
            $Sql = "SELECT * FROM pdo_user";
            $Stmt = $this->Cons->prepare($Sql);
            $Stmt->execute();
            $T_Rows = $Stmt->rowCount();

            return $T_Rows;
        }
    }

    $Obj1 = new Database();
    // print_r($Obj1->Read_Data());
    // echo "<br><br> Total Data Count = " .$Obj1->TotalrowCount();

?>