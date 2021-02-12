import RPi.GPIO as gpio
import time
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
file = open("times.txt", "r")
times = file.read(8)
file.close()
start = times[0,4]
stop = times[5, 9]
