#!/bin/bash

cd /home/apps/symfony/

composer install

php bin/console d:s:u --force

php bin/console c:c --env=prod --no-warmup

chown www-data:www-data -R /home/apps/*