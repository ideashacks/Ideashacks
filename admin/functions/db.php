<?php

  /* DATABASE CONNECTION*/


       $db['db_host'] = '127.0.0.1:3306';
        $db['db_user'] = 'u105808218_ideashacks';
        $db['db_pass'] = 'Ideashacks@2022';
        $db['db_name'] = 'u105808218_ideashacks';

      foreach($db as $key=>$value){
          define(strtoupper($key),$value);
      }
      global $connection;
      $connection =  mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
      if(!$connection){
          die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
      }

      try{
             $db = new PDO('mysql:dbhost=127.0.0.1:3306;dbname=u105808218_ideashacks;charset=utf8','u105808218_ideashacks','Ideashacks@2022');

      }
      catch(Exception $e){

          die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
      }



?>
