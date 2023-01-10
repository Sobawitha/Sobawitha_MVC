<?php
session_start();

function set_mr_or_mrs($gender){
    if($gender=='m'){
        return "Mr. ";
    }else{
        return "Mrs. ";
    }
}
?>