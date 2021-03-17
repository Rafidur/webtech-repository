<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <?php 
    // define variables and set to empty values
    $nameErr = $passwordErr = $newPasswordErr =  $currentPasswordErr = "" ;
    $password = $name = $newPassword = $currentPassword = "";
    $nc =strlen($name);
    $pc =strlen($password);
    //take name input and chack the prosidule...
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"]))//if that text fild is empty
         {
          $nameErr = "Name field cannot be empty";
        } 
        else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
              $nameErr = "Only letters white space, period & dash allowed";
              $name ="";
            }
            else if ($nc<2) {
              $nameErr = "Two words needed at minimum";
              $name ="";
            }
            else if ($nc>2) {
                $nameErr = "ok";
                $name ="";
              }
          }
          //condition chaking for password.

          if (empty($_POST["password"])) {
            $passwordErr = "password field cannot be empty";
          } else {
            $password = test_input($_POST["password"]);
            if ($pc<8)//conditions
             {
              $passwordErr = "8 characters are needed at minimum . At minimum one special character is required (@, #, $,
              %)";
              $password ="";
            }
            else if (!preg_match("/[@,#,$,%]/",$password)) {
              $passErr = "Password requires atleast one special character  (@, #, $,%)";
              $password ="";
            }

          }
          //for change password..
          //currentPassword cheking...
          if (empty($_POST["currentPassword"])) {
            $currentPasswordErr = "Current Password field cannot be empty";
          } else {
            if (!strcmp($currentPassword, $password)==0) {
              $currentPasswordErr="Password incorrect";
            }
            $currentPassword = test_input($_POST["currentPassword"]);
          }
          if (empty($_POST["newPassword"])) {
            $newPasswordErr = "Retype The Current Password";
          } else {
            $newPassword = test_input($_POST["password"]);
            if (!strcmp($Password, $newPassword)==0) {
              $rtnpassErr = "Password Does not Match";
            }
          }

    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!--1st part...-->

        <div class="username">
            <h1>LOGIN</h1>
            <!--take name input in text type...-->
            <div class="name">

                Name: <input type="text" name="name">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>

            </div>
            <div class="password">

                password: <input type="password" name="password">
                <span class="error">* <?php echo $passwordErr;?></span>
                <br><br>
            </div>
            <hr>
            <input type="checkbox" name="Remember_me"> Remember Me <br>

            <input type="submit" name="submit" value="Submit"> <a href="http://">Forgot password?</a>

        </div>
    </form>
    <form>
        <div class="newpassword">
            <h1>CHANGE PASSWORD.</h1>
            <!--Change password part 2-->
            <div class="newPassword">

                Current password: <input type="password" name="currentPassword">
                <br><br>
                <span style="color:Green">New password: </span> <input type="password" name="password">
                <span class="error">* <?php echo $passwordErr;?></span>
                <br><br>
                <span style="color:red">Retype password: </span> <input type="password" name="newPasswordErr">
                <span class="error">* <?php echo $newPasswordErr;?></span>
                <br><br>
            </div>
            <hr>
            <input type="submit" name="submit" value="Submit">

        </div>
    </form>






</body>

</html>