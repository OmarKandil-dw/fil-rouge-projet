<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>New client</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
</head>

<style>

.single_box.success input {
        border-color: green;
      }

      .single_box.error input {
        border-color: #ff2600;
      }


.single_box small {
        visibility: hidden;
      }

      .single_box.error small {
        visibility: visible;
        color: red;
      }
</style>

<body>

  <?php 
  include "sidebar.php";
  include "connection.php";


  
  if (isset($_POST['submit'])) {
    
    //data  info
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cin = $_POST['cin'];

    $valid = 0;




    $checkemail = mysqli_query($conn, "SELECT adresse from client WHERE adresse = '$email'");
    if (mysqli_num_rows($checkemail) > 0) {
    echo  "<p style=\"color: red;\">this email is already used</p>";
    $valid++;
    }


    $checkphone = mysqli_query($conn, "SELECT phone from client WHERE phone = '$phone'");
    if (mysqli_num_rows($checkphone) > 0) {
    echo  "<p style=\"color: red;\">this phone is already used</p>";
    $valid++;
    }

    $checkcin = mysqli_query($conn, "SELECT cin from client WHERE cin = '$cin'");
    if (mysqli_num_rows($checkcin) > 0) {
    echo  "<p style=\"color: red;\">this cin is already used</p>";
    $valid++;
    }

 
   
    if ($valid == 0) {      
      //data info >> database >> client
      $sql = "INSERT INTO Client (fname, lname, adresse,phone,CIN) VALUES ('$fname', '$lname', '$email', '$phone', '$cin')";
      $query = mysqli_query($conn, $sql);

     if(! headers_sent()){
      header("location: customers.php");
     }else{
       echo '<script type="text/javascript">window.location.href="customers.php"</script>';
     }
          }
    
  }
 
   ?>

  <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

      <h3>
        <center>Add Client</center>
      </h3>

      <form action="formulaire.php" method="POST" id="form">

        <div class=" single_box">
          <label for="first name" class="form-label">First name</label>
          <input type="text" class="form-control" name="fname" id="fname" placeholder="first name " >
        </div>

        <div class=" single_box">
          <label for="last name" class="form-label">last name</label>
          <input type="text" class="form-control" name="lname" id="lname" placeholder="last name " >
        </div>
        
        <div class="single_box">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" >
        </div>

          <div class="single_box">
            <label for="phone" class="visually-hidden">phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="0506070809">
          </div>

          <div class="single_box">
            <label for="" class="visually-hidden">CIN</label>
            <input type="text" class="form-control" name="cin" id="cin" placeholder="cin">
        </div>

        <div class="col-12 text-center">
          <button class="btn btn-primary" disabled  id="sub" name="submit" type="submit" style="margin-top:20px;">Submit</button>
        </div>

  </form>
  </div>
  </div>  

  <?php include "footer.php" ?>

</body>
<script>


  

      let fname = document.getElementById('fname');
      let lname = document.getElementById('lname');
      let email = document.getElementById('email');
      let phone = document.getElementById('phone');
      let cin = document.getElementById('cin');
      let submit = document.getElementById('sub');
      

    // create a listener for both input fields(on change)s
    cin.addEventListener('change', toggleDisable);
    fname.addEventListener('change', toggleDisable);
    lname.addEventListener('change', toggleDisable);
    email.addEventListener('change', toggleDisable);
    phone.addEventListener('change', toggleDisable);



    // evaluate input fields when either one changes (invoked by listeneres above)
    function toggleDisable() {
      const fnameregex = /^[a-zA-Z]+$/.test(fname.value);
      const lnameregex = /^[a-zA-Z]+$/.test(lname.value);
      const emailregex =/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value);
      const phoneregex = /^[0-9]+$/.test(phone.value)
    if (!fnameregex || !lnameregex || !emailregex || !(phone.value.length == 10) || !phoneregex || cin.value.length =="" ) {
        submit.disabled = true;
    } else {
        submit.disabled = false;
    }
    }


</script>
    

</html>