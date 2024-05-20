#!/bin/sh

if [ -f ./sqlpwd ]; then
    read  -p "WARNING!!!!! Files sqlpwd, wp-config.php will be overwritten! Continue [y/N]:" CONFIRMATION
    CONFIRMATION=$(echo "$CONFIRMATION" | tr '[:upper:]' '[:lower:]')
    if [ "${CONFIRMATION}" != "y" ]; then
        exit
    fi
fi

DEFAULT_PROJECT_DOMAIN="$(basename `git rev-parse --show-toplevel`).dev"
DEFAULT_DB_NAME=$(basename `git rev-parse --show-toplevel`)
DEFAULT_DB_USER="root"
DEFAULT_DB_PASS="1111"
DEFAULT_APACHE_CONF="Y"
ASK_APACHE_CONF="Y/n"

read  -p "Enter Project URL [${DEFAULT_PROJECT_DOMAIN}]:" PROJECT_DOMAIN
PROJECT_DOMAIN="${PROJECT_DOMAIN:-$DEFAULT_PROJECT_DOMAIN}"

read  -p "Enter DB Name [${DEFAULT_DB_NAME}]:" DB_NAME
DB_NAME="${DB_NAME:-$DEFAULT_DB_NAME}"

read  -p "Enter DB User [${DEFAULT_DB_USER}]:" DB_USER
DB_USER="${DB_USER:-$DEFAULT_DB_USER}"

read  -p "Enter DB Password [${DEFAULT_DB_PASS}]:" DB_PASS
DB_PASS="${DB_PASS:-$DEFAULT_DB_PASS}"

sed "s/define('DB_NAME', '');/define('DB_NAME', '${DB_NAME}');/g;s/define('DB_USER', '');/define('DB_USER', '${DB_USER}');/g;s/define('DB_PASSWORD', '');/define('DB_PASSWORD', '${DB_PASS}');/g;" wp-config.php > www/wp-config.php

echo "[project_setting]
DB_NAME=${DB_NAME}
PROJECT_DOMAIN=${PROJECT_DOMAIN}

[mysqldump]
user=${DB_USER}
password=${DB_PASS}

[mysql]
user=${DB_USER}
password=${DB_PASS}
" > sqlpwd

mysql --defaults-extra-file=sqlpwd -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME};"
mysql --defaults-extra-file=sqlpwd -e "DROP TABLE IF EXISTS ${DB_NAME}.wp_users;"
mysql --defaults-extra-file=sqlpwd -e "CREATE TABLE ${DB_NAME}.wp_users (
  ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  user_login varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_pass varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_nicename varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_email varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_url varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_registered datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_activation_key varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  user_status int(11) NOT NULL DEFAULT '0',
  display_name varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (ID),
  KEY user_login_key (user_login),
  KEY user_nicename (user_nicename),
  KEY user_email (user_email)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;"
mysql --defaults-extra-file=sqlpwd -e "INSERT INTO ${DB_NAME}.wp_users VALUES (1,'root','\$P\$BlodeBOwC.danxc8MO4sEa9ZFUtQyV/','root','kholodov@gutewebsite.com','','2017-01-16 16:28:19','',0,'root');"

# confirmation for create apache virtual host
read  -p "Create Apache 2.4 configuration [${ASK_APACHE_CONF}]:" APACHE_CONF
APACHE_CONF="${APACHE_CONF:-$DEFAULT_APACHE_CONF}"
APACHE_CONF=$(echo "$APACHE_CONF" | tr '[:upper:]' '[:lower:]')

if [ "${APACHE_CONF}" = "y" ]; then
    SCRIPT=$(readlink -f "$0")
    SCRIPT_PATH=$(dirname "$SCRIPT")

# TODO: add AssignUserId xxx xxx with proper user
    echo "create /etc/apache2/sites-available/${PROJECT_DOMAIN}.conf"
    echo "<VirtualHost *:80>

	ServerName ${PROJECT_DOMAIN}

	ServerAdmin webmaster@localhost
	DocumentRoot ${SCRIPT_PATH}/www

	<Directory ${SCRIPT_PATH}/www/>
	    Options Indexes FollowSymLinks
	    AllowOverride All
	    Require all granted
	</Directory>

	ErrorLog \${APACHE_LOG_DIR}/${DB_NAME}.error.log
	CustomLog \${APACHE_LOG_DIR}/${DB_NAME}.access.log combined

</VirtualHost>" | sudo tee /etc/apache2/sites-available/${PROJECT_DOMAIN}.conf > /dev/null
    set +x
    sudo a2ensite ${PROJECT_DOMAIN}.conf
    sudo service apache2 reload
    set -x
fi
#TODO: insert ip into /etc/hosts

./after_pull_origin_master_restore.sh
