import RPi.GPIO as gpio
import os

gpio.setmode(gpio.BCM)
gpio.setup(24, gpio.out)
gpio.output(24, False)