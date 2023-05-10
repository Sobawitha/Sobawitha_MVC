<?php 
  
  function uploadFile($file,$file_name, $location){
      $target=PUBROOT.$location.$file_name;

      return move_uploaded_file($file,$target);
  }  

     
?>