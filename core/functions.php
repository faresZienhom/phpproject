<?php



function checkRequestMethod($method){

    if ($_SERVER["REQUEST_METHOD"] == $method) {

     return true;
    }
    return false;
}
function checkPostinput($input){

   if(isset($_POST[$input])){

    return true;
   }
  return false;
}
function sanitizeinput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path){
    header("location:$path");
}