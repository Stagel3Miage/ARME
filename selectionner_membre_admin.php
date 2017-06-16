<?php
 require_once("./db_connection.php");  //$connect = mysqli_connect("localhost", "root", "toor", "testing");
//selectionner_membre_admin.php
if(isset($_POST["employee_id"]))
{
 $output = '';

 $query = "SELECT * FROM utilisateur WHERE IDU = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>
            <td width="30%"><label>Nom</label></td>
            <td width="70%">'.$row["nom"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Prenom</label></td>
            <td width="70%">'.$row["prenom"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Sexe</label></td>
            <td width="70%">'.$row["sexe"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Email</label></td>
            <td width="70%">'.$row["email"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Mot de passe</label></td>
            <td width="70%">'.$row["mdp"].'</td>
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
