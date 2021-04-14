<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8" > 
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="knapp.css">
	
    
    <?php
         
        function turnon() {
            echo shell_exec('sudo python3 /var/www/html/on.py');    //kör en pythonfil som sätter på relät
        }
        function turnoff() {
            echo shell_exec('sudo python3 /var/www/html/off.py');   //kör en pythonfil som stänger av relät
        }
            
        if(isset($_POST['st']) && isset($_POST['sl'])){
            $start = $_POST['st'];
            $slut = $_POST['sl'];   //skaffar start och slutid från formen längre ner
            $start = ($start[0] . $start[1] . $start[3] . $start[4]);   //tar bort kolonent mellan timmar och minuter
            $slut = ($slut[0] . $slut[1] . $slut[3] . $slut[4]);        //tar bort kolonent mellan timmar och minuter
            if(($start[0].$start[1]>23) || ($start[2].$start[3]>59) || ($slut[0].$slut[1]>23) || ($slut[2].$slut[3]>59)){   //kollar om tiden är en orimlig tid
                echo shell_exec("sudo python3 /var/www/html/updatetimer.py 0000 0000");     //om tiden är orimlig så körs programet updatetiemer.py med argumenten 0000 0000 vilket kommer att göra så att timern stängs av
            } elseif($start != $slut){      //om startiden inte är likadna som sluttiden så skommer tiden skrivas i textfilen med samma metod som åvan
                echo shell_exec("sudo python3 /var/www/html/updatetimer.py $start $slut");
            }
        }

        if(isset($_POST['bort'])){
            echo shell_exec("sudo python3 /var/www/html/updatetimer.py 0000 0000");     //om någon har tryckt på bort knappen så kommer textfilen inehålla 00000000 vilket stänger av timern
        }

        if(isset($_POST['på'])) { 
            turnon();
            
            echo '<style>#på{visibility: hidden !important;}</style>';
            //när på knappen trycks på så gömms den och funktionen turnon körs
        }   
        
        if(isset($_POST['av'])) { 
            turnoff();
            echo '<style>#av{visibility: hidden !important;}</style>';
            //när av knappen trycks på så gömms den och funktionen tunroff körs
        }
        elseif(isset($_POST['på'])==false && isset($_POST['av'])==false){
            echo '<style>#av{visibility: hidden !important;}</style>';  //om varken on eller off är tryckt på så visas vara on knappen
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

                            echo substr($times, 0, 2) . ":" . substr($times, 2, 2); //gör så att placeholdern för starttiden är det som redan står i dokumentet och med rätt "syntax" altså kolonet
                        ?>"/><br>
                        <label for="sl">Sluttid:</label><br>
                        <input id="sl" type="text" name="sl" placeholder="<?php
                            $file = fopen("test.txt", "r");
                        
                            $times = fread($file,"8");                    
                            fclose($file);

                            echo substr($times, 4, 2) . ":" . substr($times, 6, 2); //gör så att placeholdern för sluttiden är det som redan står i dokumentet och med rätt "syntax" altså kolonet
                        ?>"/><br>

                        <input id="ts" type="submit" value="Sett"/> 
                    </form>
                </div>
            </div>

            <div class="rut">
                <div class="iexi">
                    <?php   //kollar om det finns en timer som redan är satt och om det stämmer så printas den ut annars så upmanas användaren att sätta en timer
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