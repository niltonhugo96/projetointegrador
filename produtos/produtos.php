
<!-- Parte do Jônatas Silva -->

<?php
include_once 'crud3.php';
?>
<!DOCTYPE HTML "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.error {color: #8B0000;}
</style>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="stylesheet" href="styletimes3.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-xpQNcoacYF/4TKVs2uD3sXyaQYs49wxwEmeFNkOUgun6SLWdEbaCOv8hGaB9jLxt" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js" integrity="sha384-VspmFJ2uqRrKr3en+IG0cIq1Cl/v/PHneDw6SQZYgrcr8ZZmZoQ3zhuGfMnSR/F2" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Projeto Integrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="produtos.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar">
      <button class="btn btn-primary" type="submit">Buscar</button>
      <button class="btn btn-info" type="submit" href="">Login</button>
    </form>
  </div>
</nav>

<br>
<br>

<div id="form" class="container">
<form method="post">
  <fieldset>

    <legend>Cadastro de Produtos: </legend>
    <div class="form-group">
      <input value="<?php if(isset($_GET['edit'])) echo $getROW['nome'];  ?>" type="text" class="form-control" placeholder="Digite o Nome do Produto" name="nome">
    </div>

    <div class="form-group">
      <input class="form-control" name="foto" placeholder="Insira o Link da Imagem do Produto" type="text" placeholder="Link da Foto do Produto" value="<?php if(isset($_GET['edit'])) echo $getROW['foto'];  ?>">
    </div>

    <div class="form-group">
      <input class="form-control" name="valor" placeholder="Digite o Valor" type="text" value="<?php if(isset($_GET['edit'])) echo $getROW['valor'];  ?>">
    </div>

    <div class="form-group">
      Selecione a Marca: 
      <select name="marca_idmarca">
        <option></option>
        <?php
        $res = $MySQLiconn->query("SELECT * FROM marca");
        while($row=$res->fetch_array())
        {
        ?>
        
        <option value="<?php echo $row['idmarca']; ?>" 
          <?php  
            if(isset($_GET['edit'])){
              if(  $getROW['marca_idmarca'] == $row['idmarca'] ){
                echo "selected";
              } 
            }
          ?>
        >

          <?php echo $row['nome']; ?>
          
        </option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <input class="form-control" name="modelo" placeholder="Descreva o Modelo" type="text" value="<?php if(isset($_GET['edit'])) echo $getROW['modelo'];  ?>">
    </div>

<br>
    </fieldset>

<?php
if(isset($_GET['edit']))
{
  ?>
  <button type="submit" class="btn btn-primary" name="update">update</button>
  <?php
}
else
{
  ?>
  <button type="submit" class="btn btn-primary" name="save">Salvar</button>
  <?php
}
?>
</form>
<br>

<?php
$res = $MySQLiconn->query("SELECT p.*, m.nome as nomemarca FROM produtos p inner join marca m on p.marca_idmarca = m.idmarca ");
while($row=$res->fetch_array())
{
    ?>

  <div id="" class="times">
      <label><?php echo $row['idprodutos']; ?></label><br>
      <img src="<?php echo $row['foto']; ?>"><br>
      <label><?php echo $row['nome']; ?></label><br>
      <label><?php echo $row['valor']; ?></label><br>    
      <label><?php echo $row['nomemarca']; ?></label><br>
      <label><?php echo $row['modelo']; ?></label><br>

      <a href="?edit=<?php echo $row['idprodutos']; ?>" onclick="return confirm('sure to edit !'); " class="btn btn-primary">edit</a>
      <a href="?del=<?php echo $row['idprodutos']; ?>" onclick="return confirm('sure to delete !'); " class="btn btn-danger">delete</a>

  </div>

    <?php
}
?>

<br>
<br>
<br>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark container rodap">
  <h4>Desenvolvido por Jônatas Silva</h4>
</nav>

</div>
</body>
</html>