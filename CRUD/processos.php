<?php
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $nascimento = $_POST["nascimento"];
  $materia = $_POST["materia"];

  $conexao = new mysqli ("localhost", "root", "", "crud");
  if($id == 0){
    $sql = $conexao-> prepare ("insert into cadastro (nome, email, nascimento, materia) value (?, ?, ?, ?)");
    $sql -> bind_param ("ssss", $nome, $email, $nascimento, $materia);
  } else {
    $sql = $conexao->prepare("update cadastro set nome = ?, email = ?, nascimento = ?, materia = ? where id = ?");
    $sql->bind_param ("ssssi", $nome, $email, $nascimento, $materia, $id);
  }
  $sql-> execute ();
  mysqli_close ($conexao);

  header ("location: index.php");
?>