<?php
include_once 'crud2.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cliente</title>

<link type="text/css" rel="stylesheet" href ="style4.css">

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-lBO0+E/aIJhpRIYjP6dJ1mNYgo3hhUBPcF74XRfOM27g7WmDuitolvnUENdDG4QI" crossorigin="anonymous">

<!--Fontes do Google -->

<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">




</head>


<br/>
<div class="a">

	<h1>Marca</h1>
	<br/>

</div>
<div class="b">
<div id="form">
	
<form method="post">


<label><input class="form-control" type="text" name="nome" placeholder="Nome da Marca" value="<?php if(isset($_GET['edit'])) echo $getROW['nome'];  ?>" /></label><br/><br/>

<label><input class="form-control" type="text" name="site" placeholder="Site" value="<?php if(isset($_GET['edit'])) echo $getROW['site'];  ?>" /></label><br/><br/>

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

<?php
$res = $MySQLiconn->query("SELECT * FROM marca");
while($row=$res->fetch_array())
{
	?>
  
  
    <div class="times">    
    
    <center><label><?php echo $row['idmarca']; ?></label><br/><br/></center>
    <center><label><?php echo $row['nome']; ?></label><br/><br/></center>
    <center><img src=<?php echo $row['site']; ?>><br/><br></center>
    
	

	    <center><a button type="button" class="btn btn-primary" href="?edit=<?php echo $row['idmarca']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></center><br/>
  <center><a type="button" class="btn btn-danger" href="?del=<?php echo $row['idmarca']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></center>
     </div>
     
    <?php
}
?>

  
  
     


</div>

</body>
</html>