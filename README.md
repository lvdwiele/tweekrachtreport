## Tweekracht

How to install:

1. `cp .env.example .env`
2. Install dependencies and get the docker Sail image:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
3. `sail up`.
4. Connect to the database. Upload a dump of production to it. Database credentials are in `.env`.
3. `npm install`.
4. `npm run dev`.
