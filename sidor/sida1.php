<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="sida1.css">
</head>

<body>

    <div id="meny">
        <div class="link">
            <a href="#" class="button block black">Hem</a>
        </div>
        <div class="link">
            <a href="#om" class="button block black">Om Oss</a>
        </div>
        <div class="link">
            <a href="#menu" class="button block black">Meny</a>
        </div>
        <div class="link">
            <a href="#sigge" class="button block black">Bokning</a>
        </div>
    </div>

    <div class="parallax">
        <h1 id="welcome">Välkommen till Dawei</h1>
    </div>

    <div class="content">
        <div id="background"></div>
        <div id="about">
            <h1 id="om">Om Oss</h1>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lol eksde.
        </div>
        <div id="menu">
            <h1 id="jao">Meny</h1>
            <br>
            <?php
                $dbc = mysqli_connect("localhost","root","","dawei");
                mysqli_query($dbc,"SET NAMES UTF8");
                $query = "SELECT * FROM dishes";
                $result = mysqli_query($dbc,$query);
                while($row = mysqli_fetch_array($result)){
            ?>
                <?php echo $row['dishes_id']; ?>.


                <?php echo $row['dishes_name']; ?>
                <br>

                <?php echo $row['dishes_description']; ?>

                <br>
                <?php echo $row['dishes_price']; ?> KR
                <br>
                <?php echo $row['dishes_vegan']; ?>
                <br>
                <?php 
                for($i = 0 ; $i < $row['dishes_hot'] ; $i++){        
                    ?>
                <img src="../bilder/chili.png" width="45px" />
                <?php
                     
                }
            
            ?>
                    <br>
                    <br>
                    <?php } ?>
        </div>
        <div class="boka">
            <h1 id="sigge">Boka bord</h1>
            <?php
            $dbc = mysqli_connect("localhost","root","","dawei"); 
            
            if (isset($_POST['namn']) && (isset ($_POST['date'])) && (isset($_POST['time'])) && isset($_POST['persons'])){ 
            $antal = $_POST ['persons']; 
            
            $query = "SELCET * FROM bord WHERE bord_platser > $antal"; 
            
            $result = mysqli_query($dbc,$query);
            
            if ($table = mysqli_fetch_array($result)){ 
            $namn = $_POST['namn']; 
            $tid = $_POST['time']; 
            $datum = $_POST['date']; 
            $extra = $_POST['extra']; 
            $table_id = $table['id'];   
            
            $query = "INSERT INTO bokning (boking_namn,bokning_datum,bokning_tid,bokning_bord,bokning_antal,bokning_extra) VALUES ('$namn', '$datum','$tid',$table_id,$antal,'$extra');"; } else{ echo "inga bord lediga"; } } ?>
                <form method="POST" action="">
                    <div class="sosse">
                        Namn:
                        <br>
                        <input type="text" name="name">
                    </div>
                    <br>
                    <div class="sosse">
                        Datum:
                        <br>
                        <input type="date" name="date">
                    </div>
                    <br>
                    <div class="sosse">
                        Tid:
                        <br>
                        <input type="time" name="time">
                    </div>
                    <br>
                    <div class="sosse">
                        Antal personer:
                        <br>
                        <input type="number" name="persons">
                    </div>
                    <br>
                    <div class="sosse">
                        extra:
                        <br>
                        <input type="text" name="text">
                        <input type="submit" />
                    </div>
                    <br>
                    <br>
                </form>
        </div>

        <footer id="footer">

        </footer>

    </div>

</body>

</html>
