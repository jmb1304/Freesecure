#!/usr/bin/env bash
tput bold;echo "FreeSecure Easy Installer"
echo "Version 1.0 By Jacob Barnes (JMB1304)"
echo "At the moment this only works on Ubuntu / Debian"
echo "Please enter your password for sudo."
echo "Installation will then commence"
sudo -s
apt-get update
apt-get install python3 apache2 php7.0 libapache2-mod-php7.0 php7.0-mcrypt
