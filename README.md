# Formation SQLI (29/12/2021)
This project is planned for the training scheduled on 20/03/2021

# Magento 2 docker
Here is step by step installation how to setup a local environment for the project Magento 2 with Docker.

## Installation
- Create your working directory and go into it.
- Clone this repository
```console
patrick@chirac:~$ git clone -b training-28122021 https://gitlab.rabat.sqli.com/magento_2/formation.git .
```
- Copy the magento 2 source code into src folder
```console
patrick@chirac:~$ git clone -b develop https://gitlab.rabat.sqli.com/magento_2/formation.git src
```
- Create a DNS host entry for the site
```console
patrick@chirac:~$ echo "127.0.0.1 formation.devo" | sudo tee -a /etc/hosts
```
- Rename nginx.conf.sample to nginx.conf
```console
patrick@chirac:~$ mv specific/nginx.conf.sample specific/nginx.conf
```
- Copy env.php and config.php
```console
patrick@chirac:~$ cp specific/env.php src/app/etc/
patrick@chirac:~$ cp specific/config.php src/app/etc/
```

-  Start the containers
```console
patrick@chirac:~$ bin/start
```
- Import existing database
```console
patrick@chirac:~$ bin/clinotty mysql -hdb -umagento -pmagento magento < specific/dump.sql
```
Before composer install ,add Magento repo access  in src/
* Rename auth.json.sample
* Add your access informations in auth.json File
```console
patrick@chirac:~$ bin/clinotty composer install
```

- Fix permissions, owners and restart containers
```console
patrick@chirac:~$ bin/fixperms
patrick@chirac:~$ bin/fixowns
patrick@chirac:~$ bin/restart
```
## Services
- php 7.3-fpm-4
- nginx 1.13-8
- percona 5.7
- redis 5.0
- Mailhog

## URLs
- front : https://formation.devo/
- back : https://formation.devo/admin (admin / admin123)
- mailhog : http://formation.devo:8025
- phpMyAdmin : http://formation.devo:8089 (magento/magento)

## Common problems
If you got permissions denied during launching bin/magento cmd, please execute **bin/fixperms**
If you are doing test with postman, be sure to **desactivate the SSL verification**

## Credits
This installation is based on the Mark Shust's Docker Configuration for Magento.
[https://github.com/markshust/docker-magento](https://github.com/markshust/docker-magento)

List of available commands :
[https://github.com/markshust/docker-magento#custom-cli-commands](https://github.com/markshust/docker-magento#custom-cli-commands)
