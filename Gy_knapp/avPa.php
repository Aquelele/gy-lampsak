

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" > 
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="main.css">
	
    <script src="script.js"></script>
    
    <?php
        function turnon() {
            echo "på";
            system("gpio-g mode 24 out") ;
            system("gpio-g write 24 1") ;
        }
        
        function turnoff() {
            echo "av";
            system("gpio-g mode 24 out") ;
            system("gpio-g write 24 0") ;
        }
            
        if(isset($_POST['st']) && isset($_POST['sl'])){
            $myfile = fopen("times.txt", "w") or die("Unable to open file!");
            $start = $_POST['st'];
            fwrite($myfile, $start);
            $slut = $_POST['sl'];
            fwrite($myfile, $slut);
            fclose($myfile);
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

        /*if(isset($_COOKIE['intlysM']) || isset($_COOKIE['lysM']) || isset($_COOKIE['start']) && isset($_COOKIE['slut']) || isset($_POST['start']) && isset($_POST['slut'])){
            if(isset($_COOKIE['start']) && isset($_COOKIE['slut']) || isset($_POST['start']) && isset($_POST['slut'])){
                
                if(isset($_POST['start']) && isset($_POST['slut'])){
                    $st =$_POST['start'];
                    $sl = $_POST['slut'];

                    setcookie('start', "", time() - 3600);
                    setcookie('slut', "", time() - 3600);
                   
                    $start = intval(substr($st,-5,2))*60 + intval(substr($st,-2,2));
                    $slut = intval(substr($sl,-5,2))*60 + intval(substr($sl,-2,2));;

                    setcookie('start', $start, time() + (86400 * 7));
                    setcookie('slut', $slut, time() + (86400 * 7));  
                    
                }    
                    $tidH = intval(date("H"))*60;
                    $tidM = intval(date("i"));
                    $tid = $tidH + $tidM;

                        if($tid==$_COOKIE['start']){
                            turnon();
                        }

                        elseif($tid==$_COOKIE['slut']){
                            turnoff();
                        }
                if(isset($_COOKIE['lysM'])) { 
                            turnon();
                            
                            echo '<style>#på{visibility: hidden !important;}</style>';
                            setcookie('intlysM', "", time() - 3600); 
                }   
                if(isset($_COOKIE['intlysM'])) { 
                    turnoff();
                    echo '<style>#av{visibility: hidden !important;}</style>';
                    setcookie('lysM', "", time() - 3600); 
                    
                }
            }
            
        }
        
        */
        $file = fopen("times.txt", "r");
        $times = fread($file,"10");
        fclose($file);
        $start = substr($times, 0, 5);
        $stop = substr($times, 5, 10);

        echo "Start $start. Stop $stop";
    ?>
    


</head>
<body>

  
    <form method="post"> 
        <input id="på" type="submit" name="på" value="På"/> 
          
        <input id="av" type="submit" name="av" value="Av"/> 
    </form>

    
   
    <form method="post">

        <br><h4>Timer:</h4>
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
</html>