# SocialPhoto
Laravel web app inspired by Instagram.

## Run proyect for local development:
([Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/) is required to run this project).

### Duplicate .env.example, rename it as .env and set database connection:

```
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=socialphoto
DB_USERNAME=socialphoto
DB_PASSWORD=secret
```

### In file /public/js/main.js write your local URL:
```
var url = 'http://localhost:8000/'
```

### Start dockers containers:
```
docker-compose up -d --build
```

### Install Laravel dependencies:
```
docker-compose run --rm composer install
```

### Generate artisan key:
```
docker-compose run --rm artisan key:generate
```

### Initialize database and some test users:
```
docker-compose run --rm artisan migrate:refresh --seed
```
Login with:
* one@example.com
* two@example.com
* three@example.com

The password for all test users is 'user'.