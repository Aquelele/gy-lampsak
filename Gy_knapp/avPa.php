

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<Title>Av och På</Title>
	<link rel="stylesheet" type="text/css" href="main.css">
	
    <script src="script.js"></script>
    
    <?php
        $onOff = 0;
        function tryck() {
            if($onOff==0):
                $onOff=1;
                turnon();
            else:
                $onOff=0;
                turnoff();

        }
        function turnon() {
            system(“ gpio-g mode 24 out “) ;
            system(“ gpio-g write 24 1”) ;
        }

        function turnoff() {
            system(“ gpio-g mode 24 out “) ;
            system(“ gpio-g write 24 0”) ;
        }
    ?>

</head>
<body>
    <a href="#" onclick="tryck().avPa()">
        <div class="knapp">
            <div class="knappText">
            
            </div>
        </div>
    </a>

</body>
</html>