<?php
// ex6
require 'session.php';
require_once '../model/db-connection.php';
function baixa(){
  try {
    session_start();
    $id = getSessionUserId();
    $baixa = $_POST('baixa');
    $connexio = getConnection();
    if ($baixa == "Si, em vull donar de baixa"){
      $statement = $connexio->prepare("DELETE FROM users WHERE id = ?");
      $statement->bindParam(1,$id);
      $statement->execute();
    } else {
      $error =  "No has posat el missatge correctament";
      include '../view/baixa-view.php';
    }


      } 
    catch (Exception $e) {
        echo "Error:" .  $e->getMessage();
    }
}


include '../view/baixa-view.php';
?>