<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <title>Customers</title>
</head>

<style>
    #ed{
        padding-left: 40px;
    }
  
</style>

<body>
<?php include"sidebar.php"?>

     

<div class="container-fluid pt-3 px-3 ">
    
<div class="bg-light rounded p-4">


<div style="margin-bottom: 20px;">

<a href="./formulaire.php"><button type="button" class="btn" style="background: #007bff; color: white;"> ADD NEW CLIENT</button></a>
</div>



<div class="table-responsive ">
<table id="example" class="table text-start align-middle table-bordered table-hover mb-0">

    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Cin</th>
            <th>Reserver</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    include"connection.php";

    $sql = "SELECT id_client, fname, lname, phone, adresse, CIN FROM client";
$result = $conn->query($sql); 
    if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {

    echo' <tr>
            <td>'.$row['fname'].'</td>
             <td>'.$row['lname'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['adresse'].'</td>
             <td>'.$row['CIN'].'</td>
             <td><a href="reservation.php?reservercin='.$row['id_client'].'" class="btn btn-success text-white" name="reserver">Reserver </a>
             <td id="ed"><a href="delete.php?deleteid='.$row['id_client'].'" style="color:red;"><i class="fas fa-trash"></a></td>
             </tr>';
  }
} 
?>  
    </tbody>
  
</table>

                </div></div>
<?php include"footer.php"?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>$(document).ready(function(){
    $('#example').DataTable();
});
</script>


 </body>


</html>