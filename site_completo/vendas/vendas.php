
<?php
include_once 'crud3.php';
?>
<!DOCTYPE HTML "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.error {color: #8B0000;}
</style>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <link rel="stylesheet" href="vendas1.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    

<!--Fontes do Google -->

<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">


    
    
<br/>
<div id="form" class="texto">
<form method="post">  

    <h1>Vendas</h1>    
    </div>

    <div class="texto">
      Código do Cliente: 
      <select name="cliente_idcliente">
        <option></option>
        <?php
        $res = $MySQLiconn->query("SELECT * FROM cliente");
        while($row=$res->fetch_array())
        {
        ?>
        
        <option value="<?php echo $row['idcliente']; ?>" 
          <?php  
            if(isset($_GET['edit'])){
              if(  $getROW['cliente_idcliente'] == $row['idcliente'] ){
                echo "selected";
              } 
            }
          ?>
        >

          <?php echo $row['nome']; ?>
          
        </option>
        <?php
        }
        ?>
      </select>
    </div>
<br/>
    <div class="texto">
      Data da Venda:
      <input  name="data_venda" placeholder="Data da Compra" type="date" value="<?php if(isset($_GET['edit'])) echo $getROW['data_venda'];  ?>">
    

<br/>
<br/>
    

<?php
if(isset($_GET['edit']))
{
  ?>
  <button type="submit" class="btn btn-primary" name="update">update</button>
  <?php
}
else
{
  ?>
  <button type="submit" class="btn btn-primary" name="save">Salvar Venda</button>
  <?php
}
?>
</form>
<br/>
<br/>

<?php
$res = $MySQLiconn->query("SELECT v.*, c.nome as nomecliente FROM vendas v inner join cliente c on v.cliente_idcliente = c.idcliente ");
while($row=$res->fetch_array())
{
    ?>

  <div id="" class="visual">
      <label><?php echo $row['idvendas']; ?></label><br>
      <label><?php echo $row['nomecliente']; ?></label><br>
      <label><?php echo $row['data_venda']; ?></label><br>    
      

      <a href="?edit=<?php echo $row['idvendas']; ?>" onclick="return confirm('sure to edit !'); " class="btn btn-primary">edit</a>
      <a href="?del=<?php echo $row['idvendas']; ?>" onclick="return confirm('sure to delete !'); " class="btn btn-danger">delete</a>

  </div>
</div>

    <?php
}
?>
</nav>

</body>
</html>