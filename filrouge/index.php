
<?php include"connection.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
</head>



<body>
   <?php include"sidebar.php";

        // client num 

       $clientnum = "SELECT id_client FROM client";
       $result_check = $conn->query($clientnum); 
       $row = mysqli_num_rows($result_check);
       
       // stade num  
       $stades = "SELECT stade_id From stade";
       $resultstade = $conn->query($stades);
       $stadedispo = mysqli_num_rows(($resultstade));
       
    //    RESERVATION NUM

       $reservation = "SELECT id_reservation From reservation";
       $resultreservation = $conn->query($reservation);
       $reservafait = mysqli_num_rows(($resultreservation));


       ?>

          <!-- Sale & Revenue Start -->
          <div class="container-fluid pt-3 px-3 ">
                <div class="row g-3">
                    <div class="col-sm-8 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           <span style="color: #020538;"><i class="fa fa-chart-line fa-3x"></i></span> 
                            <div class="ms-3">
                                <p class="mb-2">Client number </p>
                                <h6 class="mb-0"><?php echo $row?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <span style="color: #020538;"><i class="fa fa-chart-bar fa-3x"></i></span>
                            <div class="ms-3">
                                <p class="mb-2">Stade disponible </p>
                                <h6 class="mb-0"><?php echo $stadedispo?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <span style="color: #020538;"><i class="fa fa-chart-area fa-3x"></i></span>
                            <div class="ms-3">
                                <p class="mb-2">reservation</p>
                                <h6 class="mb-0"><?php echo $reservafait ?></h6>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Sale & Revenue End -->
            
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4"> 
                        <div class="bg-light text-center rounded p-4" >
                            <div class="d-flex align-items-center justify-content-between mb-4" >
                                <h6 class="mb-0">Districts Stats</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Clients</h6>
                        <a href="customers.php">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">id</th>
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Cin</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                            <?php

    
    $sql = "SELECT id_client, fname, lname, phone, adresse, CIN FROM client ORDER BY id_client DESC LIMIT 5";
    $result = $conn->query($sql); 
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

    echo' <tr>
     <td>'.$row['id_client'].'</td>
            <td>'.$row['fname'].'</td>
             <td>'.$row['lname'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['adresse'].'</td>
             <td>'.$row['CIN'].'</td>
             </tr>';
  }
} 
?>
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->  


 
        <!-- footer -->
        <?php include"footer.php"?>
        <!-- Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="chart.js"></script>

    <!-- js script -->
<script>
    (function ($) {
    "use strict";
    
    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["2020", "2021", "2022", "2023"],
            datasets: [{
                    label: "Ibn battouta 2",
                    data: [15,30,55,40],
                    backgroundColor: "rgba(2, 5, 56,.9)"
                },
                {
                    label: "branes 2",
                    data: [8, 35, 40,5],
                    backgroundColor: "rgba(2, 5, 56,.7)"
                },
                {
                    label: "Hilal indoor",
                    data: [12, 25, 45,5],
                    backgroundColor: "rgba(2, 5, 56,.5)"
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    

        // Salse & Revenue Chart
 
})(jQuery);

</script>
</body>

</html>