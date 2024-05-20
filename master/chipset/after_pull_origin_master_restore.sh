#!/bin/sh

. ./sqlpwd 2> /dev/null

mysql --defaults-extra-file=sqlpwd -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME};"
echo "Import db_dump.sql"
if hash pv 2>/dev/null; then
    DUMPSIZE=$(stat -c%s "db_dump.sql")
    sed "s|VALUES (1,'siteurl','[^']\+','yes')|VALUES (1,'siteurl','http://${PROJECT_DOMAIN}','yes')|g;s|VALUES (2,'home','[^']\+','yes')|VALUES (2,'home','http://${PROJECT_DOMAIN}','yes')|g" db_dump.sql | pv -s "${DUMPSIZE}" | mysql --defaults-extra-file=sqlpwd $DB_NAME
else
    mysql --defaults-extra-file=sqlpwd $DB_NAME < sed "s|VALUES (1,'siteurl','[^']\+','yes')|VALUES (1,'siteurl','http://${PROJECT_DOMAIN}','yes')|g;s|VALUES (2,'home','[^']\+','yes')|VALUES (2,'home','http://${PROJECT_DOMAIN}','yes')|g" db_dump.sql
fi

unzip -o user_content.zip
