
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
<link type="text/css" rel="stylesheet" href ="../css/style.css">
    
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">
    

    <link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js" integrity="sha384-VspmFJ2uqRrKr3en+IG0cIq1Cl/v/PHneDw6SQZYgrcr8ZZmZoQ3zhuGfMnSR/F2" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <a href="../index.php"><img class="formiga" src="http://www.jogosdesoletrar.com/data/images/formiga-rainha,-a-formiga-com-uma-vida-mais-longa_51965f0a8b9a5-thumb.jpg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="../cliente/cliente.php">Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../produtos/produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vendas/vendas.php">Vendas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../funcionarios/cad_funciona.php">Funcionários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../marca/marca.php">Marca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../regiao/regiao.php">Região do Funcionário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../item_venda/item_venda.php">Item_Venda</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
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



</div>
</body>
</html>