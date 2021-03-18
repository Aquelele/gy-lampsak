import RPi.GPIO as gpio
import datetime
import os


def turnOn():
    gpio.setmode(gpio.BCM)
    gpio.setup(24, gpio.OUT)
    gpio.output(24, False)

def turnOff():
    gpio.setmode(gpio.BCM)
    gpio.setup(24, gpio.OUT)
    gpio.output(24, True)
    gpio.cleanup()

start=0
stop=0
dt=datetime.datetime.now()
file = open("/var/www/html/test.txt", "r")
times = file.readline()
file.close()

""" 
if len(times) <4:
    quit() 
"""


startTim = int(times[0] + times[1])
startMin = int(times[2] + times[3])
start = startTim*60+startMin
stopTim = int(times[4] + times[5])
stopMin = int(times[6] + times[7])
stop = stopTim*60+stopMin

if stop == start:
    quit

currentTime= int(dt.hour*60+dt.minute)

if (currentTime==start):
    turnOn()

if (currentTime==stop):
    turnOff()
