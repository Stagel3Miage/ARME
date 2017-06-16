<?php
require_once("includes/db_connection.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("includes/session.php");

if(isset($_POST['submit']))
{
    $mail = $_POST["email_connect"];
    $pwd = md5($_POST["pwd_connect"]);
    $query = "SELECT MAIL_U, MDP_U FROM utilisateur ";
    $query .= " WHERE MAIL_U = '{$mail}' AND MDP_U = '{$pwd}'";
    $query .= " LIMIT 1";
    //echo $query;
    $result = mysqli_query($connect, $query);
    echo '</br>';
    $row = mysqli_fetch_array($result);
    if ($row[0]==null) {
      echo "utilisateur non reconnu";
    }
    else {
      echo "bienvenue membre";
    }
}
?>
