<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new reservation</title>
</head>
<style>

</style>
<body>
    <?php include"sidebar.php";?>

    
  <div class="container-fluid pt-4 px-4">
  <?php include"connection.php";

$id = $_GET["reservercin"];
$sql ="SELECT id_client,fname,cin FROM  client WHERE id_client = '$id'";
$result =$conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if(isset($_POST["submit"])){

$date = $_POST["date"] ;
$cin = $_POST["cin"];
$fname = $_POST["fname"];
$date = $_POST["date"] ;
$time =  $_POST["time"];
$stade = $_POST["stade"];


$valid = 0;

try{
$sql1 = "INSERT INTO reservation (id_client,cin,fname,hour,jour,stade) VALUES ('$id','$cin','$fname','$time', '$date', '$stade')";
$result = $conn->query($sql1);
if(! headers_sent()){
    header("location: reservtable.php");
   }else{
     echo '<script type="text/javascript">window.location.href="reservtable.php"</script>';
     
   }}
   catch(Exception $e)
{
echo "Date et Heure déjà réservées !!" ;
}
}   
?>
    <div class="bg-light rounded p-4">
<form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                            

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">id client </label>
                                        <input name="text" disabled id="id_client" type="text" class="form-control" value="<?php echo $row["id_client"] ?>">                                        
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="">CIN client </label>
                                        <input name="cin" id='cin' type="text" class="form-control" placeholder="cin" value="<?php echo $row["cin"] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="">Client name </label>

                                        <input name="fname" id="fname"  type="text" class="form-control" placeholder="Client Name" value="<?php echo $row["fname"] ?>">
                                    </div>
                                </div>
                             
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="">date de reservation  </label>

                                        <input name="date" id='date' type="date" class="form-control" placeholder="cin" value="">
                                    </div>
                                </div>
                             

                                <div class="col-lg-6">

                                <div class="form-group">

                                <label for="pet-select">Choose time ::</label>

                                        <select id="pet-select" name="time" class="form-control">
                                            <option value=""></option>
                                            <option value="10->11">10->11</option>
                                            <option value="11->12">11->12</option>
                                            <option value="12->13">12->13</option>
                                            <option value="13->14">13->14</option>
                                            <option value="14->15">14->15</option>
                                            <option value="15->16">15->16</option>
                                            <option value="16->17">16->17</option>
                                            <option value="17->18">17->18</option>
                                            <option value="18->19">18->19</option>
                                            <option value="19->20">19->20</option>
                                        </select>
                                </div>      
                                </div>                      


                             

                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label for="">stade </label>
                                        <select class="form-control" name="stade">
                                            <option value="ibn battouta 2">Ibn battouta 2</option>
                                            <option value="Branes 2">Branes 2</option>
                                            <option value="hilalindoor">Hilal indoor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">                         
                                   <button name="submit" disabled class="btn"  id="sub"  style="background: #020538d4; color:white;">Submit</button>
</div>
                        </form>
    </div></div>
    <?php include"footer.php";?>
</body>
<script>

    

      let id = document.getElementById('id_client');
      let cin = document.getElementById('cin');
      let fname = document.getElementById('fname');
      let pet = document.getElementById('pet-select');
      let date = document.getElementById('date');
      let submit = document.getElementById('sub');
      

    // create a listener for both input fields(on change)
    id.addEventListener('change', toggleDisable);
    cin.addEventListener('change', toggleDisable);
    fname.addEventListener('change', toggleDisable);
    pet.addEventListener('change', toggleDisable);
    date.addEventListener('change', toggleDisable);

    // create a listener for the button (on click)
    submit.addEventListener('click', function() {

    console.log(pass.value);
    console.log('submitting fields');

    // ... your code that submits the form

    });

    // evaluate input fields when either one changes (invoked by listeneres above)
    function toggleDisable() {
        let petSelcted= pet.options[pet.selectedIndex].value
    if (id.value.length == '' || cin.value.length == "" || fname.value.length == ""  || !petSelcted.length || date.length =="" ) {
        submit.disabled = true;
    } else {
        submit.disabled = false;
    }
    }

    const setDateInputReservation = () => {
  var today = new Date().toISOString().split("T")[0];
  var nextWeekDate = new Date(new Date().getTime() + 14 * 24 * 60 * 60 * 1000)
    .toISOString()
    .split("T")[0];
  document.getElementById("date").setAttribute("min", today);
  document.getElementById("date").setAttribute("max", nextWeekDate);
  var today2 = new Date();
  let monthSet = today2.getMonth() + 1;
  console.log(monthSet);
  if (monthSet < 9) {
    var settoday =
      today2.getFullYear() + "-" + "0" + monthSet + "-" + today2.getDate();
    console.log(settoday);
  } else {
    var settoday =
      today2.getFullYear() + "-" + monthSet + "-" + today2.getDate();
  }

  document.getElementById("date").value = settoday;
  AfficheReservedHours()
};

setDateInputReservation();







</script>
</html>