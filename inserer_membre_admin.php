<?php
//includes
require_once("./db_connection.php");

if(!empty($_POST))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $address = mysqli_real_escape_string($connect, $_POST["address"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
    $designation = mysqli_real_escape_string($connect, $_POST["designation"]);
    $age = mysqli_real_escape_string($connect, $_POST["age"]);

    $sexe = $_POST["sexe"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp1"];

    $query = "INSERT INTO utilisateur( ";
    $query .= " NOM_U, PRENOM_U, MAIL_U, SEXE_U, MDP_U ";
    $query .= " ) VALUES(";
    $query .= "  '{$nom}', '{$prenom}', '{$email}', '{$sexe}', '{$mdp}' ";
    $query .= ")";

    if(mysqli_query($connect, $query))
    {
       $output .= '<label class="text-success">Membre crée</label>';
       $select_query = "SELECT * FROM utilisateur ORDER BY id DESC";
       $result = mysqli_query($connect, $select_query);
       $output .= '
        <table class="table table-bordered">
                      <tr>
                           <th width="70%">Liste des membres</th>
                           <th width="30%">Voir</th>
                      </tr>

       ';
       while($row = mysqli_fetch_array($result))
       {
        $output .= '
         <tr>
                           <td>' . $row["name"] . '</td>
                           <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
                      </tr>
        ';
       }
       $output .= '</table>';
    }
    echo $output;
}
?>
