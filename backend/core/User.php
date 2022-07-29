<?php


class User{
    public function __construct(){

    }

    private function getUser($Username){
        global $_DB;

        $sql = $_DB->prepare("SELECT * FROM users WHERE userName = ?");
        $sql->execute([$Username]);


        if($sql->rowCount()){
            return $sql->fetch();
        }

        return false;
    }

    private function login($Username, $password){

        $user = getUser($Username);

        if($user){
            //check password
            if(password_verify($password, $user['password'])){

                setupUserInfo($Username, $user['firstName'] . " " . $user['lastName'], $user['email']);

                return true;
            }else{
                return false;
            }

        }

        return false;
    }

    private function logoff(){
        $_SESSION ['user'] = null;
        $_SESSION = null;
        session_destroy();
    }

    private function checkLoggedIn(){
        if(isset($_SESSION['user'])){

            if(time() - $_SESSION['user']['time'] > (3*600)){
                //too much time has passed
                logoff();
                return false;
            }
            return true; // $_SESSION['user'];
        }
        return false;
    }

    private function createUser($username, $password, $email, $fName, $lName){
        global $_DB;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (userName, password, email, firstName, lastName) VALUES (?, ?, ?, ?, ?)';
        $sql = $_DB->prepare($query);
        $sql->execute([$username, $passwordHash, $email, $fName, $lName]);

        if($sql->rowCount()){
            return true;
        }
        return false;

    }

    private function removeUser($username){
        global $_DB;

        $query = "DELETE FROM users WHERE (userName = ?)";
        $sql = $_DB->prepare($query);

        $sql->execute([$username]);
    }

    private function setPassword($username, $newPassword){
        global $_DB;
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = ? WHERE (userName = ?)";

        $sql = $_DB->prepare($query);
        $sql->execute([$passwordHash, $username]);

        if($sql->rowCount()){
            return true;
        }

        return false;

    }

    private function initUser(){
        if(!checkLoggedIn()){
            setupUserInfo();
        }
    }

    private function setupUserInfo($Username = "Guest", $Name = "Guest", $Email = null){
        $_SESSION['user'] = [];
        $_SESSION['user']['userName'] = $Username;
        $_SESSION['user']['name'] = $Name;
        $_SESSION['user']['email'] = $Email;
        $_SESSION['user']['time'] = time();
    }

    public function getUserName(){
        return "Guest";
    }
}







