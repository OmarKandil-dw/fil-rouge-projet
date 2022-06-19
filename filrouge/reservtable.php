

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

<div class="table-responsive ">
<table id="example" class="table text-start align-middle table-bordered table-hover mb-0">

    <thead>
           <tr class="text-dark">
                                    <th scope="col">id</th>
                                    <th scope="col">cin</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">time</th>
                                    <th scope="col">day</th>
                                    <th scope="col">stade</th>        
                                    <th scope="col" style="width: 43.218999999999994px;">Delete</th>        
                                                     
                                </tr>
    </thead>
    <tbody>
    <?php
    
    $sql = "SELECT * FROM reservation ORDER BY id_reservation DESC LIMIT 10";
$result = $conn->query($sql); 
    if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {

    echo' <tr>
     <td>'.$row['id_client'].'</td>
            <td>'.$row['cin'].'</td>
            <td>'.$row['fname'].'</td>
            <td>'.$row['hour'].'</td>
             <td>'.$row['jour'].'</td>
             <td>'.$row['stade'].'</td>
             <td id="ed"><a href="reservdelete.php?deleteid='.$row['id_reservation'].'" style="color:red;"><i class="fas fa-trash"></a></td>

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

