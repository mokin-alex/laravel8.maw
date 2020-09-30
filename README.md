# GB PHP Laravel
## Задание 3 по теме: Шаблонизатор Blade, bootstrap

- Ознакомиться с документацией по работе с [шаблонами в laravel](https://laravel.com/docs/8.x/blade).
- Добавить в проект шаблоны blade и bootstrap.
- Сделать шаблоны страниц авторизации и добавления новости (ВАЖНОЕ).

 Шаблон может быть не сложным, но обязательно должен содержать в себе главный шаблон (лайаут), меню, и контент. Продумайте как удобнее сделать меню, возможно вынести меню админа в выпадающий список, помните, что после авторизации функционал админа будет закрыт для простых пользователей. В форме логина должно быть видно ваше меню основное.

## ЧТО СДЕЛАНО:

- переделаны модели News и Category
- добавлена Авторизация и компоненты Vue:
````
composer require laravel/ui "^3.0"
php artisan ui vue --auth
````
- изменены все Контроллеры
- изменены Маршруты (применил еще и редирект)
- изменены все Виды на blade
  * меню обычное отличается от меню Администратора
  * используются шаблоны форм (но маршруты и контроллеры для POST пока не прописывал)
  картинки тут:
  * [/news/rubric/business](https://cloud.mail.ru/public/4m26%2FyCLi1JTz6)  
  * [/admin/addnews](https://cloud.mail.ru/public/25GJ%2F4jVfxCJqd)
  * [/login](https://cloud.mail.ru/public/v3wK%2FH6jKABLxS)
- FRONTEND: добавил в качестве упражнения свой стилевой файл custom.css (он успешно применился)
- FRONTEND:
````  npm i && npm run dev ````
была ошибка: 
````
> @ watch /home/vagrant/code/laravel8.maw
> npm run development -- --watch
> @ development /home/vagrant/code/laravel8.maw
> cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js "--watch"
sh: 1: cross-env: not found
npm ERR! code ELIFECYCLE
npm ERR! syscall spawn
npm ERR! file sh
npm ERR! errno ENOENT
npm ERR! @ development: `cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js "--watch"`
npm ERR! spawn ENOENT
npm ERR!
npm ERR! Failed at the @ development script.
npm ERR! This is probably not a problem with npm. There is likely additional logging output above.
````
пришлось изменить путь до cross-env.js в явном виде в файле package.json:
````
    "scripts": {
        "dev": "npm run development",
        "development": "node_modules/cross-env/src/bin/cross-env.js NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
````
