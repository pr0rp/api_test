Необходимо разработать прототип API сервиса курьерской доставки на PHP

Что должен включать в себя сервис:<br>
API методы<br>
Метод расчета стоимости доставки<br>
Метод создания заказа<br>
Метод получения информации о заказе<br>
Метод получение списка заказов<br>
Сервис должен уметь взаимодействовать с клиентом при помощи REST API или JSON RPC запросов<br>
В сервисе должен быть реализован RateLimit с ограничением 10 RPM<br>

Что сделано:

Реализован рабочий REST API<br>
Методы проверялись в postman<br>
Метод создания заказа<br>
POST http://localhost/api/orders/create.php<br>
Метод получения информации о заказе<br>
GET http://localhost/api/orders/read.php<br>
Метод получение списка заказов<br>
GET http://localhost/api/orders/read.php?id=1<br>
Так же были добавлены методы обновления и удаления<br>
PUT http://localhost/api/orders/update.php?id=1<br>
DELETE http://localhost/api/orders/delete.php?id=1<br>
