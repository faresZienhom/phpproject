<?php


function requiredvalidation($input){
    if(empty($input)){
        return false;
    }

return true;
}

function minvaloidation($input,$length){
if(strlen($input)<$length){
    return false;
}
return true;
}

function maxvaloidation ($input,$length){
    if(strlen($input)>$length){
        return false;
    }
    return true;
    }
function emailvaloidation($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }