<?php

include_once 'db3.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

//     $idvendas = $MySQLiconn->real_escape_string($_POST['idvendas']);
     $cliente_idcliente = $MySQLiconn->real_escape_string($_POST['cliente_idcliente']);
     $data_venda = $MySQLiconn->real_escape_string($_POST['data_venda']);
     
	
	 $SQL = $MySQLiconn->query("INSERT INTO vendas(cliente_idcliente,data_venda) VALUES('$cliente_idcliente','$data_venda')");
	 
	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 } 
}
/* code for TIME insert */


/* code for TIME delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM vendas WHERE idvendas=".$_GET['del']);
	header("Location: vendas.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM vendas WHERE idvendas=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE vendas SET     cliente_idcliente='".$_POST['cliente_idcliente']."'
												,data_venda='".$_POST['data_venda']."'
												WHERE idvendas=".$_GET['edit']);
	header("Location: vendas.php");
}
/* code for TIME update */

?>