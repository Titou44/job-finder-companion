# Job finder companion ️️🖇️

Small webapp to help you to manage your applications and to practise my new craft!

## Installation for development 🛠️

### Clone the project ⬇️

```
$ cd ~/git
$ git clone git@github.com:Titou44/job-finder-companion.git
```

### Launch the Docker image 🐋

Let's use `docker-compose` to build and launch development Docker image:

```
$ cd ~/git/job-finder-companion
$ docker-compose up -d
```

### Install the PHP dependencies 📦

```
$ bin/docker-composer install --prefer-dist
```

### Setup the demo data 💾

Create the tables then load the demo data fixtures:

```
$ bin/docker-console doctrine:migrations:migrate
$ bin/docker-console doctrine:fixtures:load
```

### Use the web application 🚀

Web application is available in your web browser using `http://127.0.0.1:8100`

## Development commands

### Launch PHP tools

Update the PHP dependencies:

```
$ bin/docker-composer update --prefer-dist
```

Launch PHP CS Fixer:

```
$ bin/docker-php-cs-fixer fix --diff --dry-run src/ --rules=@PSR2
```

### Use Docker

Re-build the Docker images:

```
$ docker-compose build
```

List running Docker containers, state and ports:

```
$ docker-compose ps
```

### Build and push Docker image to Dockerhub

We use a custom Docker images for the web:

```
$ docker build -t nidup/job-finder-companion-web:latest .docker/web/
$ docker login -u titou44
$ docker push nidup/job-finder-companion-web:latest
```

### Backup & restore production data 💾

Backup the current database content in the `data` folder:
```
$ bin/docker-database-backup
```

Restore the last backup from the `data` folder:
```
$ bin/docker-database-restore
```
