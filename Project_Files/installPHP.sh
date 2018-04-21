#!/bin/sh
# Remember to change permissions so this can be run
#sudo apt-get update
#sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
sudo cp phpConfig.conf /etc/apache2/mods-enabled/dir.conf
sudo systemctl restart apache2
sudo systemctl status apache2
# To run the local host, run 'php -S localhost:8000', without the quotes
