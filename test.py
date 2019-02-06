class MyClass:
	def dump(self,expression):
		result = eval(expression)
		print(result)



# create a new MyClass
ob = MyClass()
val = input("Enter expression as a String ---")
ob.dump(val)