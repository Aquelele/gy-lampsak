import RPi.GPIO as gpio
import datetime
import os
def turnOn() {
    gpio.setmode(gpio.BCM)
    gpio.setup(18, gpio.OUT)
    gpio.output(18, gpio.HIGH)
}   
        
def turnOff() {
    gpio.setmode(gpio.BCM)
    gpio.setup(18, gpio.OUT)
    gpio.output(18, gpio.LOW)
}
var start
var stop
dt=datetime.datetime.now()
if (os.stat("times.txt").st_size != 0){
    file = open("times.txt", "r")
    times = file.read(10)
    file.close()
    startTim = int(times[0,2])
    startMin = int(times[3,5])
    start=(startTim*60+startMin)
    stopTim = int(times[6,8])
    stopMin = int(times[9,11])
    stop = (stopTim*60+stopMin)
}
currentTime=(int(dt.hour*60)+int(dt.min))
if (currentTime==start){
    turnOn()
}
if (currentTime==start){
    turnOff()
}