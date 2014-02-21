#!/bin/bash

if [ "$VHOST" = "" ]
then
    echo >&2 "please provide a VHOST variable in the environment (ie: VHOST=code.sbrk.org)"
    exit 1
fi

sed -i "s/{hostname}/$VHOST/" /var/www/inc/config.php /etc/apache2/sites-available/000-default.conf

source /etc/apache2/envvars
/usr/sbin/apache2 -D FOREGROUND
