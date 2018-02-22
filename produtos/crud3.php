<?php

include_once 'db3.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

     $nome = $MySQLiconn->real_escape_string($_POST['nome']);
     $foto = $MySQLiconn->real_escape_string($_POST['foto']);
     $valor = $MySQLiconn->real_escape_string($_POST['valor']);
     $marca_idmarca = $MySQLiconn->real_escape_string($_POST['marca_idmarca']);
	 $modelo = $MySQLiconn->real_escape_string($_POST['modelo']);
	
	 $SQL = $MySQLiconn->query("INSERT INTO produtos(nome,foto,valor,marca_idmarca,modelo) VALUES('$nome','$foto','$valor','$marca_idmarca','$modelo')");
	 
	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 } 
}
/* code for TIME insert */


/* code for TIME delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM produtos WHERE idprodutos=".$_GET['del']);
	header("Location: produtos.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM produtos WHERE idprodutos=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE produtos SET     nome='".$_POST['nome']."'
												,foto='".$_POST['foto']."'
												,valor='".$_POST['valor']."'
												,marca_idmarca='".$_POST['marca_idmarca']."'
												,modelo='".$_POST['modelo']."'
												WHERE idprodutos=".$_GET['edit']);
	header("Location: produtos.php");
}
/* code for TIME update */

?>