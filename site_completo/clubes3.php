<?php
include_once 'crud3.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styletimes.css">
<title></title>
</head>
<body>
<?php
$res = $MySQLiconn->query("SELECT * FROM produtos");
while($row=$res->fetch_array())
{
    ?>

  <div id="" class="times">
      <label><?php echo $row['idprodutos']; ?></label><br>
      <img src="<?php echo $row['foto']; ?>"><br>
      <label><?php echo $row['nome']; ?></label><br>
      <label><?php echo $row['valor']; ?></label><br>    
      <label><?php echo $row['marca_idmarca']; ?></label><br>
      <label><?php echo $row['modelo']; ?></label><br>

      <a href="?edit=<?php echo $row['idprodutos']; ?>" onclick="return confirm('sure to edit !'); " class="btn btn-primary">edit</a>
      <a href="?del=<?php echo $row['idprodutos']; ?>" onclick="return confirm('sure to delete !'); " class="btn btn-danger">delete</a>

  </div>

    <?php
}
?>
</body>