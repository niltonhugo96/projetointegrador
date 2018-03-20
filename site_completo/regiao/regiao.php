<?php
include_once 'crud2.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Região</title>

<link type="text/css" rel="stylesheet" href ="style2.css">

<link type="text/css" rel="stylesheet" href ="../css/style.css">
	 <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">



<!--Fontes do Google -->

<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">




</head>

<body>

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
        <li class="nav-item">
          <a class="nav-link" href="../vendas/vendas.php">Vendas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../funcionarios/cad_funciona.php">Funcionários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../marca/marca.php">Marca</a>
        </li>
        <li class="nav-item active">
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
<div class="a">

	<h1>Faça o Cadastro da Região</h1>
	<br/>

</div>
<div class="b">
<div id="form">
	
<form method="post">


<label><input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php if(isset($_GET['edit'])) echo $getROW['nome'];  ?>" /></label><br/><br/>



<?php
if(isset($_GET['edit']))
{
	?>
	<button type="submit" name="update">update</button>
	<?php
}
else
{
	?>
	<button class="btn btn-primary" type="submit" name="save">Salvar</button>
	<?php
}
?>


</form>
</div>
</div>

<br/><br/>    

<?php
	if (isset($_POST['ok'])){
		if ($_POST['ok'] == 1){
?>

		
		<div class="a">
			<h1>Cadastro salvo com sucesso</h1>
			</div>
<?php
		}
	} 
	?>
  
  
     


</div>
<script src="../js/jquery-3.2.1.min.js"></script> 
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>