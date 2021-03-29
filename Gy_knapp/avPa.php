<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" > 
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="knapp.css">
	
    <script src="script.js"></script>
    
    <?php
         
        function turnon() {
            //echo "på";
            echo shell_exec('sudo python3 /var/www/html/on.py');
        }
        function turnoff() {
            //echo "av";
            echo shell_exec('sudo python3 /var/www/html/off.py');
        }
            
        if(isset($_POST['st']) && isset($_POST['sl'])){
            $start = $_POST['st'];
            $slut = $_POST['sl'];
            $start = ($start[0] . $start[1] . $start[3] . $start[4]);
            $slut = ($slut[0] . $slut[1] . $slut[3] . $slut[4]);
            if(($start[0].$start[1]>23) || ($start[2].$start[3]>59) || ($slut[0].$slut[1]>23) || ($slut[2].$slut[3]>59)){
                echo shell_exec("sudo python3 /var/www/html/updatetimer.py 0000 0000");
            } elseif($start != $slut){
                echo shell_exec("sudo python3 /var/www/html/updatetimer.py $start $slut");
            }
        }

        if(isset($_POST['bort'])){
            echo shell_exec("sudo python3 /var/www/html/updatetimer.py 0000 0000");
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
            <img class="logo" src="icon.png" alt="icon">
        </header>
        <div class="knapploda">
            <div class="knapp">
                <form method="post">
                        <input id="på" type="submit" name="på" value="På"/> 
                        <input id="av" type="submit" name="av" value="Av"/> 
                </form>
            </div>
        </div>
        
        <div class="loda">
            <div class="rut">
                <div class="iTimer">
                    <form method="post">
                        <br><h4>Timer:</h4>

                        <label for="st">Starttid:</label><br>
                        <input id="st" type="text" name="st" placeholder="<?php
                            $file = fopen("test.txt", "r");
                        
                            $times = fread($file,"8");                    
                            fclose($file);

                            echo substr($times, 0, 2) . ":" . substr($times, 2, 2);
                        ?>"/><br>
                        <label for="sl">Sluttid:</label><br>
                        <input id="sl" type="text" name="sl" placeholder="<?php
                            $file = fopen("test.txt", "r");
                        
                            $times = fread($file,"8");                    
                            fclose($file);

                            echo substr($times, 4, 2) . ":" . substr($times, 6, 2);
                        ?>"/><br>

                        <input id="ts" type="submit" value="Sett"/> 
                    </form>
                </div>
            </div>

            <div class="rut">
                <div class="iexi">
                    <?php
                        $file = fopen("test.txt", "r");
                        
                        $times = fread($file,"10");                    
                        fclose($file);
                            
                        $start = substr($times, 0, 2) . ":" . substr($times, 2, 2);
                        $stop = substr($times, 4, 2) . ":" . substr($times, 6, 2);
                        if($start == $stop){
                            echo "Ingen timer är satt, sätt en vetja";
                        }
                        else{
                            echo "Nuvarande timer<br>Start $start Stop $stop<br>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
        <div class="timerBort">
            <div class="knapp">
                <form method="post">

                    <br><label for="bort">Tabort timer:</label>

                    <input id="bort" type="submit" name="bort" value="Bort"/> 
                </form>
            </div>
        </div>
    </body>