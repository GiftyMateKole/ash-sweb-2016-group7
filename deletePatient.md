#deletePatient.php class reference

# deletePatient Class#

A class to delete the record of a patient

##Fields ##
### $strQuery ###
Stores query to perform on database

### $text ###
Holds the parameter parsed by the searchUsers function

### $filter ###
Store information to enable filtering in the select query

### $pid ###
Holds the value of the student id

## Methods ##
### getPatient() ###
Selects all the information under the patient table 

### searchUsers() ###
Gain all information on the patient provided the student id has been provided

### deletePatient() ###
Deletes all information on the patient when the student id provided is correct
