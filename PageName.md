#adb.php class reference.

# adb Class #

A class to interface with mysql. It encapsulates mysql php functions.

## Fields ##
### $str\_error ###
Description of error from last operation.

### $error ###
Error code from the last error

### $link ###
Database connection reference. **connect()** method stores the connection reference in this field.

### $er\_code\_prefix ###
Prefix for generating error codes

### result ###
Stores the reference to the dataset after a query is executed successfully by **query()** method


## Methods ##
### adb() ###
Constructor method

### connect() ###
Connects to mysql and selects database
Returns true if connected else false

### query($str\_sql) ###
Runs query on existing db connection. If there is no connection it creates new connection. Returns true if query is successful, else false. The dataset reference is stored in **$result**.

### fetch() ###
Returns on row from the current data set as associated array. If there is an error it returns false.

### get\_num\_rows() ###
Returns the number of rows in the current dataset.

### get\_insert\_id() ###
Returns an auto increment id from the last insert query executed using the open connection.

### log\_error($level, $code, $msg, $mysql\_msg = "NONE") ###
Logs error or success message by calling log\_msg function. It generates error code (**$error$) and error description (**$str\_error