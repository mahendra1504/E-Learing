class stack : 
    def __init__(self) :
        self.stack = []
        
    def isEmpty(self) :
        if self.stack == [] :
            return True
        else:
            return False
    
    def push(self,item) :
        self.stack.append(item)
        
    def pop(self) :
        return self.stack.pop()
    
    def peek(self) :
        return self.stack[len(self.stack)-1]
    
    def size(self) :
        return len(self.stack)
    
s1 = stack()

while True :
    print("\n\n\nMAIN MENU")
    print("1.Check for Empty")
    print("2.Push an Item")
    print("3.Pop an Item")
    print("4.Peek from stack")
    print("5.Size of stack")
    print("6.Exit")
    
    ch = int(input("Enter your choice : "))
    if ch==1 : 
        if s1.isEmpty()==True :
            print("\n\n\nstack is empty!!!\n\n\n")
        else:
            print("\n\n\nstack is not empty\n\n\n")
            
    elif ch==2 :
        item = int(input("\n\n\nEnter the item to push in stack : "))
        s1.push(item) 

    elif ch==3 :
        print(s1.pop())
        
    elif ch==4 :
        print(s1.peek())
        
    elif ch==5 :
        print("\n\n\nSize of the stack is : ",s1.size())
           
    elif ch==6 :
        break
        
        
    