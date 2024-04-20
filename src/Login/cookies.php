<?php
// Krijimi i nje cookie
$cookie_name = "user";
$cookie_value = "CookiesTest";
$expire_time = time() + (86400 * 30); // 30 dite, kto sjon valid PERMANENT qata duhesh me caktu diqka si timestamp
$cookie_path = "/"; // per '/' domethan qe cookie osht valid n secilin domain
$cookie_domain = ""; // domaini per t cilin ky osht valid, empty per me leju domenin aktual
$cookie_secure = false; // nese cookie duhet me u dergu veq permes HTTPS
$cookie_httponly = true; // nese cookie osht accessible veq permes HTTP (smunet me u lexu permes js)

setcookie($cookie_name, $cookie_value, $expire_time, $cookie_path, $cookie_domain, $cookie_secure, $cookie_httponly);

// Validimi dhe rujtja e emrit t userit
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['username'])) {
        $error = "Please enter username";
    } else {
        $_SESSION['username'] = htmlspecialchars($_POST['username']);
        header("Location: ".$_SERVER['PHP_SELF']); // t rikthen n faqen e njejt pasi qe e bon submit
        exit();
    }
}

session_start();

$users = [
    'user'=>"test", 
   "manager"=>"secret",
    "guest"=>"abc123"];

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {   
       $user = $_POST['username'];       
       if (array_key_exists($user, $users)) {
           if ($users[$_POST['username']] == $_POST['password']) { 
               $_SESSION['username'] = $_POST['username']; 
               echo "<script>alert('You have entered correct username and password');</script>";
               header("Location: ../../Home/index.php"); 
               exit(); 
           } else {
               echo "<script>alert('You have entered wrong Password');</script>";
           }
       } else {
           echo "<script>alert('You have entered wrong user name');</script>";
       }
   }
?>

<?php
if(isset($_GET['cookie_consent']) && $_GET['cookie_consent'] == 1) {
    setcookie("cookie_consent", 1, time() + (86400 * 30), "/");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if(isset($_GET['cookie_decline']) && $_GET['cookie_decline'] == 1) {
    setcookie("cookie_decline", 1, time() + (86400 * 30), "/");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();

}

if(!isset($_COOKIE["cookie_consent"]) && !isset($_COOKIE["cookie_decline"])) { 
    echo "<div class=\"container-banner\">This site uses cookies to provide the best user experience. By continuing to use this site, you agree to the use of cookies. <a href='?cookie_consent=1'>Accept</a> | <a href='?cookie_decline=1'>Reject</a> </div>";
}
?>
