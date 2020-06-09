<?php

    require_once("query.php");

    function arrayCastRecursive($array)
    {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = arrayCastRecursive($value);
            }
            if ($value instanceof stdClass) {
                $array[$key] = arrayCastRecursive((array)$value);
            }
        }
    }
    if ($array instanceof stdClass) {
        return arrayCastRecursive((array)$array);
    }
    return $array;
    }

    function does_user_with_token_exists_in_db($user_id, $user_name){
        $dbh = new PDO("mysql:host=localhost;dbname=SmartExpenses;charset=utf8", "mysql","mysql");
        $query = "SELECT * FROM `user` WHERE `user_id` = '$user_id' AND `user_name` = '$user_name'";
        return exec_select_query($query);
    }

    function login($user_login, $user_password){
        $dbh = new PDO("mysql:host=localhost;dbname=SmartExpenses;charset=utf8", "mysql","mysql");
        $query = "SELECT * FROM `user` WHERE `user_login` = '$user_login' AND `user_password` = '$user_password'";
        return exec_select_query($query,$result_array);
    }

    function signup($user_login, $user_name, $user_password){
        $valid_query = "SELECT * FROM `user` WHERE `user_login` = '$user_login'";
        $users_with_the_same_login = exec_select_query($valid_query);
        if (count($users_with_the_same_login)){
            return -1;
        }
        else{
            $query = "INSERT INTO `user` (`user_login`, `user_password`, `user_name`) VALUES ('$user_login', '$user_password', '$user_name')";
            exec_query($query);
            global $mysqli;
            return mysqli_insert_id($mysqli);
        }
    }
?>