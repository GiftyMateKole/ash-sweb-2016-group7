# ash-sweb-2016-group7
# Users Class

This class contains functions that would enable the user search for data from the Ashesi Clinic database. 
Some functions take in parameters whiles some do not take in parameters. 
The ones that take in parameters return specific information about an individual in the database based on the Id it receives.
The remaining that do not take parameters would return the entire record from the database. In this case, the information would be on
a particular table.
#How To use
1. The user can click on any of the three buttons on the screen to display full records form any of the table indicated
2. To get specific individuals, the user would have to specify the table from which he would like to search from. The user would
then have to enter a valid student ID for correct information from the database

#The functions:
#getAllDiagnosis()
Returns all information from the diagnosis table

#getPatientInfo()
Returns all the information from the patient table

#getPatient($filter)
Returns information from the patient table on a specific individual

#getHospital()
Returns all information from the hospital table

#getDiagnosis($diagnosis)
Returns information from the diagnosis table on a specific individual

#searchPatient($text)
Calls on the getPatient($filter) to return information from the patient table on a specific individual
Automatically exported from code.google.com/p/ash-webtech-2015
