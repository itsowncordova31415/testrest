<?php

include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// забираем постом значения полей
$user->email = $_POST['email'];
$user->phone = $_POST['phone'];
$user->text = $_POST['text'];
$user->created = date('Y-m-d H:i:s');

// создаем юзера
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "yeee",
        "id" => $user->id,
        "email" => $user->email
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "fail"
    );
}
print_r(json_encode($user_arr));