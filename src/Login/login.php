<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="login.css">

    <style>
    
    </style>
</head>
<body>

<br><br>

<div class="login-box">
    <div class="login-header">
        <header>Login</header>
    </div>
    <?php
    
    // Klasa bazë për përdoruesin
    class User {
        protected $email; // Deklarimi i variables për emailin
        private $password; // Deklarimi i variables fjalëkalimin
    
        // Konstruktori që inicializon emailin dhe fjalëkalimin kur krijohet një objekt
        public function __construct($email, $password) {
            $this->email = $email; // Ruajtja e emailit në variablin e mbrojtur
            $this->password = $password; // Ruajtja e fjalëkalimit në variablin privat
        }
    
        // Metodë publike për marrjen e emailit
        public function getEmail() {
            return $this->email;
        }
    
        // Metodë e mbrojtur për marrjen e fjalëkalimit, e qasshme vetëm brenda klasës dhe nënklasave
        protected function getPassword() {
            return $this->password;
        }
    
        // Destruktori, thirret automatikisht kur objekti shkatërrohet
        public function __destruct() {
            //  Pastrimi i log-eve ose mbyllja e lidhjeve
        }
    }
    
    // Klasa për autentikim të përdoruesit, trashëgohet nga klasa User
    class AuthUser extends User {
        // Metoda për logimin e përdoruesit
        public function login($conn) {
            // Pastrimi i emailit dhe fjalëkalimit nga karakteret e dëmshme përpara se të dërgohen në databazë kjo perdoret per tu mbrojtur nga SqlInjections
            $email = mysqli_real_escape_string($conn, $this->getEmail());
            $password = mysqli_real_escape_string($conn, $this->getPassword());
    
            // Query për kontrollin e përdoruesit në databazë
            $sql = "SELECT fullname FROM register WHERE email = '$email' AND passwordi = '$password'";
            $result = mysqli_query($conn, $sql);
            // Kontrollon nëse ka një rezultat, që do të thotë se përdoruesi është i vlefshëm
            if (mysqli_num_rows($result) == 1) {  //E kqyr nese osht ni row n databaz qe osht tu bo match me qato t dhana
                $row = mysqli_fetch_assoc($result); //i vendos te dhenat ne variablen row
                $_SESSION['login_user'] = $row['fullname']; // Ruajtja e emrit të plotë në session për përdorim të mëtejshëm
     
                $colorSettings = "#222831|white"; // No spaces around "|"
                setcookie('colorSettings', $colorSettings, time() + (86400 * 30), '/'); // Set the cookie
                
         
                header("location: ../../Home/index.php"); // Ridrejtimi i përdoruesit në faqen kryesore
                exit(); // Ndërpret ekzekutimin e mëtejshëm të skriptit
            } else {
                // Throws një përjashtim nëse kredencialet janë të pavlefshme
                throw new Exception("Invalid login credentials.");
            }
        }
    }
     
    include("../../database/configDatabase.php"); // Përfshin skedarin për konfigurimin e databazës
    session_start(); // Fillon një sesion ose vazhdon sesionin ekzistues
    
    // Kontrollon nëse metoda e kërkesës është POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Provimi i krijimit dhe logimit të përdoruesit
            $authUser = new AuthUser($_POST['email'], $_POST['password']); // Krijimi i një instance të AuthUser me email dhe fjalëkalim
            $authUser->login($conn); // Thirrja e metodës login
        } catch (Exception $e) {
            $error = $e->getMessage(); // Merr mesazhin e përjashtimit nëse diçka shkon keq
            echo $error;  // Shfaqja e mesazhit të errorit, konsideroni ridrejtimin ose shfaqjen e një mesazhi miqësor për përdoruesin
        }
    }
    
    ?>




        <br>
        <form action="login.php" method="post">
        <div class="input-box">
            <input type="email" class="input-field" name="email" placeholder="Email">
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off">
        </div>
        
        <div class="input-submit">
            <input type="submit" name="login" value="Sign in" class="submit-btn" id="submit1" style="color: #fff;">
        </div>
        <div class="sign-up-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <a href="../../Home/index.php"><u>Return To Homepage</u></a>
        </div>
       
    
    <?php
    include("../../src/Login/cookies.php");
   
     ?>
</body>
</html>
