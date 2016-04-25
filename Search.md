
# ash-sweb-2016-group7
# Users Class

This class contains functions that would enable the user search for data from the Ashesi Clinic database. 
Some functions take in parameters whiles some do not take in parameters. 
The ones that take in parameters return specific information about an individual in the database based on the Id it receives.
The remaining that do not take parameters would return the entire record from the database. In this case, the information would be on
a particular table.
#How To use
1. The user selects one of the fields from the drop down
2. The user then puts in the appropriate input to make the search successful
3. If the user does not know the valid inputs, he or she should click on the help button at the bottom of the screen
4. The specific dates are then to be specified

#The functions:
#advancedSearchDisease($filter,$dateStart,$dateEnd)
This function takes in three parameters. Name of the disease, the date to start the search from and the date to end the search.
It returns details such as the student who was treated, the nurse who was on duty and the time from the database.

#searchNurse($filter,$dateStart,$dateEnd)
This function takes in three parameters. The nurse's username,the date to start the search from and the date to end the search.
This fucntion also returns details such as the nurse on duty, time diagnosis was done and the student was at the clinic at thr time.

#searchStudent($filter,$dateStart,$dateEnd)
This function takes in three parameters. The nurse's username,the date to start the search from and the date to end the search.
This fucntion also returns details such as the student firstname and lastname, insurance type and name of disease treated.
Automatically exported from code.google.com/p/ash-webtech-2015

