#!/bin/sh

mysql -e "CREATE DATABASE berkuliah_test;"
mysql -u root berkuliah_test < protected/data/berkuliah.sql