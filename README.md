# КУДИР - Книга учета доходов и расходов

Приложение для генерации КУДИР 

## Системные требования

* PHP версии 8.2
* MySQL версии 8.0
* Composer версии 2.6

## Установка

1. Переименовать в корне проекта файл .env.example в .env
2. Раскомментировать строки 23-27
3. В строках 23-27 ввести данные для подключения к базе данных.
    Например:
```
      DB_CONNECTION=mysql
      DB_HOST=MySQL-8.0
      DB_PORT=3306
      DB_DATABASE=kudir
      DB_USERNAME=root
      DB_PASSWORD=
```
4. Выполнить команды в командной строке в корне проекта:
```
php composer install
npm install
npm run build
```

## Лицензия

Кудир - приложение с открытым исходным кодом, растпространяемое по лицензии [MIT license](https://opensource.org/licenses/MIT).
