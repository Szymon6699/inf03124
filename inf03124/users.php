<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>

    <div class="b1">

        <h3>Portal Społecznościowy - panel administratora</h3>

    </div>

    <div class="bl1">

        <h4>Użytkownicy</h4> 
        <?php
            $con = new mysqli('127.0.0.1','root','','dane4');
            $sql= "SELECT id,imie,nazwisko,rok_urodzenia,zdjecie FROM osoby LIMIT 30";
            $res =$con->query($sql);
            $rows = $res->fetch_all(MYSQLI_ASSOC);

            $i=0;
            while($i < count($rows)){
                $rok = 2021-$rows[$i]["rok_urodzenia"];
                echo"".$rows[$i]["id"].".".$rows[$i]["imie"]." ".$rows[$i]["nazwisko"].",".$rok."lat<br>";
                $i++;
            }
            $con->close();
        ?>

        <a href="settings.html">Inne ustawienia</a>


    </div>

    <div class="bp1">

        <h4>Podaj id użytkownika</h4>

        <form method="post">

            <input type="number" name="numer">
            <input type="submit" value="ZOBACZ" class="pr1">
        
        </form>
        <hr>
        <?php
             if(isset($_POST["numer"])){
             $con = new mysqli('127.0.0.1','root','','dane4');
             $sql= "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie,nazwa,osoby.id FROM osoby JOIN hobby ON hobby.id=osoby.Hobby_id WHERE osoby.id=".$_POST["numer"];
             $res =$con->query($sql);
            //  $rows = $res->fetch_all(MYSQLI_ASSOC);
             $row = $res->fetch_assoc();
            //  print_r($row);

            //  $numer = 0;
            //     $numer = $_POST["numer"];
                echo "<h2>".$row["id"]." ".$row["imie"]." ".$row["nazwisko"]."</h2>";
                echo "<img src=".$row["zdjecie"]."><br>";
                echo "<p>Rok urodzenia: ".$row["rok_urodzenia"]."</p>";
                echo "<p>opis:  ".$row["opis"]."</p>";
                echo "<p>hobby: ".$row["nazwa"]."</p>";
             }

        ?>
        

    </div>

    <div class="s1">

        <p>Stronę wykonał: 00000000000</p>

    </div>
    
</body>
</html>

<!-- osoby.Hobby_id=hobby.id -->
<!-- .$rows[$numer]["zdjecie"]."".$rows[$numer]["rok_urodzenia"]; -->