<?php 
    function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit;
    }

    function mysql_prep($string) {
        global $connection;
        $escaped_string= mysqli_real_escape_string($connection, $string);
        return $escaped_string;
    }
    
    

    function find_all_subjects() {
        global $connection;
        $query  = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "ORDER BY position ASC";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        return $subject_set;
    }

    function find_pages_for_subjects($subject_id) {
        global $connection;
        $safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE visible = 1 ";
        $query .= "AND subject_id={$safe_subject_id} ";
        $query .= "ORDER BY position ASC";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        return $page_set;
    }

    function find_subject_by_id($subject_id){
        global $connection;
        $safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
        $query  = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE id = {$safe_subject_id} ";
        $query .= "LIMIT 1";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        if ($subject=mysqli_fetch_assoc($subject_set))
            return $subject;
        else 
            return null;
    }

    function find_page_by_id($page_id){
        global $connection;
        $safe_page_id=mysqli_real_escape_string($connection,$page_id);
        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE id = {$safe_page_id} ";
        $query .= "LIMIT 1";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        if ($page=mysqli_fetch_assoc($page_set))
            return $page;
        else 
            return null;
    }

    /* 
    function find_element_by_id($subject_id, $page_or_subject){
        global $connection;
        $safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
        $query  = "SELECT * ";
        
        if ($page_or_subject==TRUE)
            $query .= "FROM subjects ";
        else
            $query .= "FROM pages ";
        
        $query .= "WHERE id = {$safe_subject_id} ";
        $query .= "LIMIT 1";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        if ($subject=mysqli_fetch_assoc($subject_set))
            return $subject;
        else 
            return null;
    }
    */

    function find_selected_page() {
        global $current_subject;
        global $current_page;

        // figure out what page is set
        if (isset($_GET["subject"])){
             $current_subject=find_subject_by_id($_GET["subject"]); 
             $current_page=null;
            
        }elseif (isset($_GET["page"])) {
            $current_subject=null;
            $current_page=find_page_by_id($_GET["page"]);
        } else {
            $current_subject=null;
            $current_page=null;
        }

    }

    function navigation($subject_array, $page_array) { 
        //assignement 1 modification 
        //global $subject_id;
       //global $page_id;
        // end assignement 1
        $output = "<ul class=\"subjects\">";
        $subject_set=find_all_subjects();
            
        while($subject = mysqli_fetch_assoc($subject_set)) {
            $output.= "<li"; 
                    if ($subject_array && $subject["id"]==$subject_array["id"]) {                                                    
                        $output.=" class=\"selected\"";
                    }                             
                        $output.= ">";
                    
                        $output.="<a href=\"manage_content.php?subject=";
                        $output.= urlencode($subject["id"]); 
                        $output.="\">";
                        $output.= htmlentities($subject["menu_name"]);
                        $output.= "</a>";
                        $page_set=find_pages_for_subjects($subject["id"]);
                        //$subject_id=$subject["id"];
                        $output.="<ul class=\"pages\">";
                        while ($page= mysqli_fetch_assoc($page_set)) {
                            
                              $output.= "<li"; 
                              if ($page_array && $page["id"]==$page_array["id"]) {                                                    
                                $output.= " class=\"selected\"";
                              }                             
                              $output.= ">";
                            
                              $output.="<a href=\"manage_content.php?page=";
                              $output.= urlencode($page["id"]);
                              $output.="\">"; 
                              $output.= htmlentities($page["menu_name"]);
                              $output.= "</a>";
                              $output.="</li>";
                              //$page_id = $page["id"];
                        } 
                        mysqli_free_result($page_set);                                                                     
                            
                        $output.="</ul>";
                        $output.= "</li>";
            } 
                mysqli_free_result($subject_set);
            
		$output.="</ul>";

        return $output;
    }

    function confirm_query($result_set){
        // Test if there was a query error
        if (!$result_set) {
            die("Database query failed.");
        }
    }

    function form_errors($errors=array()) {
        $output = "";
        if (!empty($errors)) {
            /** see CSS of errors */
          $output .= "<div class=\"error\">";
          $output .= "Please fix the following errors:";
          $output .= "<ul>";
          foreach ($errors as $key => $error) {
            $output .= "<li>" . htmlentities($error) . "</li>";
          }
          $output .= "</ul>";
          $output .= "</div>";
        }
        return $output;
    }

    /** Assignement 1 **/

    function find_all_pages_for_subjects($subject_id) {
            global $connection;
            $safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
            $query  = "SELECT * ";
            $query .= "FROM pages ";
            $query .= "WHERE /*visible = 1*/ ";
            $query .= "/*AND*/ subject_id={$safe_subject_id} ";
            $query .= "ORDER BY position ASC";
            $page_set = mysqli_query($connection, $query);
            confirm_query($page_set);
            return $page_set;
        }


    function display_pagelist($subject_id) {
        $page_set=find_all_pages_for_subjects($subject_id);
        $output="<ul>";
        while ($page = mysqli_fetch_assoc($page_set)) {
            $output .= "<li>" ; 
            $output .= htmlentities($page["menu_name"]);
            $output .= "<a href=\"edit_page.php?subject=";
            $output .= urlencode($subject_id);
            $output .= "&page=";
            $output .= urlencode($page["id"]);
            $output .= "\">";
            $output .= " [Edit]";
            $output .= "</a>";
            $output .="</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    /*function find_subject_id_for_given_page($page_id, $page_name="", $page_position, $page_content="") {
            global $connection;
            $safe_page_id=mysqli_real_escape_string($connection,$page_id);
            $safe_page_name=mysqli_real_escape_string($connection,$page_name);
            $safe_page_content=mysqli_real_escape_string($connection,$page_content);

            $query = "UPDATE pages SET";
            $query .= "WHERE id={$safe_page_id} ";
            $query .= "AND position = {$page_position} ";
            if (!empty($safe_page_name)) {
                $query .= "AND menu_name LIKE '{$safe_page_name}' ";
            }
            if (!empty($page_content)){
                $query .= "AND content LIKE '{$safe_page_content}' ";
            }
            $query .= "LIMIT 1";
            $page_set = mysqli_query($connection, $query);
            //echo "<br/> query: {$query} <br/>";
            confirm_query($page_set);
            $subject_id=mysqli_fetch_assoc($page_set);
            // we know that we return only one element
            return $subject_id["subject_id"];
        }*/
    function find_subject_id_for_given_page($page_id, $page_name="", $page_position, $page_content="") {
            global $connection;
            $safe_page_id=mysqli_real_escape_string($connection,$page_id);
            $safe_page_name=mysqli_real_escape_string($connection,$page_name);
            $safe_page_content=mysqli_real_escape_string($connection,$page_content);

            $query  = "SELECT subject_id ";
            $query .= "FROM pages ";
            $query .= "WHERE id={$safe_page_id} ";
            $query .= "AND position = {$page_position} ";
            if (!empty($safe_page_name)) {
                $query .= "AND menu_name LIKE '{$safe_page_name}' ";
            }
            if (!empty($page_content)){
                $query .= "AND content LIKE '{$safe_page_content}' ";
            }
            $query .= "LIMIT 1";
            $page_set = mysqli_query($connection, $query);
            //echo "<br/> query: {$query} <br/>";
            confirm_query($page_set);
            $subject_id=mysqli_fetch_assoc($page_set);
            // we know that we return only one element
            return $subject_id;//["subject_id"];
        }

    function delete_page($page_id, $subject_id){    
        global $connection;
        // manage if current subject is missing or could not be found in the DB
        if ((!$subject_id)&&(!$page_id)) {
            $_SESSION["message"]="Page not found";
            redirect_to("manage_content.php");
        }else{ 
            $query= "DELETE FROM pages WHERE id={$page_id} AND subject_id={$subject_id} LIMIT 1;";

            $result=mysqli_query($connection, $query);

            if ($result && mysqli_affected_rows($connection)==1) {
                $_SESSION["message"]="Page deleted" ;
                redirect_to("manage_content.php?subject={$subject_id}");
            } else {
                $_SESSION["message"]="Page deletion failed" ;
                redirect_to("manage_content.php?subject={$subject_id}& page={$page_id}");
            }
        }
    }
    // same as find_subject_id_for_given_page but with SQL command UPDATE 
    function update_page($page_id, $subject_id,$page_name, $page_position, $visible, $page_content) {
            global $connection;
            if ((!$subject_id)&&(!$page_id)) {
                $_SESSION["message"]="Page not found";
                redirect_to("manage_content.php");
            }else{ }

            $query  = "SELECT subject_id ";
            $query .= "FROM pages ";
            $query .= "WHERE id={$safe_page_id} ";
            $query .= "AND position = {$page_position} ";
            if (!empty($safe_page_name)) {
                $query .= "AND menu_name LIKE '{$safe_page_name}' ";
            }
            if (!empty($page_content)){
                $query .= "AND content LIKE '{$safe_page_content}' ";
            }
            $query .= "LIMIT 1";
            $page_set = mysqli_query($connection, $query);
            //echo "<br/> query: {$query} <br/>";
            confirm_query($page_set);
            $subject_id=mysqli_fetch_assoc($page_set);
            // we know that we return only one element
            return $subject_id["subject_id"];
        }
    function find_page_by_id_and_subject_id($page_id, $subject_id){    
        global $connection;
        // manage if current subject is missing or could not be found in the DB
               global $connection;
        $safe_page_id=mysqli_real_escape_string($connection,$page_id);
        $safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE id = {$safe_page_id} AND subject_id={$safe_subject_id} ";
        $query .= "LIMIT 1";
        //echo $query;
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        if ($subject=mysqli_fetch_assoc($subject_set))
            return $subject;
        else 
            return null;
    }
?>