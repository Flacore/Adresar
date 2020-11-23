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
                    <div class="col-sm-6 text-left"><input type="text" id="fname" name="fname" required pattern="[A-Za-z]{1}[a-z]{1,}"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj priezvisko:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="lname" name="lname" pattern="[A-Za-z]{1}[a-z]{1,}"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj názov firmy:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="company" name="company"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj e-mail:</h5></div>
                    <div class="col-sm-6 text-left"><input type="email" id="e-mail" name="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" ></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 text-right"><h5>Zadaj tel. číslo:</h5></div>
                    <div class="col-sm-6 text-left"><input type="text" id="telephone" name="telephone" pattern="[-0]{1}[-9]{1}[0-9]{8}|[-+]{1}[0-9]{12}" required></div>
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
                            <h4>Poradové číslo</h4>
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
                $j = 0;
                $data=[];
                while ($row = $sql->fetch_assoc()){
                    $data[$j]=$row;
                    ++$j;
                }
                if($j>=1) {
                    for ($i = 0; $i < $j; $i++) {
                        $n=$i+1;
                        $row = $data[$i];
                        echo
                        " <div>
                            <div class=\"row\">
                                <div class=\"col-sm-2 text-center\">
                                    <h5>".$n."</h5>
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
                            <div class=\'row\'>
                                <div class=\"row col-sm-6 text-center\" ><input onclick='makeChange(\"itemChange".$i."\")' type='submit' value=\"Uprav\" name=\"but_cahnge\" id=\"but_change\"></div>
                                </div>
                                <form method=\"post\" action=\"deleteContact.php\">
                                    <input id=\"delID\" name=\"delID\" value=\"".$row['id_contact']."\" style='display: none' >
                                    <div class=\"row col-sm-6 text-center\"><input type=\"submit\" value=\"Odstraň\" name=\"but_delete\" id=\"but_delete\"></div>
                                </form>
                            </div>
                            <div class='row' id='itemChange".$i."' style='display: none'>
                                <hr style='width: 80%'>
                                <form method=\"post\" action=\"updateContact.php\">
                                     <input id=\"chngID\" name=\"chngID\" value=\"".$row['id_contact']."\" style='display: none' >
                                     <div class=\"col-sm-2 text-center\"><input type=\"text\" id=\"fname\" name=\"fname\" required value='".$row['Meno']."' pattern=\"[A-Za-z]{1}[a-z]{1,}\"></div>
                                     <div class=\"col-sm-2 text-center\"><input type=\"text\" id=\"lname\" name=\"lname\" value='".$row['Priezvisko']."' pattern=\"[A-Za-z]{1}[a-z]{1,}\"></div>
                                     <div class=\"col-sm-2 text-center\"><input type=\"text\" id=\"company\" name=\"company\" value='".$row['Firma']."'></div>
                                     <div class=\"col-sm-2 text-center\"><input type=\"email\" id=\"e-mail\" name=\"e-mail\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$\" value='".$row['e_Mail']."' ></div>
                                     <div class=\"col-sm-2 text-center\"><input type=\"text\" id=\"telephone\" name=\"telephone\" pattern=\"[-0]{1}[-9]{1}[0-9]{8}|[-+]{1}[0-9]{12}\" required value='".$row['Tel_cislo']."'></div>
                                     <div class=\"col-sm-2 text-center\"><input type=\"submit\" value=\"Vykonaj\" name=\"but_Change\" id=\"but_change\"></div>
                                </form>
                             </div>
                            <br><hr>
                        </div>"
                        ;
                    }
                }
                if($i==0){
                    echo "<H1 class='text-center' style='color: red'>Neexistuje žiadny kontakt</H1>";
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

    function makeChange($name) {
        if(document.getElementById($name).style.display == "inline"){
            document.getElementById($name).style.display = 'none';
        }else{
            document.getElementById($name).style.display = 'inline';
        }
    }
</script>

