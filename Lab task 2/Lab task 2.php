<!DOCTYPE HTML>  
<html>

<head>
</head>

<body>  

<style>
.error {color: #FF0000;}
</style>

<?php
$nameErr = $emailErr = $genderErr = $dobErr = $degreeErr = $blood_groupErr = "";
$name = $email = $gender = $birthday = $blood_group = $count = "";
$degree = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name field must not be empty";
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' .]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "Only letters, spaces, full stop, dash allowed and minimum two words";
      $name="";
    }
  }

  
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email field must not be empty";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Email format is incorrect";
      $email="";
    }
  }
    

  if (empty($_POST["birthday"])) 
  {
    $dobErr = "Date of Birth field must not be empty";
  } 
  else 
  {
    $birthday = test_input($_POST["birthday"]);
  }


  if (empty($_POST["gender"])) 
  {
    $genderErr = "Gender field must not be empty";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degree"]) ) 
  {
    $degreeErr = "Degree field must not be empty";
  } 
  else 
  {
    foreach($_POST['degree'] as $selected_degree)
  {
    $count++;
  }
    if ($count<2)
    {
      $degreeErr = "Must choose atleast two degrees";
    }
    
  }
    

    if (empty($_POST["blood_group"])) 
  {
    $blood_groupErr = "Blood_Group field must not be empty";
  } 
  else 
  {
    $blood_group = test_input($_POST["blood_group"]);
  }

}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Lab Task 2 </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Date of Birthday: <input type="date" name="birthday">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  
  Gender:  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Degree:  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="O levels") echo "checked";?> value="O levels">O levels
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="A levels") echo "checked";?> value="A levels">A levels
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
  <span class="error">* <?php echo $degreeErr;?></span>


  <br><br>

  Blood Group :  <select name="blood_group">
  <option></option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="a+") echo "checked";?> value="a+">A+</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="a-") echo "checked";?> value="a-">A-</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b+") echo "checked";?> value="b+">B+</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b-") echo "checked";?> value="b-">B-</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o+") echo "checked";?> value="o+">O+</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o-") echo "checked";?> value="o-">O-</option>
   <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab+") echo "checked";?> value="ab+">AB+</option>
  <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab-") echo "checked";?> value="ab-">AB-</option>
  </select>
  <span class="error">* <?php echo $blood_groupErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  

</form>


<?php
echo "<h2>Your Data:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $birthday;
echo "<br>";
echo $gender;
echo "<br>";
foreach($_POST['degree'] as $selected_degree)
  {
    if($count>1)
    {
      echo $selected_degree. " ";
    }
  }
echo "<br>";
echo $blood_group;
?>

</body>
</html>