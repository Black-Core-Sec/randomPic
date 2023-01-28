<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## RandomPic

### Поднятие проекта
Для запуска проекта выполните следующий шаги:
1. Клонируйте проект `git clone git@github.com:Black-Core-Sec/randomPic.git`.
2. Войдите в директорию проекта `cd randomPic`.
3. В директории проекта выполните команду `make init`, дождитесь завершения.
4. Отредактируйте файл `.env`, если есть необходимость (кроме значения APP_KEY - его оставить пустым).
5. Выполните команду `make build`, дождитесь завершения.
6. Выполните команду `make up`, дождитесь завершения.
7. Выполните команду `make keygen`, дождитесь завершения.

**Проект должен быть доступен по адресу 127.0.0.1:80**

### Остановка проекта
Для остановки проекта выполните команду `make down`.

---
## ТЗ
### Главная страница
На странице появляется рандомная фотография с сайта https://picsum.photos/.  
Фото получается по url https://picsum.photos/id/1020/600/500  
где: 1020 - в url это id фотки 
600 и 500 - это размеры фотки (неважно какие)  
под фотографией располагаются 2 кнопки: отклонить и одобрить.  
При нажатии на любую из кнопок соответствующий запрос отправляется на сервер асинхронно.  
Затем появляется новая фотография и так по кругу.  
Фотографии по которым было принято решение больше не показываются.  

### Админская страница
Доступ к странице предоставляется только при наличии токена xyz123 в get параметре.  
На странице выводится таблица со следующими столбцами:
- id фотографии который является ссылкой на эту фотографию.
- решение: одобрена или отклонена.
- кнопка отмены решения (можно синхронно).
