

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="60" > 
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
            
            if(isset($_POST['på'])) { 
                turnon();
                echo '<style>#på{visibility: hidden !important;}</style>';
                echo '<style>#av{visibility: visible !important;}</style>';
                $på = $_POST['på'];
                setcookie('lysM', $på, time() + (86400 * 7));
                setcookie('intlysM', "", time() - 3600);
                
            }    
        
            if(isset($_POST['av'])) { 
                turnoff();
                echo '<style>#av{visibility: hidden !important;}</style>';
                echo '<style>#på{visibility: visible !important;}</style>';
                $av = $_POST['av'];
                setcookie('intlysM', $av, time() + (86400 * 7));
                setcookie('lysM', "", time() - 3600);
            
              
            }
        }
        
        else{
            if(isset($_POST['på'])) { 
                turnon();
                
                echo '<style>#på{visibility: hidden !important;}</style>';

                $på = $_POST['på'];
                setcookie('lysM', $på, time() + (86400 * 7));
            }    
        
            if(isset($_POST['av'])) { 
                turnoff();
                echo '<style>#av{visibility: hidden !important;}</style>';
                $av = $_POST['av'];
                setcookie('intlysM', $av, time() + (86400 * 7));
                setcookie('lysM', "", time() - 3600);
            
              
            }
            elseif(isset($_POST['på'])==false && isset($_POST['av'])==false){
                echo '<style>#av{visibility: hidden !important;}</style>';
            }
        }*/
        $file = fopen("times.txt", "r");
        $times = fread($file,"8");
        fclose($file);
        $start = substr($times, 0, 4);
        $stop = substr($times, 5, 9);

        
    ?>
    


</head>
<body>

  
    <form method="post"> 
        <input id="på" type="submit" name="på" value="På"/> 
          
        <input id="av" type="submit" name="av" value="Av"/> 
    </form>

    <p>Vill du sätta en timer</p> <input id="time" type="checkbox" onclick="timer()"/>
   
    <form method="post">
        Starttid:
        <input id="start" type="text" name="start" value="hh:mm"/> 
        Sluttid:
        <input id="slut" type="text" name="slut" value="hh:mm"/>

        <input id="tidSett" type="submit" value="Sett"/> 
    </form>
    

</body>
</html>