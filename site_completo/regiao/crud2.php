<?php

include_once 'db2.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

     //$idregiao = $MySQLiconn->real_escape_string($_POST['idregiao']);
	 $nome = $MySQLiconn->real_escape_string($_POST['nome']);
	 
	
	 $SQL = $MySQLiconn->query("INSERT INTO regiao(nome) VALUES('$nome')");
	 
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
	$SQL = $MySQLiconn->query("DELETE FROM regiao WHERE idregiao=".$_GET['del']);
	header("Location: regiao.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM regiao WHERE idregiao=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE regiao SET     idregiao='".$_POST['idregiao']."'
												,nome='".$_POST['nome']."'
												WHERE idregiao=".$_GET['edit']);
	header("Location: regiao.php");
}
/* code for TIME update */

?>