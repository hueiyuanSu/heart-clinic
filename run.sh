#!/bin/bash

SHARED_PATH=/www/seda/shared
YII_DIR=/var/www/html

set -e

find ${SHARED_PATH}/runtime -type d -print0 | xargs -0 chmod 777
find ${SHARED_PATH}/web/assets -type d -print0 | xargs -0 chmod 777

cd ${YII_DIR} && composer install
cd ${YII_DIR} && php yii migrate --interactive=0
cd ${YII_DIR} && php yii migrate --interactive=0 --migrationPath=@vendor/dektrium/yii2-user/migrations
cd ${YII_DIR} && php yii migrate/up --interactive=0 --migrationPath=@yii/rbac/migrations
