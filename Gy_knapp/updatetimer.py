import sys

if len(sys.argv) <= 1:
    file = open("test.txt", "w")
    print("Episkt test")
    file.write("")
    file.close()
else:
    startTime = sys.argv[1]
    stopTime = sys.argv[2]

    print(startTime + stopTime)
    file = open("test.txt", "w")
    file.write(startTime + stopTime)
    file.close()