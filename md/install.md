[home](../README.md)
Configuration & install
-----------------------

+ Get project
+ Install
 
### Get project
`git clone https://github.com/anonymous1983/symfony2.git`

### Install

**Symfony**

- First you need to check out the symfony2 application folder

`cd symfony2`

- Install dependencies

Execute the install Composer command to download and install all the dependencies required by the application:

`composer install`

or `composer update`

**DataBase**

- Configuring the Database

Before you really begin, you'll need to configure your database connection information. By convention, this information is usually configured in an `app/config/parameters.yml` file:
```
# app/config/parameters.yml
parameters:
    database_driver:    pdo_mysql
    database_host:      localhost
    database_name:      test_project
    database_user:      root
    database_password:  password

# ...
```
- Create the database

`php bin/console doctrine:database:create`

One mistake even seasoned developers make when starting a Symfony project is forgetting to set up default charset and collation on their database, ending up with latin type collations, which are default for most databases. They might even remember to do it the very first time, but forget that it's all gone after running a relatively common command during development:

```
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
```

- Creating an Entity Class

`php bin/console doctrine:generate:entity`

**Node.js**
