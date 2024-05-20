#!/bin/sh

. ./sqlpwd 2> /dev/null
mysqldump --defaults-extra-file=sqlpwd --extended-insert=FALSE --ignore-table=$DB_NAME.wp_users --add-drop-table $DB_NAME > db_dump.sql
zip -r1q user_content.zip www/wp-content/uploads
