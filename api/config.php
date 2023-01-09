<?php

   require_once 'database/db.php'; // ./ outfile 1 step,
                                      // ../outfolder 2 step
   
   $conn = db_connect();

   function json_response($data) {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
   }

?>