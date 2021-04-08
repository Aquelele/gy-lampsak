import sys #importerar sys så att vi kan använda sys.argv

if len(sys.argv) <= 1:  #om sys argvs inte finns:
    file = open("test.txt", "w") #öppna test.txt
    file.write("00000000") #skriv 00000000 i filen
    file.close() #stängfilen
else:
    startTime = sys.argv[1] #startiden för timern är sys.argv1
    stopTime = sys.argv[2]  #stoptiden för timern är sys.argv2

    file = open("test.txt", "w") #skriver start och slut tid i test.txt
    file.write(startTime + stopTime)
    file.close()