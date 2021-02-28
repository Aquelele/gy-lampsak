<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" > 
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="knapp.css">
	
    <script src="script.js"></script>
    
    <?php
         
        function turnon() {
            echo "på";
            echo shell_exec('sudo python3 /var/www/html/on.py');
        }
        function turnoff() {
            echo "av";
            echo shell_exec('sudo python3 /var/www/html/off.py');
        }
            
        if(isset($_POST['st']) && isset($_POST['sl'])){
            $myfile = fopen("times.txt", "w") or die("Unable to open file!");
            $start = $_POST['st'];
            fwrite($myfile, $start);
            $slut = $_POST['sl'];
            fwrite($myfile, $slut);
            fclose($myfile);
            if(strlen($myfile)!=10){
                $myfile = fopen("times.txt", "w") or die("Unable to open file!");
                fclose($myfile);
            }
        }
        if(isset($_POST['bort'])){
            $myfile = fopen("times.txt", "w") or die("Unable to open file!");
            fclose($myfile);
        }

        if(isset($_POST['på'])) { 
            turnon();
            
            echo '<style>#på{visibility: hidden !important;}</style>';

        }   
        
        if(isset($_POST['av'])) { 
            turnoff();
            echo '<style>#av{visibility: hidden !important;}</style>';
     
        }
        elseif(isset($_POST['på'])==false && isset($_POST['av'])==false){
            echo '<style>#av{visibility: hidden !important;}</style>';
        }
    
    ?>
    <body>
        <header>
            <img class="logo" src="../Hemsida_switch/bilder/icon.png" alt="icon">
        </header>

        <form method="post">
            <input id="på" type="submit" name="på" value="På"/> 
            <input id="av" type="submit" name="av" value="Av"/> 
        </form>

        
        
    
        <form method="post">
            <br><h4>Timer:</h4>

            <?php
                $file = fopen("times.txt", "r");
                
                $times = fread($file,"10");
                fclose($file);
                
                $start = substr($times, 0, 5);
                $stop = substr($times, 5, 10);

                
                echo "Start $start. Stop $stop ";
            ?>

            <label for="st">Starttid:</label><br>
            <input id="st" type="text" name="st" value="hh:mm"/><br>
            <label for="sl">Sluttid:</label><br>
            <input id="sl" type="text" name="sl" value="hh:mm"/><br>

            <input id="ts" type="submit" value="Sett"/> 
        </form>

        <form method="post">

            <br><label for="bort">Tabort timer:</label><br>

            <input id="bort" type="submit" name="bort" value="Bort"/> 
        </form>
    </body>