<?php

//selectionner_membre_admin.php
if(isset($_POST["employee_id"]))
{
 $output = '';
 require_once("./db_connection.php");  //$connect = mysqli_connect("localhost", "root", "toor", "testing");
 $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '
      <div class="table-responsive">
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>
            <td width="30%"><label>Nom</label></td>
            <td width="70%">'.$row["name"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Adresse</label></td>
            <td width="70%">'.$row["address"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Sexe</label></td>
            <td width="70%">'.$row["gender"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Email</label></td>
            <td width="70%">'.$row["designation"].'</td>
        </tr>
        <tr>
            <td width="30%"><label>Mot de passe</label></td>
            <td width="70%">'.$row["age"].'</td>
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
