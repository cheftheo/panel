<?php
   include('config.php');
   session_start();
   
   function pas($a){
      if (isset($_POST[$a])){
         return trim($_POST[$a]);
         
      }
   }
?>