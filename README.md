# Movavi test library

### Задание
Есть 2 сервиса, возвращающие курсы валют:
 + https://www.cbr.ru/development/SXML/
 + https://cash.rbc.ru/cash/json/converter_currency_rate/?currency_from=USD&currency_to=RUR&source=cbrf&sum=1&date=

Необходимо написать библиотеку, которая будет вычислять средний курс евро и доллара по этим двум сервисам на передаваемую дату. 

При недоступности одного из сервисов должно генерироваться исключение. 

Код должен быть максимально покрыт тестами.

### Установка
composer require spendmail/movavi dev-master

### Тестовое приложение
https://github.com/spendmail/movavi_usage
