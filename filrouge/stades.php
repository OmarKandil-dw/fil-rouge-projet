<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>sidebar and navbar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
</head>
<style>7
  </style>
<body>

<?php include"sidebar.php"?>

    
<div id="cont" class="container-fluid pt-4 px-4 ">
  <div class="row" style="gap:70px;margin-left:50px;">
  
 
      
       
      <?php 
                include"connection.php";
                   
    $sql = "SELECT stadename, stadeimage, stadetype, categorie,size, prix_par_heure FROM stade ";
    $result = $conn->query($sql); 
        if (mysqli_num_rows($result) > 0) {
      while($info = mysqli_fetch_assoc($result)) {
    
        echo ' 
          <div class="card" style="width: 18rem;">
          
      <img src="'.$info['stadeimage'].'" class="card-img-top" alt="..." height="43%">
      <div class="card-body">
        <h5 class="card-title">'.$info['stadename'].' </h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Type : '.$info['stadetype'].'  </li>
        <li class="list-group-item">Catégorie : '.$info['categorie'].'  </li>
        <li class="list-group-item">Size : '.$info['size'].'  </li>
        <li class="list-group-item">Prix : '.$info['prix_par_heure'].' $ </li>
      </ul>

    </div>   
   
';
  
      
    }} ?>


</div> </div>
<?php include"footer.php"?>
         
</body>

</html>