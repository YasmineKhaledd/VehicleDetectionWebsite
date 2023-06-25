<?php
session_start();

$verificationCode = $_SESSION['verification_code'];
//$email = $_POST['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verificationCodeEntered = $_POST['verification_code'];
    if ($verificationCodeEntered == $verificationCode) {
        echo 'Verification successful!, Try to login now';
        header("Location: Login.php");
        exit();
    } else {
        echo 'Verification failed!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400;1,800&family=Roboto+Slab:wght@700&family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        


    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    




    <title>Verification-Code</title>
</head>
<body class="text-center">

      
      <main>      
        <header class="p-3 text-bg-dark">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="Logo.PNG" alt="Logo" width="50" height="50" class="me-2">             
      
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="Home.php" class="nav-link px-3 text-secondary fw-bold fs-4" >Home</a></li>

              </ul>
      
          
      
               
              <a href="Signup.php ">
                <button type="button" class="btn btn-danger me-3" >Sign-Up</button>
            </a>
            <a href="Login.php">
                <button type="button" class="btn btn-danger" >Login</button>
                </a>
            </div>
          </div>
        </header>
      
      </main>
      

    
      <div class="formm d-flex justify-content-center">
        <form class="form mb-5" action="Login.php" method="POST">
          <div class="mb-3">
            <label for="verify" class="form-label"> Verification Code </label>
            <input type="text" class="form-control" id="verifycode" name="verifycode" aria-describedby="verifyHelp">
          </div>
    
          <button type="submit" class="btn btnn fw-bold ml-5 fs-5">Submit</button>
        </form>
      </div>
      
  

      
      <footer class=" row py-3  text-bg-dark ">
          
          <div class="col mx-5 my-5 col-lg-4">
            <div class="links">
              <h5 class="text-light">About</h5>
              <ul class="list-unstyled lh-lg text-white-50">
               <li> Government Checking Abnormal Behaviors</li>
              </ul>
            </div>
            </div>

            <div class="col mx-5 my-5 col-lg-2">
             <div class="links">
               <h5 class="text-light">Contact US</h5>
               <ul class="list-unstyled lh-lg text-white-50">
                <li> Telephone: +20 2 27955566 </li>
                <li> Telefax: +20 2 27955564 </li>
                <li>mft@mft.gov.eg </li>
               </ul>
             </div>
            </div>
            <div class="col mx-5 my-5 col-lg-2">
         <div class="links">
            <h5 class="text-light">Follow Us</h5>
            <ul class="list-unstyled lh-lg text-white-50">
              <li><a href="https://www.mot.gov.eg/"><i class="fab fa-mot fa-lg me-2"></i>Ministry of Transportation</a></li>
              <li><a href="https://www.linkedin.com/company/ministry-of-transport---egypt/"><i class="fab fa-linkedin fa-lg me-2"></i>LinkedIn</a></li>
              <li><a href="https://www.youtube.com/channel/UCQohChyiu_oOOxA6WOFY-jQ"><i class="fab fa-youtube fa-lg me-2"></i>YouTube</a></li>
              <li><a href="https://www.facebook.com/MinistryTransportation/?locale=ar_AR"><i class="fab fa-facebook fa-lg me-2"></i>Facebook</a></li>
            </ul>
          </div>
        </div>
        </footer>
      



    <script src="js/bootstrap.bundle.min.js"> </script>
    
    <script src="js/js.js"> </script>
    <script src="https://www.gstatic.com/firbasjs/8.3.1/firbase.js"> </script>

    <script src="firbase-connection.js"> </script>
    <script src="firebase.js" type="text/javascript"> </script>

</body>
</html>