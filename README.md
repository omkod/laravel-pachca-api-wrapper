# laravel-pachca-api-wrapper

<img width="188" src="https://app.pachca.com/Pachca_company_img.jpg?width=188" alt="Pachca">

Обертка над стандартным api мессенджера Пачки - https://crm.pachca.com/dev/messages/new/

## Установка и настройка

1)  В консоле проекта выполннить

``` bash
composer require omkod/laravel-pachca-api-wrapper
```

2) Публикация файлов пакета

``` bash
php artisan vendor:publish --provider='Omcod\LaravelPachcaApiWrapper\Providers\PachcaServiceProvider'
```

3) В проекте config/pachca.php установить актуальный 'bearer_token'. Берем тут https://app.pachca.com/developers
 

### Способы использования 

#### 1 - Универсальный метод запроса к API

``` php
$pachcaWrapper = new PachcaApi();
$jsonParameters = [
    "message" => [
        "entity_id" => 123123,
        "content"   => 'Hello world',
    ]
];

$pachcaWrapper->requestApiPachca("POST", '/messages', $jsonParameters);
```

#### 2 - Специальные методы под каждый запрос API

``` php
$pachcaWrapper = new PachcaApi();
$pachcaWrapper->sendMessage(123123, 'Hello world');
```

##### Поддерживаемый функционал

- [ ] Общие методы.
- [ ] Сотрудники.
- [ ] Статус.
- [ ] Теги.
- [x] Беседы и каналы.
    - Новая беседа или канал
- [ ] Участники бесед и каналов.
- [ ] Комментарии.
- [x] Сообщения.
    - Новое сообщение
- [ ] Реакции на сообщения.
- [ ] Ссылки.
- [ ] Напоминания
