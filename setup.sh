#!/bin/sh

# 最初らへんのコマンドはちょっと忘れた
# dockerのコンテナを立ち上げる
docker-compose up --build
docker-compose exec app bash
composer install

# laravel breezeを使えるようにする
composer require laravel/breeze
php artisan breeze:install
npm install && npm run dev
php artisan migrate

# value objectを導入するためのcomposerのツール
composer require imunew/laravel-value-objects
