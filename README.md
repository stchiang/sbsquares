sbsquares
=========
This is a simple wesite used for running a Superbowl squares pool. The site features a HTML5 canvas to draw the board, and runs PHP code on the back-end that performs data validation and communicates with a MySQL database to store and retrieve user data.

## Initial Setup
After copying the files over to the host server, the following steps need to be taken in order for the site to function properly. 

### Modify config.php
This file stores information about the hostname, user, and password needed to connect to the MySQL server. The following variables need to be set in config.php:
```
$hostname = "";
$user = "";
$password = "";
```
For security reasons, it is recommended to store the config.php file outside of the web root. If this is done, then the absolute path to config.php will need to be set in getData.php (line 2) and includeData.php(11)
```
include '../../../config.php';
```
### Import sbsquares.sql
The file sbsquares.sql contains the database and table definitions that the website calls for. Use a tool such as phpMyAdmin to import this database file into the MySQL server. 

## Additional Configuration
### Rules
The rules (costs, payouts, limit per player, etc.) can be adjusted in index.php depending on how you would like to run the pool.  

### Placing the numbers
Once all of the squares have been bought, the numbers will need to be randomly placed on the board. To modify or randomize the numbers, refer to lines 59 and 60 in /js/drawBoard.js:
```
var arr1 = [0,1,2,3,4,5,6,7,8,9];
var arr2 = [0,1,2,3,4,5,6,7,8,9];
```
Randomize the numbers by manually adjusting the order they appear within the arrays. Once this is done, the numbers can be drawn on the board by uncommenting line 96 in /js/drawBoard.js.

### AFC and NFC Banners
The banner images for AFC and NFC champions are found in the /images directory. The sizes for these banners are 80px by 680px. These banners can be replaced to reflect the actual teams playing in the Superbowl. 