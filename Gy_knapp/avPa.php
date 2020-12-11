

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="main.css">
	
    <script src="script.js"></script>
    
    <?php
        $onOff = 0;
        
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
        function tryck() {
            echo "tryk";
            if($onOff==0){
                $onOff=1;
                turnon();
            }
            else{
               $onOff=0;
               turnoff();
            }
        }
        if (isset($_GET['t'])) {
            tryck();
          }

      
    
    
      
    ?>
    


</head>
<body>
    
    <button class="knapp" href='avPa.php?t=true' onclick="avPa(this)">KNAPP</button>
    

</body>
</html>