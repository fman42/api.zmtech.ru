# ZMTechAPI

**ZMTechAPI** - это библиотека, предназначенная для работы с API сервиса api.zmtech.ru

#### Общая информация
Для работы вам необходимы пользовательские данные (id и password).
Полное описание методов и сущностей вы можете посмотреть в http://docs.zazumedia.ru

Установить с помощью **Composer:**

``
composer require zmtech/api.zmtech.ru 
``

## Создание объекта библиотеки
```php
$authClient = new ZMTechAPI\Clients\AuthClient($id, $password, $baseUri = 'https://api.zmtech.ru:7778/v1'); // Создаем клиента для последующих запросов
$zm_tech = new ZMTechAPI\ZMTech($authClient); // Создаем экземпляр библиотеки
```

### Описание методов ZMTech
``get(string $endpoint_name): ?object`` - получить экземпляр endpoint-a для запросов

## Получение информации о пользователе

```php
$user = $zm_tech->get('account')->getAccountInfo();
```

## Отправка сообщений разными способами

```php
$smsBrand = $zm_tech->get('sms')->sendBrandSms([
    [
        'sender' => 'ZAZUMEDIA',
        'message' => 'Hello, Zazu!',
        'phone' => '79183411414'
    ],
    [
        'sender' => 'ZAZUMEDIA',
        'message' => 'Hello, Zazu! x2',
        'phone' => '79183411415'
    ]
]);

$smsNeutral = $zm_tech->get('sms')->sendNeutralSms([
    [
        'message' => 'Hello, Zazu!',
        'phone' => '79183411414'
    ],
    [
        'message' => 'Hello, Zazu! x2',
        'phone' => '79183411415'
    ]
]);
```

## Получение статусов

```php
$statuses = $zm_tech->get('status')->getStatuses();
```
