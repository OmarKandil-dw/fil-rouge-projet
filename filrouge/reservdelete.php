<?php 
include "connection.php";
if(isset($_GET['deleteid'])){
    $id_reservation = $_GET["deleteid"];

    $sql="DELETE FROM reservation WHERE id_reservation=$id_reservation";
    $result = $conn->query($sql); 

    header("location: index.php");

}

