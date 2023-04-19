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

            <input type="number">
            <input type="submit" value="ZOBACZ" class="pr1">
        
        </form>
        <hr>
        <?php
             $con = new mysqli('127.0.0.1','root','','dane4');
             $sql= "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie,nazwa FROM osoby JOIN hobby ON osoby.Hobby_id=hobby.id";
             $res =$con->query($sql);
             $rows = $res->fetch_all(MYSQLI_ASSOC);
             print_r($rows)

             $numer = 0;
             if(isset($_POST["numer"])){
                $numer = $_POST["numer"]-2;
                echo "<h2>".$rows[$numer['id']].".".$rows[$numer]["imie"]." ".$rows[$numer]
             }
        ?>
        

    </div>

    <div class="s1">

        <p>Stronę wykonał: 00000000000</p>

    </div>
    
</body>
</html>