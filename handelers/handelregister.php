<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';
include '../core/auth.php';

$errors=[];
if (checkRequestMethod("POST") && checkPostinput('name')){

    foreach ($_POST as $key => $value) {
        $$key = sanitizeinput($value);
    }

    //$name    =sanitizeinput( $_POST['name']);
   // $email   =sanitizeinput($_POST['email']);
   //$password =sanitizeinput($_POST['password']);
    //  echo $email;

 
   if(!requiredvalidation($name)){
    $errors[]="name is required";
   }elseif(!minvaloidation($name,3)){
    $errors[]="name must be greater than 3";
   }elseif(!maxvaloidation($name,25)){
    $errors[]= "name must be smaller than 25";
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
    $users_file=fopen("../data/users.csv","a+");
    $data = [$name,$email,sha1($password)];
    fputcsv($users_file,$data);
    $_SESSION['auth']=[$name,$email];
    redirect("../index.php");
    die();
   }else{

    $_SESSION['errors']= $errors;
    redirect("../register.php");
    die;
   }

//var_dump($errors);



}else{
    echo "not supported method";
}
