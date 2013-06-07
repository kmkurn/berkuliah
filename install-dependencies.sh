#!/bin/sh

# Installs dependencies for testing via Travis-CI

wget http://yii.googlecode.com/files/yii-1.1.13.e9e4a0.tar.gz
tar xvf yii-1.1.13.e9e4a0.tar.gz
mv yii-1.1.13.e9e4a0/ yii/

pear channel-discover pear.phpunit.de
pear install phpunit/PHP_Invoker
pear install phpunit/PHPUnit_Selenium
pear install phpunit/DbUnit
pear install phpunit/PHPUnit_Story