import RPi.GPIO as gpio
import os

gpio.setmode(gpio.BCM)
gpio.setup(24, gpio.OUT)
gpio.output(24, True)