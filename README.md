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

[![Latest Stable Version](https://img.shields.io/packagist/v/spendmail/movavi.svg)](https://packagist.org/packages/spendmail/movavi)
[![Total Downloads](https://img.shields.io/packagist/dt/spendmail/movavi.svg)](https://packagist.org/packages/spendmail/movavi)
[![Build Status](https://img.shields.io/travis/spendmail/movavi.svg)](https://travis-ci.org/spendmail/movavi)