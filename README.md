sbsquares
=========
This is a simple wesite used for running a Superbowl squares pool. The site uses a HTML5 canvas to draw the squares board, and runs PHP code on the back-end that performs data validation and communicates with a MySQL database to store and retrieve user data.

## Initial Setup
After copying the files over to the host server, the following steps need to be taken in order for the site to function properly. 

### Modify config.php
This file stores information about the hostname, user, and password needed to connect to the MySQL server. The following variables need to be set in config.php:
```
$hostname = "";
$user = "";
$password = "";
```
Once the config.php file is set up, then the absolute path to config.php on your web server will need to be set in getData.php (line 2) and includeData.php(line 11):
```
include '../../../config.php';
```
### Import sbsquares.sql
The file sbsquares.sql contains a blank template for the MySQL database and table that the website interfaces with. Use a tool such as phpMyAdmin to import this database file into the MySQL server. 

## Additional Configuration  

### Placing the numbers
Once all of the squares have been bought, the numbers will need to be randomly placed on the board. Modify lines 78 and 79 in /js/drawBoard.js with the square numbers. For example:
```
var arr1 = ["?","?","?","?","?","?","?","?","?","?"];
var arr2 = ["?","?","?","?","?","?","?","?","?","?"];
```
```
var arr1 = [0,1,2,3,4,5,6,7,8,9];
var arr2 = [9,8,7,6,5,4,3,2,1,0];
```

### AFC and NFC Banners
The banner images for AFC and NFC champions are found in the /images directory. The sizes for these banners are 80px by 680px. These banners can be modified according to the actual teams playing in the Super Bowl.