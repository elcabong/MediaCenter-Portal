Newer version of this project is in cc2 repo.  Updated with AngularJS.
==================






ControlCenter v1.0
==================

picutres @ http://imgur.com/a/vFT9c#0

Access any web based software to control your home and media needs.

Required:
  Any web server with php 5+ with curl and sqlite  (linux apache instruction below)
  
  For the android app to connect, you need to set your webserver IP to one of the following IPs:  (contact me to add more ips)
		192.168.0.250
		192.168.1.250
  

Please direct any comments to this thread:    http://forum.xbmc.org/showthread.php?tid=176684
  
  
0.  install prerequisites:
sudo apt-get install git  
sudo apt-get install apache2  
sudo apt-get install php5 libapache2-mod-php5 php5-curl php5-sqlite  
sudo service apache2 restart  
sudo mkdir /var/www/ControlCenter 

  
1. Download:   git clone git://github.com/elcabong/ControlCenter.git /var/www/ControlCenter/

1.5 You can move /CCincludes/ out of the webroot for security as long as the script can find it by searching recursively.  ie:  /var/CCincludes/   or  /var/www/CCincludes/

2. Permissions: 
sudo chown -R www-data:www-data /var/www/ControlCenter/sessions   
sudo chown -R www-data:www-data /var/www/ControlCenter/media/Users  
sudo chown -R www-data:www-data /var/www/ControlCenter/media/Programs
sudo chown -R www-data:www-data /[pathToCCincludes]/CCincludes


3. browse to your http://[webserver]/ControlCenter/


if you have any loading issues try enabling "short_open_tag=On" for php

