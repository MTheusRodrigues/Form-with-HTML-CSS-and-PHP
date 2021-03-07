<?php
    //Class Users--------------------------------------------------------------------------------------------------------
    Class Users {
        private $pdo;
        public $msgError = "";
        //Method PDO conect witch database MySQL 5.7.31------------------------------------------------------------------
        public function conect($name, $host, $user, $password) {
            global $pdo;
            global $msgError;
            try {
            $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$user,$password);
            } catch (PDOException $e){
                $msgError = $e -> getMessage();
            }
        }
        //Function register users----------------------------------------------------------------------------------------
        public function register($name, $email, $pass_User) {
            global $pdo;
            $sql = $pdo -> prepare("SELECT id_User FROM users WHERE email_User = :e");
            $sql -> bindValue(":e",$email);
            $sql -> execute();
            if($sql -> rowCount() > 0) {
                return false;
            } else {
                $sql = $pdo -> prepare("INSERT INTO users (name_User, email_User, pass_User) VALUES (:n, :e, :s)");
                $sql -> bindValue(":n", $name);
                $sql -> bindValue(":e", $email);
                $sql -> bindValue(":s", md5($pass_User));
                $sql -> execute();
                return true;
            }
        }
        //Function login--------------------------------------------------------------------------------------------------
        public function login($email, $pass_User) {
            global $pdo;
            $sql = $pdo -> prepare("SELECT id_User FROM users WHERE email_User = :e AND pass_User = :s");
            $sql -> bindValue(":e", $email);
            $sql -> bindValue(":s", md5($pass_User));
            $sql -> execute();
            if($sql -> rowCount() > 0) {
                $data = $sql -> fetch();
                session_start();
                $_SESSION['id__User'] = $data['id_User'];
                return true;
            } else {
                return false;
            }
        }
    }
?>