# GB PHP Laravel
## Урок 7. Валидация данных в laravel
ДОДЕЛАЛ CRUD для всех Моделей.

### РУССИФИКАЦИЯ:
1) в /config/app.php сделал локаль по умолчанию 'ru' и для Faker - 'ru_RU'
2) в resurce/lang/ru добавил файлы валидации для русской локализации из проекта - https://github.com/Laravel-Lang/lang
3) в файл /ru/validation.php в кастомный раздел  'attributes' добавил строки для этого конкретного проекта.

### ВАЛИДАЦИЯ:
1) Выполнено:
```
vagrant@homestead:~/code/laravel8.maw$ php artisan make:request StoreCategory
Request created successfully.
vagrant@homestead:~/code/laravel8.maw$ php artisan make:request StoreNews
Request created successfully.
```
2) Правила валидации соответсвенно прописаны в rules для Http\Requests\StoreCategory и StoreNews

3) В контроллере входным параметром сразу идет прошедший валидацию $request
```
public function store(StoreNews $request)
```
и нет необходимости выпонять валидацию непосредственно в контроллере.

### ВЫВОД СООБЩЕНИЙ:
1) Вывод осуществляется в стандартный @error сообщение в @message (цикл ошибок не стал реализовывать)

### ТЕСТИРОВАНИЕ:
1) Установил Dust и ChromeDriver согласно методичке.
2) Создал два теста для каждой из форм ввода:
```
vagrant@homestead:~/code/laravel8.maw$ php artisan dusk:make AddCategoryTest
Test created successfully.
vagrant@homestead:~/code/laravel8.maw$ php artisan dusk:make AddNewsTest
Test created successfully.
```
3) тестироватование выпадало в ошибки... но в итоге сработало:
```
vagrant@homestead:~/code/laravel8.maw$ php artisan dusk
PHPUnit 9.3.11 by Sebastian Bergmann and contributors.

.R.R                                                                4 / 4 (100%)

Time: 00:10.560, Memory: 20.00 MB
There were 2 risky tests:
1) Tests\Browser\AddCategoryTest::testAdding
This test did not perform any assertions
/home/vagrant/code/laravel8.maw/tests/Browser/AddCategoryTest.php:28
2) Tests\Browser\AddNewsTest::testAdding
This test did not perform any assertions
/home/vagrant/code/laravel8.maw/tests/Browser/AddNewsTest.php:28
OK, but incomplete, skipped, or risky tests!
Tests: 4, Assertions: 2, Risky: 2.
```
4) УСПЕШНОЕ ТЕСТИРОВАНИЕ:
```
vagrant@homestead:~/code/laravel8.maw$ php artisan dusk
PHPUnit 9.3.11 by Sebastian Bergmann and contributors.
....                                                                4 / 4 (100%)
Time: 00:06.933, Memory: 26.00 MB
OK (4 tests, 6 assertions)
```
НО! не смотря на наличие файла .env.dusk (и даже .env.dusk.local как в документации) Он не сработал! И почикал мою дейстующую БД!
Теперь я понял что значило: "There were 2 risky tests"!
:)

 


