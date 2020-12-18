

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
    


</head>
<body>

  
    <form method="post"> 
        <input id="på" type="submit" name="på" value="På"/> 
          
        <input id="av" type="submit" name="av" value="Av"/> 
    </form>
    
    

</body>
</html>