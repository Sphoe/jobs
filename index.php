<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Catalouge</title></title>
  </head>
  <body>


  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
 <?php require_once 'process.php';?> <!-- megnezni -->
 <?php 
 if (isset($_SESSION['message'])):?>
 <div class="alert alert-<?=$_SESSION['msg_type']?>">
 <?php echo $_SESSION['message'];
 unset($_SESSION['message']); ?>
 </div>
  <?php endif?>




 <div class="container">

 <?php $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($myqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
              ?>
        <div class="justify-content-center">
        <table class="table table-striped">
        <thead>
        <tr>
        <th><h1>ID</h1></th>
        <th>Name</th>
        <th>Price $</th>
        <th>Amount</th>
        <th colspan="3">Action</th>
        </tr></thead>      
        </div>
        <?php 
          while ($row =$result->fetch_assoc()):?>
          <tr class="warning">
            <td><?php echo $row['id'];?> </>
            <td><?php echo $row['name'];?> </td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td> <a href="index.php?edit=<?php echo $row['id'];?>"
            class="btn btn-info">Edit</a>
            <a href="process.php?delete=<?php echo $row['id'];?>"
            class="btn btn-dark">Delete</a>
            </td>
            </tr> 
<?php endwhile;?>
</table>
</div>
<?php
        function pre_r($array) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }
 ?>
 <div class="justify-content-center" >
 <form action="process.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
   <div  style="background-color:lightblue" class="form-group" > 
   <label>Name</label>
   <input type="text" name="name" class="form-control" 
   value="<?php echo $name;?>" placeholder="Enter your product">
   </div>
   <div style="background-color:lightblue" class="form-group">
   <label>Price $</label>
   <input type="text" name="price" class="form-control" 
   value="<?php echo $price;?>" placeholder="Enter your price">
   </div>
   <div class="form-group" style="background-color:lightblue">
   <label>Amount</label>
   <input type="text" name="amount" class="form-control" 
   value="<?php echo $amount;?>" placeholder="Enter your amount">
   </div>

   
  <div class="form-group">
   <?php
   if($update ==true):
    ?>
<button type="submit" class="btn btn-info" name="update">UPDATE</button>
<?php else:?>
<button type="submit" class="btn btn-info" name="save">Save</button>
 <?php endif;?>

   </div>  </form> </div></div></body>
</html>
