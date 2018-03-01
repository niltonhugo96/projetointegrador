<?php

include_once 'db3.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

     //$iditem = $MySQLiconn->real_escape_string($_POST['iditem']);
     $produtos_idprodutos = $MySQLiconn->real_escape_string($_POST['produtos_idprodutos']);
     $vendas_idvendas = $MySQLiconn->real_escape_string($_POST['vendas_idvendas']);
     $quantidade = $MySQLiconn->real_escape_string($_POST['quantidade']);

	 $SQL = $MySQLiconn->query("INSERT INTO produtos_has_vendas(produtos_idprodutos,vendas_idvendas,quantidade) VALUES('$produtos_idprodutos','$vendas_idvendas','$quantidade')");
	 
	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 } 
}
/* code for TIME insert */


/* code for TIME delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM produtos_has_vendas WHERE iditem=".$_GET['del']);
	header("Location: item_venda.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM produtos_has_vendas WHERE iditem=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE produtos_has_vendas SET     iditem='".$_POST['iditem']."'
												,produtos_idprodutos='".$_POST['produtos_idprodutos']."'
												,vendas_idvendas='".$_POST['vendas_idvendas']."'
												,quantidade='".$_POST['quantidade']."'
												WHERE iditem=".$_GET['edit']);
	header("Location: item_venda.php");
}
/* code for TIME update */

?>