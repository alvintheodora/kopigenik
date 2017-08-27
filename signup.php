<?php 
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  
 ?>

<?php   
  
  function dateParser($dpDoB) {
    $date = date_create_from_format("j M, Y", $dpDoB);
    $new = date_format($date,"Y-m-d");
    return $new;
  }

  //enhance security
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function emailCheck($email) {
      try {
        //include '../../../kg-ctrs/ctdb-l.php'; //PDO Connector
        include 'controlDB.php'; //PDO Connector
        $stmt5 = $pdo->prepare("SELECT * FROM mscustomer WHERE email = ?");
        $stmt5->execute([$email]);
        $row = $stmt5->fetch();
        if ($row != null) {
          return false;
        }
        else {
          return true;
        }
      } catch (Exception $e) {
        echo "There is something wrong!";
      }
    }

    function dobChecker($dpDoB) {
      $getdate = getdate();
      if ($getdate['mon'] < 10) {
        $now = $getdate['year'].'-0'.$getdate['mon'].'-'.$getdate['mday'];
      }else {
        $now = $getdate['year'].'-'.$getdate['mon'].'-'.$getdate['mday'];
      }
      $date1 = date_create($dpDoB);
      $date2 = date_create($now);
      $diff = date_diff($date1,$date2);
      if ($diff->format("%Y") < 17) {
        return false;
      }else {
        return true;
      }
    }

  //Variables initialization
  $txtCustomerId = $txtName = $txtEmail = $txtPassword = $txtPhone = $dpDoB = $txtGender = $txtAddressId = $errName = $errEmail = $errPassword = $errPhone = $errDoB = $signUpStatus = "";

  $txtAddress = $txtProvince = $txtCity = $txtDistrict = $txtSubDistrict = $txtZipCode = "TBU";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $txtName = test_input($_POST["txtName"]);
      $txtEmail = test_input($_POST["txtEmail"]);
      $txtPassword = test_input($_POST["txtPassword"]);
      $txtGender = test_input($_POST["txtGender"]);
      $dpDoB = test_input($_POST["dpDoB"]);
      $txtPhone = test_input($_POST["txtPhone"]);
    
    if (!preg_match("/^[a-zA-Z ]+$/",$txtName)) {
      $errName = "Only whitespace and letters allowed!";
    }
    elseif (strlen($txtName) > 50) {
      $errName = "Name must be consisted up to 50 characters!";
    }
    elseif (strpos($txtEmail,".")+1 == strpos($txtEmail,"@")) {
      $errEmail = ". and @ cannot be placed side by side!";
    }
    elseif (strlen($txtEmail) > 50) {
      $errEmail = "Email must be consisted up to 50 characters!";
    }
    elseif (emailCheck($txtEmail) == false) {
      $errEmail = "Email address already registered!";
    }
    elseif (strlen($txtPassword) < 8 || strlen($txtPassword) > 16) {
      $errPassword = "Password must be consisted at least 8 and up to 16 characters!";
    }
    elseif (dobChecker($dpDoB) == false) {
      $errDoB = "Age must be at least 17 years old!";
    }
    elseif (strlen($txtPhone) > 12 || strlen($txtPhone) < 10) {
      $errPhone = "Phone must be consisted of at least 10 and up to 12 numerical digits";
    }
    elseif (!is_numeric($txtPhone)) {
      $errPhone = "Phone number must be consisted of numerical digits";
    }
    else {

      try {

        //include '../../../kg-ctrs/ctdb-l.php'; //PDO Connector
        include 'controlDB.php'; //PDO Connector

        //generate address Id -> varchar(16)
        $txtAddressId = "AD"; //prefix
        $stmt = $pdo->query("SELECT COUNT(address_id) FROM msaddress")->fetchColumn(); //retrieve suffix of last id
        for ($i=14; $i > strlen($stmt) ; $i--) $txtAddressId.="0"; //fill 0 into new id
        $txtAddressId.=$stmt+1; //new customer id generated

        //insert new address data        
        $addr = "INSERT INTO msaddress VALUES (?,?,?,?,?,?,?)";
        $pdo2->prepare($addr)->execute([$txtAddressId,$txtAddress,$txtProvince,$txtCity,$txtDistrict,$txtSubDistrict,$txtZipCode]);

        //generate customer Id -> varchar(16)
        $txtCustomerId = "CS"; //prefix
        $stmt3 = $pdo3->query("SELECT COUNT(customer_id) FROM mscustomer")->fetchColumn(); //retrieve suffix of last id
        for ($i=14; $i > strlen($stmt3) ; $i--) $txtCustomerId.="0"; //fill 0 into new id
        $txtCustomerId.=$stmt3+1; //new customer id generated

        //insert new customer data
        $cust = "INSERT INTO mscustomer VALUES (?,?,?,?,?,?,?,?)";
        $pdo4->prepare($cust)->execute([$txtCustomerId,$txtName,$txtEmail,$txtPassword,$txtPhone,dateParser($dpDoB),$txtGender,$txtAddressId]);

        $signUpStatus = "Successfully registered!";
        
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
      
    }

  }

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="shortcut icon" href="../../assets/img/Logomakr_4xWibA.png">
    <title>Kopigenik - Sign Up</title>
    
    <script src="js/materialize.js"></script> 
    <?php include 'head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body>
  <?php include 'navbar.php'; ?> 
  

      <br>
      <br>
      <br>
      <br>

  <div class="row">
    <div class="col s1 l3"></div>
    <div class="col s10 l6">
      <div class="card-panel">
        <div class="row">
          <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
              
              <div class="center col s12">
                <h3>Sign Up</h3>
              </div>
              
              <div class="input-field col s12 fieldLabelDiv">
                <input type="text" name="txtName" id="txtName" class="validate" required="">
                <label id="lblName" for="txtName" class="fieldLabel">Name</label>
                <span class="red-text"><?php echo $errName;?></span>
              </div>
              
              <div class="input-field col s12">
                <input type="email" name="txtEmail" id="txtEmail" class="validate" required="">
                <label id="lblEmail" for="txtEmail">Email</label>                
                <span class="red-text"><?php echo $errEmail;?></span>
              </div>
              
              <div class="input-field col s12">
                <input type="password" name="txtPassword" id="txtPassword" class="validate" required="">
                <label for="txtPassword">Password</label>
                <span class="red-text"><?php echo $errPassword;?></span>
              </div>

              <div class="input-field col s12">
                <select name="txtGender" required="">
                  <option value="" disabled selected>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>

              <div class="input-field col s12">
                <input type="date" name="dpDoB" id="dpDoB" class="datepicker">
                <label for="dpDoB">Birthdate</label>
                <span class="red-text"><?php echo $errDoB;?></span>
              </div>

              <div class="input-field col s12">
                <input type="text" name="txtPhone" id="txtPhone" class="validate" required="" data-length="12">
                <label for="txtPhone">Phone</label>
                <span class="red-text"><?php echo $errPhone;?></span>
              </div>              

              <div class="input-field col s12">
                <p>Clicking SIGN UP means that you agree to the <strong><u>terms and conditions applied</u></strong> in the <a href="#">Kopigenik Privacy Policy</a></p>
              </div>

              <div class="center input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up</button>
              </div>

            </div>
          </form>
          <p class="teal-text"><?php echo $signUpStatus; ?></p>
        </div>
      </div>
    </div>
    <div class="col s1 l3"></div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
       $('select').material_select();
       $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 200 // Creates a dropdown of n years to control year
        });
       $('textarea#txtAddress, input#txtPhone, input#txtZipCode').characterCounter();
    });
  </script>

</body>
</html>