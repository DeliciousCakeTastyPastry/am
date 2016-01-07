#!/bin/bash
# First argument is the domain name
domainname=$1
pwd=`pwd`
mysqlpassword=niggerwut
pre=${domainname%%.*}
suff=${domainname##*.}
wpprefix="${pre}${suff}"
adminuser=nigger
adminpassword=nigger
adminemail="wat@wat.com"

#Now create wp-config.php for each site
#Also note http://alpnames.com/domain-registration/bulk-domain-registration.php
#TODO: Use wp-cli to configure the sites with templates/plugins

function installrandomtheme(){
	cd $pwd
	export numberofthemes=`wc -l themelist.txt | cut -d" " -f 1`
	local num=`shuf -i 1-$numberofthemes -n 1`
	local themeurl=`head -n $num themelist.txt | tail -n 1`
	php wp-cli.phar --allow-root theme install $themeurl --path="/var/www/$domainname/public_html" --activate	
}

function setplugindefaults(){
	cd $pwd
	mysql -u root -p$mysqlpassword --database=${wpprefix}wordpress < wat.sql
}

function installplugins(){
	cd $pwd
	while read line
	do
	php wp-cli.phar --allow-root plugin install $line --activate --path="/var/www/$domainname/public_html"
	done < pluginlist.txt
}

function installwordpress(){
	cd /var/www/$domainname/public_html/wordpress
	php $pwd/wp-cli.phar --allow-root core install --url="${domainname}/wp-admin/install.php" --title=TITLE --admin_user="$adminuser" --admin_password="$adminpassword" --admin_email="$adminemail"
	cd $pwd
}

function downloadwordpress(){
	local olddir=`pwd`
	local wplink=https://wordpress.org/latest.tar.gz
	cd /var/www/$domainname/public_html
	wget -O wordpress.tar.gz $wplink
	tar -xzf wordpress.tar.gz
	rm wordpress.tar.gz
	cd wordpress
	mv ./* ../
	cd $olddir
}

function createwpconfigphp(){
	cd $pwd
	cp ./configtemplate.php ./tmp.php
	sed -i "s/DOMAINNAME/${wpprefix}wordpress/" ./tmp.php
	mv ./tmp.php /var/www/$domainname/public_html/wordpress/wp-config.php
}

function cleanup(){
true
}

function updatesystem(){
#system needs packages updated to properly install
	echo "Updating the package repositories"
	apt-get update
}

function checkformysql(){
	if [ "0" -eq `which mysql > /dev/null ; echo $?` ]
#if mysql is install then $? (the exit status of the last command run) will = 0
	then
	echo "mysql is installed, proceeding..."
	else
#http://askubuntu.com/questions/79257/how-do-i-install-mysql-without-a-password-prompt
#the following sets the root password for mysql and prevents install prompt
	echo "mysql IS NOT INSTALLED! Installing it..."
	debconf-set-selections <<< 'mysql-server mysql-server/root_password password niggerwut'
	debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password niggerwut'
	apt-get install -y -f mysql-server
	fi
}

function securemysql(){
#http://forums.mysql.com/read.php?11,284110,284110
#runs mysql_secure_installation noninteractively
	./noninteractive_mysql_secure_installation.sh $mysqlpassword $mysqlpassword
}

function createdatabase(){
	mysql -u root -p$mysqlpassword -e "CREATE DATABASE ${wpprefix}wordpress; GRANT ALL ON wordpress.* to 'wpadmin' identified by 'niggerwut'; flush privileges;"
}

function checkforapache(){
	if [ "0" -eq `which apache2 > /dev/null ; echo $?` ]
	then
	echo "apache2 is installed, proceeding..."
	else
	echo "apache2 IS NOT INSTALLED! Installing it..."
	apt-get install -y -f apache2
	fi
}

function installvirtualhost(){
#https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts
	a2dissite *default > /dev/null
	mkdir /var/www/$domainname
	mkdir /var/www/$domainname/public_html
	mkdir /var/www/$domainname/log
	mkdir /var/www/$domainname/backups
	cat <<HEREDOC > /etc/apache2/sites-available/${domainname}.conf
<VirtualHost *:80>
    ServerAdmin admin@example.com
    ServerName example.com
    ServerAlias www.example.com
    DocumentRoot /var/www/example.com/public_html
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
HEREDOC
	sed -i "s/example.com/$domainname/g" /etc/apache2/sites-available/${domainname}.conf
	a2ensite ${domainname}.conf
	service apache2 restart
}

function checkforphp(){
	if [ "0" -eq `which php > /dev/null ; echo $?` ]
	then
	echo "php is installed, proceeding..."
	else
	echo "php IS NOT INSTALLED! Installing it..."
	apt-get install -y -f php5 php5-mysql php-pear
	fi
}

function restarteverything(){
	service mysql restart
	service apache2 restart
}

checkformysql
securemysql
createdatabase
checkforapache
checkforphp
installvirtualhost
restarteverything
downloadwordpress
createwpconfigphp
installwordpress
installrandomtheme
installplugins
setplugindefaults
#cleanup

#todo: create/modify apache's virtualhosts
#install a random theme from the themepack
#take a list of domain names, product installs
# future usage: while read line
# do
# call wpinstall.sh
# done < fileofdomains.txt
