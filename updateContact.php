<?php
include "config.php";

if(isset($_POST["but_Change"])) {

    $id=$_POST['chngID'];
    $Name=$_POST['fname'];
    $LastName=$_POST['lname'];
    $Company=$_POST['company'];
    $eMail=$_POST['e-mail'];
    $telNumber=$_POST['telephone'];

    $sql_query="UPDATE kontakt
    SET Meno='$Name', Priezvisko='$LastName',Firma='$Company',e_Mail='$eMail',Tel_cislo='$telNumber'
    WHERE id_contact='$id'";

    if(mysqli_query($con,$sql_query)) {
        header('Location: index.php');
    }else{
        echo "Doslo ku chybe";
    }
}else{
    echo "Doslo ku chybe";
}
?>