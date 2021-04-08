Detta är Axel Rönnbergs, Simon Swedenborgs, Joel Nordströms och Laura Olmos gymnasie arbete.

Alt dethär ska köras på en raspberry pi med ett relä kopplat till pin 24. 
för att alt ska funka så måste användaren instalera raspberry pi os på en raspberry pi och kopla ett relä till pin 24. 
Sedan måste använaren instalera en appache webbserver ocn fixa en så att när inget wifi hittas så skapas ett eget wifi, 
denna video rekomenderas för wifi biten https://www.youtube.com/watch?v=qMT-0mz1lkI&ab_channel=KM4ACK, 
denna artickeln rekomenderas för webbserver biten https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md.

Standard mappen för webbserver är /var/www/html/ och denna har restriktioner som gör att användaren inte kan modifiera innehållet, väldigt opraktiskt.
För att ändra det måstaanvändare använda komandet: sudo chmod 644 /var/www/html/

För att lättare kunna använda raspberry pien utan massa skärmar så konfigureras en ssh, öppna Raspberry Pi Configuration, 
navigera till interfaces klicka "enabled" på lilla rutan brevid ssh, Klicka sedan på ok.

För att bara kunna kopla in raspbery pien i väggen och så att den loggar in automatiskt så kör komandot: 
sudo raspi-config, välj alternativ 3: Boot Options, efter det så väljer du desktop / CLI och efter det finish och reboota raspberry pien. 

Placera alla filer från denna githuben i /var/www/html/ mappen.

För att få timern att funka så måste filen checker.py köras hela tiden. Detta görs såhär: sudo nano /etc/rc.local
i rc.local så längst ner på raden innan "exit 0" så skriv: "sudo bash -c "/usr/bin/python3 /var/www/html/checker.py > /home/pi/checker.log 2>&1" &"

