# GB PHP Laravel
Урок 8. Посредники. Сессии в Laravel. Аутентификация
##1. Реализовать механизм регистрации обычных пользователей.
##2. В админке агрегатора реализовать редактирование профилей пользователей с возможностью их перевода в администраторы. 
(Перенесите функционал профиля из админки в выпадающий список, и не нужно админу делать возможность с себя снять админа) 
## 3*. Кнопка перевода в администраторы и обратно одна, и работает через ajax.
пункт 3 не реализован, ответ приходит успешно, а данные реквеста не приходят в контроллер.

```
php artisan vendor:publish --tag=laravel-pagination

php artisan make:migration AlterTableUserAddIsAdmin
php artisan make:seeder UserSeeder
php artisan migrate:fresh --seed

php artisan make:controller ProfileController
php artisan make:request StoreProfile //там правило проверки запроса на изменение профайла самим юзером.
php artisan make:middleware CheckIsAdmin
php artisan make:controller Admin/CrudUserController --resource

php artisan make:request StoreUser //там правило проверки запроса на изменение профайла Админом!
// проверим юзера который отправляет запрос на статус админа там же прямо в Requests\StoreUser
(наверное это избыточно, если в роутерах уже есть посредник CheckIsAdmin)
```
