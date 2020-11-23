<?php
include "config.php";

if(isset($_POST["but_delete"])) {

    $id=$_POST['delID'];

    $sql_query="DELETE FROM kontakt WHERE id_contact = $id";

    if(mysqli_query($con,$sql_query)) {
        header('Location: index.php');
    }else{
        echo "Doslo ku chybe";
    }
}else{
    echo "Doslo ku chybe";
}
?>

$row['id_contact'].
