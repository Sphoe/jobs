<?php
session_start();

$mysqli =new mysqli('localhost', 'root','','crud') or die(mysqli_error($mysqli));

$id=0;
$name='';
$price='';
$amount='';
$update = false;



if(isset($_POST['save'])){
    $name =$_POST['name'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    $mysqli->query("INSERT INTO data (name,price,amount) VALUES ('$name', '$price','$amount')") or 
    die($mysqli->error);

    $_SESSION['message']= "Record has been saved"; 
    $_SESSION['msg_type']= "success";

    header("location: index.php");
}



if(isset($_GET['delete'])){
   $id = $_GET['delete'];
       $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

        $_SESSION['message']= "Record has been deleted";
        $_SESSION['msg_type']= "nope";
 header("location:index.php");
} 
if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM data WHERE id=$id ") or die($mysqli->error());
        if ($result->num_rows==1){
            $row = $result->fetch_array();
            $name =$row['name'];
            $price =$row['price'];
            $amount=$row['amount'];
        }
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name= $_POST['name'];
    $price =$_POST['price'];
    $amount=$_POST['amount'];
    $mysqli->query("UPDATE data SET name='$name', price='$price', amount='$amount' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] ="record has been updated";
    $_SESSION['msg_type'] ="nope";
    header("location: index.php");
}