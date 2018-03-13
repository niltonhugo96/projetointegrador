<?php 
require "db.php";
?>

<!DOCTYPE HTML html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
	<head>
		<title>Resultado</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href ="style2.css">
		<link type="text/css" rel="stylesheet" href ="css/style.css">
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
		
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a href="index.php"><img class="formiga" src="http://www.jogosdesoletrar.com/data/images/formiga-rainha,-a-formiga-com-uma-vida-mais-longa_51965f0a8b9a5-thumb.jpg"></a>
	
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      
	      <li class="nav-item">
	        <a class="nav-link" href="cliente/cliente.php">Cliente</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="produtos/produtos.php">Produtos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="vendas/vendas.php">Vendas</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="funcionarios/cad_funciona.php">Funcionários</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="marca/marca.php">Marca</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="regiao/regiao.php">Região de Funcionário</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="item_venda/item_venda.php">Item_Venda</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" action="busca.php" method="post">
	      <input name="buscar" class="form-control mr-sm-2" type="text" placeholder="Buscar">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
	    </form>
	  </div>
	</nav>

		<?php

			$buscar = isset($_POST["buscar"]) ? addslashes(trim($_POST["buscar"])) : FALSE;

			
		?>
		<legend><h1>Produtos:</h1></legend>
		<div id="produto" class="form-gruop">
			<table border="2" class="table table-hover">
				<thead>
						<tr>
							<td>Produto </td>
							<td>Marca </td>
							<td>Modelo </td>
							<td>Valor </td>
							<td>Imagem </td>
														
						</tr>
				</thead>
 
			<?php
			$res = $MySQLiconn->query("SELECT p.*, m.nome as nome_marca FROM produtos p inner join marca m on p.marca_idmarca = m.idmarca WHERE p.nome LIKE '%".$buscar."%'");
			while($row=$res->fetch_array())
			{
			?>	

			<tbody>
					    <div>
					    <tr>
					    	<td><label><?php echo $row['nome']; ?></label></td>
					    	<td><label><?php echo $row['nome_marca']; ?></label></td>
					    	<td><label><?php echo $row['modelo']; ?></label></td>
						    <td><label><?php echo $row['valor']; ?></label></td>
						    <td><label><img src="<?php echo $row['foto']; ?>" height="300px" width="300px" ></label></td>			
						</tr>
						</div>	
							
			</tbody>
					    <?php
					}
					?>

					
			</table>
		
<script src="js/jquery-3.2.1.min.js"></script> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	</body>
</html>