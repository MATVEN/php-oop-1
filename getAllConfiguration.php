<?php

class Configuration{

  public $id;
  public $title;
  public $description;
}

function __constuct($id, $title, $description){

  $this -> id = $id;
  $this -> title = $title;
  $this -> description = $description;
}


  header('Content-Type: application/json');

  $server = "localhost";
  $username = "root";
  $password = "bool";
  $dbname = "HotelDB";

  $conn = new mysqli($server, $username, $password, $dbname);
  if ($conn -> connect_errno) {

    echo json_encode(-1);
    return;
  }

  $sql = "

  SELECT * FROM configurazioni

  ";

  $res = $conn -> query($sql);
  if ($res -> num_rows < 1) {

    echo json_encode(-2);
    return;
  }

  $confs = [];
  while($conf = $res -> fetch_assoc()) {

    $confs[] = $conf;
  }

  echo json_encode($confs);
