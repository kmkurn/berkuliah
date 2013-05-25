#!/bin/sh

# Installs dependencies for testing via Travis-CI

git clone https://github.com/yiisoft/yii.git
pear channel-discover pear.phpunit.de
pear install phpunit/PHP_Invoker
pear install phpunit/PHPUnit_Selenium
pear install phpunit/DbUnit
pear install phpunit/PHPUnit_Story