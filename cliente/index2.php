<?php
include_once 'crud2.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cliente</title>

<link type="text/css" rel="stylesheet" href ="style2.css">

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">

<!--Fontes do Google -->

<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">




</head>


<br/>
<div class="a">

	<h1>Faça seu Cadastro</h1>
	<br/>

</div>
<div class="b">
<div id="form">
	
<form method="post">


<label><input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php if(isset($_GET['edit'])) echo $getROW['nome'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="telefone" placeholder="Telefone" value="<?php if(isset($_GET['edit'])) echo $getROW['telefone'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="email" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $getROW['email'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="password" name="senha" placeholder="Senha" value="<?php if(isset($_GET['edit'])) echo $getROW['senha'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="cep" placeholder="Cep" value="<?php if(isset($_GET['edit'])) echo $getROW['cep'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="endereco" placeholder="Endereço" value="<?php if(isset($_GET['edit'])) echo $getROW['endereco'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="complemento" placeholder="complemento" value="<?php if(isset($_GET['edit'])) echo $getROW['complemento'];  ?>" /></label><br/><br/>

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
			<h1>Registro cadastrado com sucesso</h1>
			</div>
<?php
		}
	} 
	?>
  
  
     


</div>

</body>
</html>