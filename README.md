# Job finder companion ️️🖇️

Small webapp to help you to manage your applications and to practise my new craft!

## Installation 🛠️

### Clone the project ⬇️

```
$ cd ~/git
$ git clone git@github.com:Titou44/job-finder-companion.git
```

### Install composer and PHP dependencies 📦

Using [composer doc](https://getcomposer.org/download/)

```
$ cd ~/git/job-finder-companion
$ composer install --prefer-dist
```

### Install Mysql and configure the app 💾

Create a .env.local file and add a line to configure your database access:

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/job-finder-companion
```

Create the database and tables then load the test fixtures:

```
$ bin/console doctrine:database:create
$ bin/console doctrine:migrations:migrate
$ bin/console doctrine:fixtures:load
```

### Launch the development web server 🚀

```
$ php bin/console server:run
```

And access the application with your web browser using http://127.0.0.1:8000
