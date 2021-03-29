<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" > 
	<Title>Av och På</Title>
    
    
<?php
    
        if(isset($_POST['start']) && isset($_POST['slut'])){
           $st =$_POST['start'];
           $sl = $_POST['slut'];
            echo "hej";
            echo $st;
            echo $sl;
            $start = intval(substr($st,-5,2))*60 + intval(substr($st,-2,2));
            
            $slut = intval(substr($sl,-5,2))*60 + intval(substr($sl,-2,2));;
            echo "slut $slut"; 
        }
    /*
    if(isset($_POST['start']) && isset($_POST['slut'])){
            $start = intval(substr($_POST['start'],-5,2))*60 + intval(substr($_POST['start'],-2,2));
            echo "start $start";
            $slut = intval(substr($_POST['slut'],-5,2))*60 + intval(substr($_POST['slut'],-2,2));;
            echo "slut $slut";
    }      

           
            $tidH = date("H")*60;
            
            $tidM = date("i");
            
            $tid = $tidH + $tidM;
            

    if(isset($start) && isset($slut)){
            if($tid==$start){
                echo "på";
            }

            elseif($tid==$slut){
                echo "av";
            }
    }

        
        if(isset($_POST['start']) && isset($_POST['slut'])){

            setcookie('start', "", time() - 3600);
            setcookie('slut', "", time() - 3600);

            $start = intval(substr($_POST['start'],-5,2))*60 + intval(substr($_POST['start'],-2,2));
            echo "start $start";
            $slut = intval(substr($_POST['slut'],-5,2))*60 + intval(substr($_POST['slut'],-2,2));;
            echo "slut $slut";
            setcookie('start', $start, time() + (86400 * 7));
            setcookie('slut', $slut, time() + (86400 * 7));  

        }    
            $tidH = date("H")*60;
            
            $tidM = date("i");
            
            $tid = $tidH + $tidM;
            

        if(isset($_COOKIE['start']) && isset($_COOKIE['slut'])){
            if($tid==$_COOKIE['start']){
                echo "on";
            }

            elseif($tid==$_COOKIE['slut']){
                echo "off";
            }
        }
        */
?>

</head>
<body>
   
    <form method="post">
        <input id="start" type="text" name="start" value="Startid: hh:mm"/> 
        
        <input id="slut" type="text" name="slut" value="Sluttid: hh:mm"/>

        <input id="tidSett" type="submit" value="Sett"/> 
    </form>
    

</body>
</html>