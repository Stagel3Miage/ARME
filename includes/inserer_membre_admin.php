<?php
//inserer_membre_admin.php
//includes
require_once("./db_connection.php");  //$connect = mysqli_connect("localhost", "root", "toor", "testing");

if(!empty($_POST))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $address = mysqli_real_escape_string($connect, $_POST["address"]);
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
    $designation = mysqli_real_escape_string($connect, $_POST["designation"]);
    $age = mysqli_real_escape_string($connect, $_POST["age"]);
    $query = "
    INSERT INTO tbl_employee(name, address, gender, designation, age)
     VALUES('$name', '$address', '$gender', '$designation', '$age')
    ";
    if(mysqli_query($connect, $query))
    {
       $output .= '<label class="text-success">Membre crée</label>';
       $select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";
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
