import RPi.GPIO as gpio #importerar RPi.GPIO så att vi kan använda gpio pinsen på raspbery pien
import os #importerar os

gpio.setmode(gpio.BCM)      #gör så att vi numrerar pinsen efter BCM och inte deras fysiska plats
gpio.setup(24, gpio.OUT)    #ändrar pin 24s mode till out
gpio.output(24, True)       #sätter pin 24 till high
gpio.cleanup()              #tömmer de användna pinsen så att de kan användas senare