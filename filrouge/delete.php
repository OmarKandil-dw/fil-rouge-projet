<?php 
include "connection.php";
if(isset($_GET['deleteid'])){
    $id_client = $_GET["deleteid"];



    $sql="DELETE FROM reservation WHERE id_client=$id_client";
    $result = $conn->query($sql); 

    $sql1="DELETE FROM client WHERE id_client=$id_client";
    $result1 = $conn->query($sql1); 
    header("location: customers.php");

}

