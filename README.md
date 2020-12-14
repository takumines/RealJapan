# RealJapan

## 手順
#### git clone

```
ssh clone
git@github.com:takumines/laravel8-sample.git

https clone
https://github.com/takumines/laravel8-sample.git
```

.env setting
```
cp .env.example .env
```
DB設定を行う
```
DB_NAME=
DB_USER=
DB_PASS=
DB_PORT=
TZ=Asia/Tokyo
```
Build and up docker containers
```
make build
```
composer install
```
docker-compose exec php composer install
```
Generate a Laravel app key
```
docker-compose exec php php artisan key:generate --ansi
```
Generate a Laravel storage symlink
```
docker-compose exec php php artisan storage:link
```
Set up laravel permissions
```
sudo chmod -R 777 api/bootstrap/cache
sudo chmod -R 777 api/storage
```
Run database migrations
```
docker-compose exec php php artisan migrate
```
