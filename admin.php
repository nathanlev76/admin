<title>Dashboard Admin</title>
<script src="https://kit.fontawesome.com/ab98ebb4c8.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/admin.css">
<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
else
{
    header("Location: login.php");
}
?>

<h1 class=h1>Dashboard Admin</h1>
<table>
    <tr>
        <td scope="row"><strong>ID</strong></td>
        <td><strong>Prénom</strong></td>
        <td><strong>Nom</strong></td>
        <td><strong>Message</strong></td>
        <td><strong>Actions</strong></td>
    </tr>

<?php
$user = "root";
$pass = "";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=siteperso', $user, $pass);
    foreach($dbh->query('SELECT * FROM `messages`') as $row) {
        $row = array_map("utf8_encode", $row);

        $name = $row['name'];
        $lastname = $row['lastname'];
        $message = $row['message'];
        $id = $row['id'];
        echo "<tr> 
        <td scope='row'>$id</td>
        <td>$name</td>
        <td>$lastname</td>
        <td>$message</td>
        <td><a href='#' id='delete'>Supprimer</a></td>
        </tr>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
</table>
<div id=logoutbutton>
    <a href="logout.php" id="logout">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
</div>


