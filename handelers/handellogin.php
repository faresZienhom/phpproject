<?php



session_start();


include '../core/functions.php';
include '../core/validations.php';
include '../core/auth.php';

$errors=[];



if (checkRequestMethod("POST") && checkPostinput('email')){

    foreach ($_POST as $key => $value) {
        $$key = sanitizeinput($value);
    }
}
 
if(!requiredvalidation($email)){
    $errors[]="email is required";
   }
   elseif(!emailvaloidation($email)){
    $errors[]="please type a valid email ";
   }





 
   if(!requiredvalidation($password)){
    $errors[]="password is required";
   }elseif(!minvaloidation($password,6)){
    $errors[]="password must be greater than 6";
   }elseif(!maxvaloidation($password,20)){
    $errors[]= "password  must be smaller than 20";
   }



   if(empty($errors)){


    $allUsers = json_decode(file_get_contents("../data/users.json"),true);


     foreach($allUsers as $user){
        if($user['email'] == $email && $user['password'] == $password){
            storeuserinsession($user);
            header("location: ../login.php")  ; 

        }else{
            $_SESSION['errors']['email'] = "invalied credentials";

            header("location: ../login.php")  ; 

        }
    }

    $_SESSION['auth']=[$name,$email];
    redirect("../index.php");
    die();
   }else{

    $_SESSION['errors']= $errors;
    redirect("../login.php");
    die;
   }















?>