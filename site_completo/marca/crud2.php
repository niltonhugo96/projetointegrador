<?php

include_once 'db2.php';

/* code for TIME insert */
if(isset($_POST['save']))
{

     // $idmarca = $MySQLiconn->real_escape_string($_POST['idmarca']);
	 $nome = $MySQLiconn->real_escape_string($_POST['nome']);
	 $site = $MySQLiconn->real_escape_string($_POST['site']);
	 
	
	 $SQL = $MySQLiconn->query("INSERT INTO marca(nome,site) VALUES('$nome','$site')");
	 
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
	$SQL = $MySQLiconn->query("DELETE FROM marca WHERE idmarca=".$_GET['del']);
	header("Location: marca.php");
}
/* code for TIME delete */



/* code for TIME update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM marca WHERE idmarca=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE marca SET     idmarca='".$_POST['idmarca']."'
												,nome='".$_POST['nome']."'
												,site='".$_POST['site']."'								
												WHERE idmarca=".$_GET['edit']);
	header("Location: marca.php");
}
/* code for TIME update */

?>