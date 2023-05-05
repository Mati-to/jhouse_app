<?php

function connectionDB() : mysqli {
   $db = mysqli_connect('localhost', 'root', 'matito3593', 'nihonstay_crud');

   if(!$db){
      echo 'Connection to database failed';
      exit;
   } 
   return $db;
}


