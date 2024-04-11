# PicPay-PHP-SDK

Este é um SDK em PHP para interagir com a API do PicPay. Ele permite criar facilmente solicitações HTTP para realizar operações como criar preferências de pagamento, consultar transações e muito mais.

## Instalação

Você pode instalar este SDK via Composer. Execute o seguinte comando:

```
composer require snowrunescape/picpay-php-sdk
```

## Exemplo de Uso

```php
$picpay = new \PicPay\PicPay("x-picpay-token", "x-seller-token");

$preference = $picpay->create_preference([
    "referenceId" => "PICPAY00001REFERENCE",
    "callbackUrl" => "https://example.com/api/notification",
    "returnUrl" => "https://example.com/order/success",
    "items" => [
        [
            "id" => 1,
            "quantity" => 1
        ]
    ],
    "value" => 30.00,
    "expiresAt" => (new \DateTime("+1 hour"))->format("Y-m-d\TH:i:s.000-04:00"),
    "buyer" => [
        "firstName" => "Bruno",
        "lastName" => "Caitano",
        "document" => "123.456.789-10",
        "email" => "snowrunescape@snowdev.com.br",
        "phone" => "+55 11 9 9999-9999"
    ]
]);

$url = $preference["response"]["paymentUrl"];
```

## Contribuindo

Se você encontrar um problema ou tiver alguma sugestão de melhoria, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto é licenciado nos termos da licença MIT. Consulte o arquivo LICENSE para obter mais detalhes.
