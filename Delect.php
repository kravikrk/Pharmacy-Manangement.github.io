<?php 

session_start();
var_dump($_SESSION);

include "db_conn.php"; 

if (isset($_GET['ID'])) {

    $user_id = $_GET['ID'];

    $sql = "DELETE FROM 'users' WHERE 'ID'='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("Location:Readview.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}
