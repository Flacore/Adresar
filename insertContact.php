<?php
include "config.php";

if(isset($_POST["but_add"])) {
    $sql = mysqli_query($con, "SELECT * FROM kontakt ");
    $ID = 0;
    while ($row = $sql->fetch_assoc()){
        ++$ID;
    }

    $id=($ID)+1;
    $Name=$_POST['fname'];
    $LastName=$_POST['lname'];
    $Company=$_POST['company'];
    $eMail=$_POST['e-mail'];
    $telNumber=$_POST['telephone'];

    $sql_query="INSERT INTO kontakt (id_contact, Meno, Priezvisko, Firma, e_Mail, Tel_cislo)
    VALUES ('$id','$Name','$LastName','$Company','$eMail','$telNumber')";

    if(mysqli_query($con,$sql_query)) {
        header('Location: index.php');
    }else{
        echo "Doslo ku chybe";
    }
}else{
    echo "Doslo ku chybe";
}
?>