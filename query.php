<?php
require 'connectiondb.php';
require 'connection_es.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
  // define variables
    $data = array(
      "lastname" => $_POST["lastname"],
      "firstname" => $_POST["firstname"],
      "birthday" => $_POST["annee"] . "/" . $_POST["mois"] . "/" . $_POST["jour"],
      "gender" => $_POST["gender"],
      "email" => $_POST["email"],
      "phonenumber" => $_POST["phonenumber"],
      "website" => $_POST["website"] ? $_POST["website"] : "",
    ); 
    $sql = "INSERT INTO phptest (lastname,firstname,birthday,gender,email,phonenumber,website) VALUES (:lastname, :firstname, :birthday, :gender, :email, :phonenumber, :website)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    $indexed = $client->index([
        'index' => 'formulaires',
        'type' => '_doc',
        'body' => $data
    ]);
}
