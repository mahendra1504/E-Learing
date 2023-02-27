lt1 = [1,2,3,4,5]
lt2 = []
for i in range(0,5,1) :
    num = int((input("Enter a number : ")))
    lt2.append(num)
sum = 0 
for i in lt2 :
    sum = sum + i

print("Sum of all Elements : ",sum)
print(lt1+lt2)
