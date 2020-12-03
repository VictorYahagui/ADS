<?php
  $id = $_GET["id"];
  $conexao = new mysqli("localhost", "root", "", "crud");
  $sql = $conexao-> prepare("delete from cadastro where id=?");
  $sql ->bind_param ("i", $id);
  $sql -> execute();
  mysqli_close ($conexao);
  header("location: index.php");
?>