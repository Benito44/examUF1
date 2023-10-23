<?php
// ex5 
require 'session.php';
require '../model/db-connection.php';
function mostrar(){
  try {
    $id = getSessionUserId();
    $connexio = getConnection();
    // Fem la secuencia per insertar els usuaris
    $statement = $connexio->prepare("SELECT * FROM users WHERE id != ?");
    $statement->bindParam(1,$id);
    $statement->execute();
    echo '<section><ul>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>' . $row["id"] . " - " . $row["nickname"] . '</li>';
}
echo '</ul></section>';

      } 
    catch (Exception $e) {
        echo "Error:" .  $e->getMessage();
    }
}


include '../view/llistar-view.php';
?>