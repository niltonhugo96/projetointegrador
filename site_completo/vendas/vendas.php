
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
   <link rel="stylesheet" href="vendas1.css">

   <link type="text/css" rel="stylesheet" href ="../css/style.css">

   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
   <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">
    

<!--Fontes do Google -->

<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">


    
<body>



 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  
   <a href="../index.php"><img class="formiga" src="http://www.jogosdesoletrar.com/data/images/formiga-rainha,-a-formiga-com-uma-vida-mais-longa_51965f0a8b9a5-thumb.jpg"></a>
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
        <li class="nav-item active">
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
      <form class="form-inline my-2 my-lg-0" action="../busca.php" method="post">
        <input name="buscar" class="form-control mr-sm-2" type="text" placeholder="Buscar">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>


<br/>
<div id="form" class="texto">
<form method="post">  

    <h1>Vendas</h1>    
    </div>

    <div class="texto">
      Código do Cliente: 
      <select name="cliente_idcliente">
        <option></option>
        <?php
        $res = $MySQLiconn->query("SELECT * FROM cliente");
        while($row=$res->fetch_array())
        {
        ?>
        
        <option value="<?php echo $row['idcliente']; ?>" 
          <?php  
            if(isset($_GET['edit'])){
              if(  $getROW['cliente_idcliente'] == $row['idcliente'] ){
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
<br/>
    <div class="texto">
      Data da Venda:
      <input  name="data_venda" placeholder="Data da Compra" type="date" value="<?php if(isset($_GET['edit'])) echo $getROW['data_venda'];  ?>">
    

<br/>
<br/>
    

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
  <button type="submit" class="btn btn-primary" name="save">Salvar Venda</button>
  <?php
}
?>
</form>
<br/>
<br/>

<?php
$res = $MySQLiconn->query("SELECT v.*, c.nome as nomecliente FROM vendas v inner join cliente c on v.cliente_idcliente = c.idcliente ");
while($row=$res->fetch_array())
{
    ?>

  <div id="" class="visual">
      <label><?php echo $row['idvendas']; ?></label><br>
      <label><?php echo $row['nomecliente']; ?></label><br>
      <label><?php echo $row['data_venda']; ?></label><br>    
      

      <a href="?edit=<?php echo $row['idvendas']; ?>" onclick="return confirm('sure to edit !'); " class="btn btn-primary">edit</a>
      <a href="?del=<?php echo $row['idvendas']; ?>" onclick="return confirm('sure to delete !'); " class="btn btn-danger">delete</a>

  </div>
</div>

    <?php
}
?>
</nav>
      <script src="../js/jquery-3.2.1.min.js"></script> 
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
</body>
</html>