<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head onload="onLoad()">
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
            <div class="col-sm-12 text-center"><a onclick="onClickButton()"  id="addItem"><span class="glyphicon glyphicon-saved"></span>Pridaj záznam</a></div>
            <hr>
        </div>

        <div id="addList">
            <hr>
            <h3>Pridanie záznamu:</h3>
            <form  method="post" action="insertContact.php">
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj meno:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="fname" name="fname" required></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj priezvisko:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="lname" name="lname" ></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj názov firmy:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="company" name="company" ></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj e-mail:</h5></div>
                    <div class="col-sm-6 text-left"><input type="email" id="e-mail" name="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" ></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj tel. číslo:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="telephone" name="telephone" pattern="[0-9]{10}|[-+]{1}[0-9]{12}" required></div>
                </div>
                <div class="row col-sm-12 text-right"><input type="submit" value="Pridaj" name="but_add" id="but_add"></div>
            </form>
            <br><hr>
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
                                    <h5>".$row['e_Mail']."</h5>
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
<script>
    function onLoad() {
        document.getElementById('list').style.display = 'inline';
        document.getElementById('addList').style.display = 'none';
    }
    function onClickButton() {
        if(document.getElementById('list').style.display == "inline"){
            document.getElementById('list').style.display = 'none';
            document.getElementById('addList').style.display = 'inline';
        }else{
            document.getElementById('list').style.display = 'inline';
            document.getElementById('addList').style.display = 'none';
        }
    }
</script>

