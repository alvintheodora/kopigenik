<?php 
  date_default_timezone_set('Asia/Jakarta');
  session_start();
 ?>

 <?php
  //include '../../../kg-ctrs/ctdb-l.php'; //PDO Connector
  include 'controlDB.php'; //PDO Connector
  
  $txtEmail = $txtPassword = $errLogin = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //catch from form
    $txtEmail = test_input($_POST["txtEmail"]);
    $txtPassword = test_input($_POST["txtPassword"]);
    
    //check to db
    $stmt = $pdo->prepare("SELECT * FROM mscustomer WHERE email = ? AND pass = ?");
    $stmt->execute([$txtEmail,$txtPassword]);
    $row = $stmt->fetch();
    if ($row != null) {
      $_SESSION["visitor"] = $row['name'];
      header('location: index.php');
    }
    else {
      $errLogin = "Email or Password is invalid.";
    }
  }   

  //enhance security
  function test_input($data) {
    $data = trim($data," ");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="signin.css">
    <?php include 'head.php'; ?>
    <title>Kopigenik - Login</title>

    <link rel="stylesheet" type="text/css" href="css/signin.css">

  </head>
  <body>
     <?php include 'navbar.php'; ?>  

    <header>
      <br>
      <br>
      <br>
      <br>

    </header>

    

    <div class="row">
    <div class="col s2 l4"></div>
    <div class="col s8 l4">
      <div class="card-panel">
        <div class="row">
          <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
              
              <div class="center col s12">
                <h3>Log In</h3>
              </div>
              
              <?php if (isset($_SESSION['tempEmail']) && isset($_SESSION['tempPass'])) { ?>
              
                <div class="input-field col s12">
                  <input type="email" name="txtEmail" id="txtEmail" class="validate" required="" value="<?php $_SESSION['tempEmail']; ?>">
                  <label id="lblEmail" for="txtEmail">Email</label>                
                </div>

                <div class="input-field col s12">
                  <input type="password" name="txtPassword" id="txtPassword" class="validate" required="" value="<?php $_SESSION['tempPass']; ?>>">
                  <label id="lblPassword" for="txtPassword">Password</label>
                </div>

                <?php session_unset(); ?>
              
              <?php } else { ?>

              <div class="input-field col s12">
                <input type="email" name="txtEmail" id="txtEmail" class="validate" required="">
                <label id="lblEmail" for="txtEmail">Email</label>                
              </div>

              <div class="input-field col s12">
                <input type="password" name="txtPassword" id="txtPassword" class="validate" required="">
                <label id="lblPassword" for="txtPassword">Password</label>
              </div>
              <div class="center input-field col s12">
               <p><a href="fpass/">Lupa password?</a></p>
              </div>
              <?php } ?>

              <div class="center input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">LOGIN</button>
              </div>

            </div>
          </form>
          <div class="col s12 center">
            <p>Don't have an account? Sign up <a href="../signup/">here.</a></p>
          </div>
          <!-- <div class="col s12 center">
            <p><a href="#">Forgot Password?</a></p>
          </div><br> -->
          <div class="col s12 center">
            <p class="red-text"><?php echo $errLogin; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col s2 l4"></div>
  </div>    
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  <script type="text/javascript">
    
  </script>

  </body>
</html>