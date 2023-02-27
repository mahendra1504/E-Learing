fp = open("myFile.txt","r")

print(fp.read())
fp.seek(0)
number_of_lines = 0
number_of_words = 0
number_of_characters = 0

for line in fp:
  line = line.strip("\n")

  words = line.split()
  number_of_lines += 1
  number_of_words += len(words)
  number_of_characters += len(line)
   

print("Number of lines : ",number_of_lines)
print("Number of words : ",number_of_words)
print("Number of letters : ",number_of_characters)