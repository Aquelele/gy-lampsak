import sys

if len(sys.argv) <= 1:
    file = open("test.txt", "w")
    file.write("00000000")
    file.close()
else:
    startTime = sys.argv[1]
    stopTime = sys.argv[2]

    file = open("test.txt", "w")
    file.write(startTime + stopTime)
    file.close()