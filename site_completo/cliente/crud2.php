<?php

include_once 'db2.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

     $nome = $MySQLiconn->real_escape_string($_POST['nome']);
	 $telefone = $MySQLiconn->real_escape_string($_POST['telefone']);
	 $email = $MySQLiconn->real_escape_string($_POST['email']);
	 $senha = $MySQLiconn->real_escape_string($_POST['senha']);
	 $cep = $MySQLiconn->real_escape_string($_POST['cep']);
	 $endereco = $MySQLiconn->real_escape_string($_POST['endereco']);
	 $complemento = $MySQLiconn->real_escape_string($_POST['complemento']);
	
	 $SQL = $MySQLiconn->query("INSERT INTO cliente(nome,telefone,email,senha,cep,endereco,complemento) VALUES('$nome','$telefone','$email','$senha','$cep','$endereco','$complemento')");
	 
	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 } else {
	 	 $_POST['ok'] = 1;
		 
	 }

	 
}
/* code for TIME insert */


/* code for TIME delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM cliente WHERE idcliente=".$_GET['del']);
	header("Location: cliente.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM cliente WHERE idcliente=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE cliente SET     nome='".$_POST['nome']."'
												,telefone='".$_POST['telefone']."'
												,email='".$_POST['telefone']."'
												,email='".$_POST['email']."'
												,senha='".$_POST['senha']."'
												,cep='".$_POST['cep']."'
												,endereco='".$_POST['endereco']."'
												,complemento='".$_POST['complemento']."'
												WHERE id=".$_GET['edit']);
	header("Location: cliente.php");
}
/* code for TIME update */

?>