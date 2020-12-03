<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="script.js"></script>
  <title>CRUD</title>
</head>
<?php
    $query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

    $conexao = new mysqli("localhost", "root", "", "crud");
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $dados = $conexao->query("select * from cadastro where id = ".$id);
      $linha = $dados->fetch_assoc();
      $nome = $linha["nome"];
      $email = $linha["email"];
      $nascimento = $linha["nascimento"];
      $materia = $linha['materia'];
    } else {
      $id = 0;
      $nome = "";
      $email = "";
      $nascimento = "";
      $materia = '';
    }
?>
<body>
<div class="container mt-4">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo ($id == 0 ? 'Adicionar' : 'Editar') ?> aluno</h5>
      <form action="processos.php" method="post" onsubmit="return validar();">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" value="<?=$nome;  ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="nome">Nome da matéria</label>
          <input type="text" id="materia" name="materia" value="<?=$materia;  ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email"name="email" value="<?=$email;  ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="nascimento">Nascimento</label>
          <input type="date" id="nascimento" name="nascimento" value="<?=$nascimento;  ?>" class="form-control">
        </div>
        <div class="mt-4">
          <input type="hidden" id="id" name="id" value="<?=$id; ?>">
          <button type="submit" class="btn btn-success">Enviar</button>
          <button type="reset" class="btn btn-clear-light">Limpar</button>
        </div>
      </form>
    </div>
  </div> 

  <div class="card mt-4">
    <div class="card-body">
      <h5>Pesquisar</h5>
      <form method="GET">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Pesquisar alunos" name="query" value="<?=$query?>">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
            <?php if (strlen($query) > 0) { ?>
              <a href="index.php" class="btn btn-outline-secondary">Limpar</a>
            <?php } ?>
          </div>
        </div>
      </form>
    </div>
  </div>

  <table class="table table-bordered table-striped mt-4">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Matéria</th>
        <th>Data Nascimento</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $conexao = new mysqli ("localhost", "root", "", "crud");

        if (strlen($query) > 0) {
          $tabela = $conexao->query ("select * from cadastro where nome LIKE '%$query%' or email LIKE '%$query%' or materia LIKE '%$query%'");
        } else {
          $tabela = $conexao->query ("select * from cadastro");
        }

        while($linha = $tabela->fetch_assoc()) {
      ?>
      <tr>
        <td><?=$linha["nome"];?></td>
        <td><?=$linha["email"];?></td>
        <td><?=$linha["materia"];?></td>
        <td><?=$linha["nascimento"];?></td>
        <td>
          <a href="index.php?id=<?=$linha["id"]; ?>" class="btn btn-link">Editar </a>
        </td>
        <td>
          <a href="excluir.php?id=<?=$linha["id"]; ?>" onclick="return confirm('Tem certeza que deseja excluir ?')"class="btn btn-link" >Excluir</a>
        </td>
      </tr>
      <?php
        }
        mysqli_close($conexao);
      ?>
    </tbody>
  </table>
</div>
</body>
</html>