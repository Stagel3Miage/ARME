<?php
require_once("includes/db_connection.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("includes/session.php");

if(isset($_POST['submit']))
{

    $output = '';
    $sexe = $_POST["sexe"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp1"];

    $required_fields = array("sexe","nom","prenom","email","mdp1");
    validate_presences($required_fields);

    $fields_with_max_lengths=array("nom"=>30, "prenom"=>30, "email"=>30);
    validate_max_lengths($fields_with_max_lengths);

    if (!empty($errors)) {
      echo 'erreur champs';
      //redirect_to("index.php");

    }

    $query = "INSERT INTO utilisateur( ";
    $query .= " NOM_U, PRENOM_U, MAIL_U, SEXE_U, MDP_U ";
    $query .= " ) VALUES(";
    $query .= "  '{$nom}', '{$prenom}', '{$email}', '{$sexe}', '{$mdp}' ";
    $query .= ")";
    echo $query;
    $result = mysqli_query($connect, $query);
    echo '</br>';
    if($result)
    {
        $_SESSION["message"]="Subject created";
       $output .= '<label class="text-success">Membre crée</label>';
           echo $output;

    }
    else {
       $output .= 'erreur création membre dans la bdd';
           echo $output;
           //redirect_to("index.php");
    }
    //echo $output;
}
else {
  echo "erreur ";
  //redirect_to("index.php");
}


?>
