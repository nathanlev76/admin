<title>Connexion</title>

<?php 
$error = "";
$success = "";
session_start();
if(isset($_SESSION['username']))
{
    if($_SESSION['username'] === "admin")
    {
        header("Location: admin.php"); 
    }
}

if(isset($_POST['submit'])){
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    if($username === "admin" && $password === "admin")
    {
        $error = "";
        $_SESSION["username"] = $username;
        header("Location: admin.php");
    }
    else
    {
        $error = "Mot de passe incorrect !";
    }
}


?>

<link rel="stylesheet" href="css/login.css">
<body>
    <form action="" method="POST">
        <div class="login-box">
            <h1>Connexion</h1>
            <div class="textbox">
                <input type="text" placeholder="Nom d'utilisateur" name="username" value="" autocomplete="off">
            </div>
  
            <div class="textbox">
                <input type="password" placeholder="Mot de passe" name="password" value="" autocomplete="off">
            </div>
  
            <input class="button" type="submit" name="submit" value="Se connecter">
            <p class="errormessage"><?php echo $error?></p>
            <a href=index.html id="back">Revenir sur le site</a>
        </div>
    </form>
</body>
