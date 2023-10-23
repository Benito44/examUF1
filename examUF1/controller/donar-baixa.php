<?php
// ex6
require 'session.php';
require_once '../model/db-connection.php';
function baixa(){
  try {
    session_start();
    $id = getSessionUserId();
    echo $id;
    $baixa = $_POST['baixa'];
    $connexio = getConnection();
    if ($baixa == "Si"){
      $statement = $connexio->prepare("DELETE FROM users WHERE id = ?");
      $statement->bindParam(1,$id);
      $statement->execute();
    } else {
      echo "No has posat el missatge correctament";
      include '../view/baixa-view.php';
    }


      } 
    catch (Exception $e) {
        echo "Error:" .  $e->getMessage();
    }
    include '../view/baixa-view.php';
}
include '../view/baixa-view.php';



?>