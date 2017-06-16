<?php
//gerer_membre_admin.php

//includes
require_once("./includes/headers.php");
require_once("./includes/db_connection.php");

$query = "SELECT * FROM utilisateur ORDER BY id DESC";
$result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE html>
<html>
     <head>
        <title>Détails membres</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </head>
     <body>
          <br /><br />
          <div class="container" style="width:700px;">
               <h3 align="center">Les membres</h3><br />
               <div class="table-responsive">
                  <!-- boutton ajouter -->
                  <div align="right">
                   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Ajouter</button>
                  </div>
                  <br />
                  <!-- table employees -->
                  <div id="utilisateur_table">
                   <table class="table table-bordered">
                     <!-- header du tableau -->
                    <tr>
                     <th width="70%">Liste des membres</th>
                     <th width="30%">Voir</th>
                    </tr>
                      <!-- fin header du tableau -->
                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                     <td><?php echo $row["nom"]; ?></td>
                     <td><input type="button" name="view" value="voir" id="<?php echo $row["IDU"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                    </tr>
                    <?php
                    }
                    ?>
                   </table>
                 </div> <!-- fin table employee -->

               </div>
          </div>
     </body>
</html>

<!-- modal création d'un membre -->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Création d'un membre</h4>
   </div>
   <!-- le formulaire création membre -->
   <div class="modal-body">
        <form method="post" id="insert_form">
              <!-- demande nom -->
             <label>Nom</label>
             <input type="text" name="name" id="name" class="form-control" />
             <br />
             <!-- demande adresse -->
             <label>Adresse</label>
             <textarea name="address" id="address" class="form-control"></textarea>
             <br />
             <!-- demande sexe -->
             <label>Sexe</label>
             <select name="gender" id="gender" class="form-control">
              <option value="Male">Femme</option>
              <option value="Female">Homme</option>
             </select>
             <br />
             <!-- demande mail -->
             <label>Email</label>
             <input type="text" name="designation" id="designation" class="form-control" />
             <br />
             <!-- demande mdp -->
             <label>Mot de passe</label>
             <input type="text" name="age" id="age" class="form-control" />
             <br />
             <!-- boutton créer -->
             <input type="submit" name="insert" id="insert" value="Créer" class="btn btn-success" />
        </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
   </div>
  </div>
 </div>
</div>
<!-- fin modal création d'un membre -->

<!-- modal afficher détails sur les membres -->
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Détails sur le membre</h4>
   </div>
   <div class="modal-body" id="employee_detail">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
   </div>
  </div>
 </div>
</div>
<!-- fin modal afficher détails sur les membres -->
