import RPi.GPIO as gpio
import datetime
import os

def turnOn():
    gpio.setmode(gpio.BCM)
    gpio.setup(24, gpio.out)
    gpio.output(24, False)
        
def turnOff():
    gpio.setmode(gpio.BCM)
    gpio.setup(24, gpio.out)
    gpio.output(24, True)

start=0
stop=0
dt=datetime.datetime.now()
if (os.stat("times.txt").st_size != 0):
    file = open("times.txt", "r")
    times0 = file.read(10)
    file.close()
    times = []
    for i in times0:
        times.append(int(i))
    startTim = int(times[0,2])
    startMin = int(times[3,5])
    start=(startTim*60+startMin)
    stopTim = int(times[6,8])
    stopMin = int(times[9,11])
    stop = (stopTim*60+stopMin)

currentTime=(int(dt.hour*60)+int(dt.min))
if (currentTime==start):
    turnOn()

if (currentTime==start):
    turnOff()
