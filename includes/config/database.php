<?php

function connectionDB() : mysqli {
   $db = new mysqli('localhost', 'root', 'matito3593', 'nihonstay_crud');

   if(!$db){
      echo 'Connection to database failed';
      exit;
   } 
   return $db;
}


