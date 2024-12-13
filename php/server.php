<?php

session_start();


// initializing variables
$firstname = "";
$lastname = "";
$email    = "";
$password    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'screenwave');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password_1 =$_POST['password'];
    $gender = $_POST['gender'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) { array_push($errors[] , "First Name is required"); }
    if (empty($lastname)) { array_push($errors[] ,"Last Name is required"); }
    if (empty($email)) { array_push($errors[] , "Email is required"); }
    if (empty($gender)) { array_push($errors[] , "Select a Gender"); }
    if (empty($address)) { array_push($errors[] , "Address is required"); }
    if (empty($city)) { array_push($errors[] , "City is required"); }
    if (empty($nic)) { array_push($errors[] , "NIC No is required"); }
    if (empty($dob)) { array_push($errors[] , "Date of Birth is required"); }
    if (empty($password_1)) { array_push($errors[] , "Password is required"); }
    if (empty($contact)) { array_push($errors[] , "Contact is required"); }


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            echo "<script>alert('User Already Exists<br>Please Login')</script>";
            // header('location: /MovieSite/signin.html');
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (firstName, lastName, email,contact, password, gender, address, city, nic, dob,userType) 
  			  VALUES('$firstname','$lastname', '$email',$contact, '$password','$gender','$address','$city','$nic','$dob', 'user')";
        mysqli_query($db, $query);
        header('location: /MovieSite/signin.php');
    }
    // LOGIN USER
}else if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($email)) {
        echo "<script>alert('Username is required')</script>";
    }
    if (empty($password)) {
        echo "<script>alert('Password is required')</script>";
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['nic'] = $row['nic'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['email'] = $email;
            $_SESSION['state'] = "hidden";
            $_SESSION['success'] = "You are now logged in";

            $cookie_name = "user";
            $cookie_value = "$email";

            if(!isset($_COOKIE[$cookie_name])) {
                setcookie($cookie_name, $cookie_value, time() + (600), "/"); // 86400 = 1 day
              } else {
                
              }

            if($row['userType'] == "admin"){
                $_SESSION['userType'] = $row['userType'];
                header('location: /MovieSite/admin/index.php');
            }else{
                $_SESSION['userType'] = $row['userType'];
                header('location: /MovieSite/index.php');
            }

        } else {
            array_push($errors[] , "Wrong username/password combination");
            echo "Something Wrong";

        }
    }
}else{
    header('location: signin.php');
}



?>
