<?php

ob_start();
// session_id("session1");
//session_start(); //array
$noNavbar = '';
global $con;

$pageTitle1 = 'LOGIN';
//  echo $_SERVER['REMOTE_ADDR'];
$id = isset($_GET['id']) ? $_GET['id'] : 0;
// echo $id;

if (isset($_SESSION['username'])) { // If the user is login
    header('Location: dashboard.php');  //Redirect to dashboard page
}
include '../comp/init.php';
//Check if user coming from HTTP post request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(!isset($_POST['reg'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //  $hashedpass = sha1($password);

    $salt = md5(313);
    $hashedpass = md5($password . $salt);

    // Check if the user exist in database

    $stmt = $con->prepare("SELECT 
                                    id ,username , password 
                              FROM " . DB_PREFIX . "user_details
                              WHERE 
                                   (username = ? OR email = ?)
                              AND 
                                    password = ? 
                              
                                     LIMIT 1");
    $stmt->execute(array($username, $username, $hashedpass));
    $row = $stmt->fetch(); // save the data from mysql tabel on array
    $count = $stmt->rowCount();
    //If $count > 0 this mean the database contain record about this username
    if ($count > 0) {
        $path = $_SERVER['REQUEST_URI'];
        $urlParts = explode("/", $path);
        $_SESSION['dir'] = $urlParts[1];
        $_SESSION['ID'] = $row['id'];  //Rgister session ID userid sensble case
        $_SESSION['username'] = $username; //Rgister session name
        header('Location: ../acasa.html');  //Redirect to dashboard page
    }
} else {
    $fname = trim($_POST['fname'] );       
    $lname = trim($_POST['lname'] );  
    $email = trim($_POST['email'] );    
    $username = trim($_POST['uname'] );  
    $pass1 = trim($_POST['pass1'] );     
    $pass2 = trim($_POST['pass1'] );     
    $salt = md5(313);
    $hashedpass = md5($pass1 . $salt);  
        $formErrors =array();
        if(strlen($username)<4) { $formErrors[] = 'Username Can\'t Be Less Than <strong>4 Characters</strong>'; }
        if(strlen($username)>20){ $formErrors[] = 'Username Can\'t Be More Than <strong>20Characters</strong>'; }
        if(empty ($username))   { $formErrors[] = 'Username Can\'t Be <strong>Empty</strong>';  }
        if(empty ($fname))   { $formErrors[] = 'First Name Can\'t Be <strong>Empty</strong>'; }
        if(empty ($lname))   { $formErrors[] = 'Last Name Can\'t Be <strong>Empty</strong>'; }
        if(empty ($email))  { $formErrors[] = 'Email Can\'t Be <strong>Empty</strong>';     }

        $countdata = checkItem("username","user_details",$username,' AND  id!='.$id );         // Check username is exist in database
        if($countdata >0)   { $formErrors[] = 'Sorry This User Name Is Exist'; }
        $countdata = checkItem("email","user_details",$email ,' AND  id!='.$id);         // Check username is exist in database
        if($countdata >0)   { $formErrors[] = 'Sorry This Email Is Exist'; }

        // Loop Into Errors Array And Echo It
        foreach ($formErrors as $error) {
            $control=1;
            if ($error =='Sorry This User Name Is Exist'){
              $theMsg ='<div class="alert alert-danger">' . $error .'</div>'; 
            }else{
              $theMsg ='<div class="alert alert-danger">' . $error .'</div>'; 
            }
        }               

                if (empty($formErrors)){
                    
                    //Insert User Info In Database
                    
                    $stmt = $con->prepare("INSERT INTO " . DB_PREFIX . "user_details  
                                          (first_name , last_name , email , password ,username )
                                           VALUES ( :zfname ,:zlname ,:zemail ,:zpass ,:zuser )");
                    
                    $stmt->execute(array(
                        'zfname'   => $fname,
                        'zlname'   => $lname,
                        'zemail'  => $email,
                        'zpass'   => $hashedpass,
                        'zuser'   => $username,
                    ));  
                    
                }   

}
}

    function checkItem($select ,$from,$value,$and =null){
        
        global $con;
        
        $statement = $con->prepare("SELECT $select FROM " . DB_PREFIX . "$from WHERE $select = ? $and");
        
        $statement->execute(array($value));
        
        $count = $statement->rowCount();
        
        return $count;
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Inregistrare si autentificare</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="wrapper">

        <nav class="nav">
            <div class="nav-logo">
                <p>Eliceu</p>
            </div>

            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="#" class="link active">Intră în cont</a></li>
                    <li><a href="../acasa.html" class="link">Acasă</a></li>

                </ul>
            </div>

            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Autentificare</button>
                <button class="btn" id="registerBtn" onclick="register()">Înregistrare</button>
            </div>

            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>



        <div class="form-box" style="height: 700px;">
            <!--inregistarre-->
            <div class="login-container" id="login">

                <form class="login" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off" method="POST">
                    <div class="top">
                        <span>Nu ai cont?<a href="#" onclick="register()">Înregistrare</a></span>
                        <header>Autentificare</header>
                    </div>

                    <!-- Email -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="user"
                            placeholder="Numele utilizatorului sau email-ul">
                        <i class="bx bx-user" required></i>
                    </div>

                    <!-- Parola -->
                    <div class="input-box">
                        <input type="password" class="input-field" name="pass" placeholder="Parolă">
                        <i class="bx bx-lock-alt" required></i>
                    </div>

                    <!-- Buton -->
                    <div class="input-box">
                        <input type="submit" class="submit" value="Autentificare">
                    </div>

                    <!-- Checkbox + Termeni -->
                    <div class="two-col">

                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check">Ține-mă minte</label>
                        </div>

                        <div class="two">
                            <label><a href="#">Ai uitat parola?</a></label>
                        </div>

                    </div>
                </form>
            </div>


            <div class="register-container" id="register">
                <form class="login" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off" method="POST">
                    <div class="top">
                        <span>Ai un cont? <a href="#" onclick="login()">Autentificare</a></span>
                        <header>Înregistrare</header>
                    </div>

                    <!-- Nume + Prenume -->
                    <div class="two-forms">

                        <div class="input-box">
                            <input type="heddin" name="reg" value="1" hidden>
                            <input type="text" name="lname" class="input-field" placeholder="Nume" required>
                            <i class="bx bx-user" ></i>
                        </div>

                        <div class="input-box">
                            <input type="text" name="fname" class="input-field" placeholder="Prenume" required>
                            <i class="bx bx-user"></i>
                        </div>

                    </div>

                    <!-- Email -->
                    <div class="input-box">
                        <input type="text" name="uname" class="input-field" placeholder="Username" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>

                    <!-- Parola -->
                    <div class="input-box">
                        <input type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="input-field" placeholder="Parolă" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="input-field" placeholder="Parolă" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>

                    <!-- Buton -->
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>

                    <!-- Checkbox + Termeni -->
                    <div class="two-col">

                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check">Ține-mă minte</label>
                        </div>

                        <div class="two">
                            <label><a href="#">Termenii și condițiile</a></label>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>
    <script>
        function myMenuFunction() {
            var i = document.getElementById("navMenu");
            if (i.className === "nav-menu") {
                i.className += " responsive";
            }
            else {
                i.className = "nav-menu";
            }
        }
    </script>

    <script>
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className = "btn white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-510px";
            y.style.right = "5px";
            a.className = "btn";
            b.className = "btn white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
        if (window.location.hash === "#register") {
            register();
        }
    </script>
</body>
</html>