Для того что бы запустить приложение нужно перейти в: /RestAPI/api/bootstrap/index.php
В качестве валидатора формы я использовал bootstrap validator.js
Базу создавал через PhpMyAdmin, конфиг для подключения находиться RestAPI/api/config/database.php
.htaccess файл находиться RestAPI/api/bootstrap/.htaccess
Сервер openserver в связке Apache PHP 7 Nginx
Ответ бэкэнда в json примерно следующий
{"status":true,"message":"yeee","id":"5","email":"itsowncordova@gmail.com"}
