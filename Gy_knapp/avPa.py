import RPi.GPIO as gpio #importerar RPi.GPIO så att vi kan använda gpio pinsen på raspbery pien
import datetime         #importerar datetime så at vi kan kolla datumet senare.
import os


def turnOn():   #skapar funktionen turnOn som sätter på relät
    gpio.setmode(gpio.BCM)      #gör så att vi numrerar pinsen efter BCM och inte deras fysiska plats
    gpio.setup(24, gpio.OUT)    #ändrar pin 24s mode till out
    gpio.output(24, False)      #sätter pin 24 till low

def turnOff():  #skapar funktionen turnOff som stänger av relät
    gpio.setmode(gpio.BCM)      #gör så att vi numrerar pinsen efter BCM och inte deras fysiska plats
    gpio.setup(24, gpio.OUT)    #ändrar pin 24s mode till out
    gpio.output(24, True)       #sätter pin 24 till high
    gpio.cleanup()              #tömmer de användna pinsen så att de kan användas senare

start=0
stop=0
dt=datetime.datetime.now()
file = open("/var/www/html/test.txt", "r")  #öppnar test.txt som innehåller timertiderna
times = file.readline()
file.close()


startTim = int(times[0] + times[1])     #särar på tiden så att vi får bara de första och andra täcknena i filen vilket motsvarar start timmen
startMin = int(times[2] + times[3])     #särar på tiden så att vi får bara de tredje och fjärde täcknena i filen vilket motsvarar start minuten
start = startTim*60+startMin            #gör om alt till start minuter för lättare hantering senare
stopTim = int(times[4] + times[5])      #särar på tiden så att vi får bara de femte och sjätte täcknena i filen vilket motsvarar stop timmen
stopMin = int(times[6] + times[7])      #särar på tiden så att vi får bara de skjunde och åttonde täcknena i filen vilket motsvarar stop minuten
stop = stopTim*60+stopMin               #gör om alt till stop minuter för lättare hantering senare

if stop == start:
    quit        #om starttiden är samma som sluttiden så stänger nde av programet

currentTime= int(dt.hour*60+dt.minute) #skaffar nuvarande tiden i minuter

if (currentTime==start):
    turnOn()    #om den nuvarande tiden är samma som startiden så sätts relät på

if (currentTime==stop):
    turnOff()   #om den nuvarande tiden är samma som stoptiden så stängs relät av
