


<?php
include_once 'crud3.php';
?>
<!DOCTYPE HTML "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Item Venda</title>
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
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-xpQNcoacYF/4TKVs2uD3sXyaQYs49wxwEmeFNkOUgun6SLWdEbaCOv8hGaB9jLxt" crossorigin="anonymous">
    

  

<div id="form" class="container">
<form method="post">
  <fieldset>

    <legend>Produtos e Vendas: </legend>
    

    <div class="form-group">
      Selecione o Produto: 
      <select name="produtos_idprodutos">
        <option></option>
        <?php
        $res = $MySQLiconn->query("SELECT * FROM produtos");
        while($row=$res->fetch_array())
        {
        ?>
        
        <option value="<?php echo $row['idprodutos']; ?>" 
          <?php  
            if(isset($_GET['edit'])){
              if(  $getROW['produtos_idprodutos'] == $row['idprodutos'] ){
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

      <div class="form-group">
      Selecione a Venda: 
      <select name="vendas_idvendas">
        <option></option>
        <?php
        $res = $MySQLiconn->query("SELECT * FROM vendas");
        while($row=$res->fetch_array())
        {
        ?>
        
        <option value="<?php echo $row['idvendas']; ?>" 
          <?php  
            if(isset($_GET['edit'])){
              if(  $getROW['vendas_idvendas'] == $row['idvendas'] ){
                echo "selected";
              } 
            }
          ?>
        >

          <?php echo $row['idvendas']; ?>
          
        </option>
        <?php
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <input class="form-control" name="quantidade" placeholder="Descreva a quantidade" type="text" value="<?php if(isset($_GET['edit'])) echo $getROW['quantidade'];  ?>">
    </div>

<br>
    </fieldset>

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
  <button type="submit" class="btn btn-primary" name="save">Salvar</button>
  <?php
}
?>
</form>
<br>

<?php
$res = $MySQLiconn->query("SELECT item.*, p.nome, v.data_venda FROM produtos_has_vendas item inner join produtos p on p.idprodutos = item.produtos_idprodutos inner join vendas v on item.vendas_idvendas = v.idvendas  ");
while($row=$res->fetch_array())
{
    ?>

  <div id="" class="visual">
       <label><?php echo $row['iditem']; ?></label><br> 
      <label><?php echo $row['nome']; ?></label><br>      
      <label><?php echo $row['data_venda']; ?></label><br>
      <label><?php echo $row['quantidade']; ?></label><br>    
     

      <a href="?edit=<?php echo $row['iditem']; ?>" onclick="return confirm('sure to edit !'); " class="btn btn-primary">edit</a>
      <a href="?del=<?php echo $row['iditem']; ?>" onclick="return confirm('sure to delete !'); " class="btn btn-danger">delete</a>

  </div>

    <?php
}
?>

<br>
<br>
<br>



</div>
</body>
</html>