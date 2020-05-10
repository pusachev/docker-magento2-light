# Docker build for magento development

## Before start

In container php-fpm and nginx works by user **www** and group **www** with GUI and UID **7373** please create this user locally.

## Start project

### Create project dir 

```bash
mkdir magento2 && cd magento2
```

### Clone docker-compose repository
 
```bash
git clone git@github.com:pusachev/docker-magento2-light.git env/
```

### Clone or copy your existing code

```bash
git clone {your-magento-code-repository} src/
```

or

```bash
mkdir src && copy /you/magento2 src/
```


### Import database 

```bash
zcat dump-magento2.sql.gz | mysql -P 3309 -h 127.0.0.1 -u root -proot magento
```

### Copy env.php in your project

```bash
cd src/ && cp ../env/env.php app/etc/env.php
```

## Install magento

### Get magento from composer 

```bash
docker exec -itu www php-fpm composer create-project --repository=https://repo.magento.com/ magento/project-community-edition /var/www/current/src
```

### Install sample data

```bash
docker exec -itu www php-fpm /var/www/current/src/bin/magento sampledata:deploy
```

### Install magento 

```bash
docker exec -itu www php-fpm /var/www/current/src/bin/magento setup:install --base-url=http://magento2.test/ --db-host=mysql --db-name=magento --db-user=root --db-password=root --admin-firstname=Magento --admin-lastname=User --admin-email=user@example.com --admin-user=admin --admin-password=admin123 --language=en_AU --currency=AUD --timezone=Australia/Melbourne --cleanup-database --use-rewrites=1
```

## Config cache by redis

Please add code in you env.php

```php
...
 'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'database' => '0',
                    'port' => '6379'
                ],
            ],
            'page_cache' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'database' => '1',
                    'compress_data' => '0'
                ]
            ]
        ]
    ],
...
```
## Config session save in redis

Please add code in you env.php

```php
...
'session' =>
        [
            'save' => 'redis',
            'redis' =>
            [
                'host' => 'redis',
                'port' => '6379',
                'password' => '',
                'timeout' => '2.5',
                'persistent_identifier' => '',
                'database' => '2',
                'compression_threshold' => '2048',
                'compression_library' => 'gzip',
                'log_level' => '3',
                'max_concurrency' => '6',
                'break_after_frontend' => '5',
                'break_after_adminhtml' => '30',
                'first_lifetime' => '600',
                'bot_first_lifetime' => '60',
                'bot_lifetime' => '7200',
                'disable_locking' => '0',
                'min_lifetime' => '60',
                'max_lifetime' => '2592000'
            ]
        ],
...
```
