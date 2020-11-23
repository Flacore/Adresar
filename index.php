<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>eshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="design.css">
</head>
<body>

    <div class="container">

        <div class="menu">
        <h2 class="text-center">Kontakty</h2>
            <div class="col-sm-12 text-center"><a href="#"  id="addItem"><span class="glyphicon glyphicon-saved"></span>Pridaj záznam</a></div>
            <hr>
        </div>

        <div id="addList">

        </div>

        <div id="list">
            <div id="headline">
                <hr>
                    <div class="row contactItem">
                        <div class="col-sm-2 text-center">
                            <h4>Číslo</h4>
                        </div>
                        <div class="col-sm-2 text-center">
                            <h4>Meno</h4>
                        </div>
                        <div class="col-sm-2 text-center">
                            <h4>Priezvisko</h4>
                        </div>
                        <div class="col-sm-2 text-center">
                            <h4>Firma</h4>
                        </div>
                        <div class="col-sm-2 text-center">
                            <h4>e-mail</h4>
                        </div>
                        <div class="col-sm-2 text-center">
                            <h4>Tel. číslo</h4>
                        </div>
                    </div>
                <hr>
            </div>

            <div id="items">
                <?php
                $sql = mysqli_query($con, "SELECT * FROM kontakt ");
                $i = 0;
                $data=[];
                while ($row = $sql->fetch_assoc()){
                    $data[$i]=$row;
                    ++$i;
                }
                if($i>=1) {
                    for ($tmp = 0; $tmp < $i; $tmp++) {
                        $row = $data[$tmp];
                        echo
                        " <div>
                            <div class=\"row\">
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['id_contact']."</h5>
                                </div>
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['Meno']."</h5>
                                </div>
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['Priezvisko']."</h5>
                                </div>
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['Firma']."</h5>
                                </div>
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['e-Mail']."</h5>
                                </div>
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$row['Tel_cislo']."</h5>
                                </div>
                            </div>
                            <hr>
                        </div>"
                        ;
                    }
                }
                if($i==0){
                    echo "<H1 style='color: red'>Neexistuje ziadni kontakt</H1>";
                }
                ?>
            </div>
        </div>

    </div>
</body>
</html>

