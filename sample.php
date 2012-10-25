<?php
require 'akatus/php/config.php';

$receiver = new Receiver('CHAVE DA API', 'EMAIL');

//dados do comprador
$buyer = new Buyer('Jose Antonio', 'ze@antonio.com.br');

//telefone do comprador
$buyer->addNewPhone('residencial', '1699999999');

//endereço do comprador
$address = $buyer->createAddress('entrega');
$address->setCity('Cidade');
$address->setCountry('Brasil');
$address->setNeighborhood('Bairro');
$address->setNumber(0);
$address->setState('estado');
$address->setStreet('Rua dos bobos');
$address->setZip('00000000');

//carrinho e os produtos comprados
$cart = new Cart($buyer, $receiver);

//Transação com Cartão de crédito
$card = new CardTransaction();
$card->setReference('abc123');
$card->setPaymentMethod('cartao_amex'); //cartão amex
$card->setNumber('378282246310005'); //número de cartão para testes
$card->setExpiration('12/16');
$card->setSecurityCode('1234');

//Portador
$holder = $card->holder();
$holder->setDoc('394.624.589-79'); //cpf para testes
$holder->setName('Fulano de Tal');
$holder->setPhone('11 2222 3333');

$cart->setTransaction($card);

$cart->addNewProduct('Produto 1', 148.99, 8.5, 1, 16.45, 10)->setId('UFC1403');
$cart->addNewProduct('Produto 3', 148.99, 8.5, 1, 16.45, 10)->setId('UFC1403');

try {
    $akatusCartApi = new AkatusCartApi(new AkatusCartWithCardMarshaller());

    //o método test() indica que estamos usando o ambiente de testes,
    //para usar o ambiente de produção, basta não suar o método test.
    var_dump($akatusCartApi->test()->execute($cart));
} catch (RuntimeException $e) {
    //opz, alguma coisa saiu errada.
    //log...
    echo $e->getMessage();
}
