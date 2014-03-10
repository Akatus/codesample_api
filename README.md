connect
=======

Repositório de bibliotecas para integração com a API Akatus

Exemplo de uso
=====================

	<?php
	require 'akatus/php/config.php';

	$receiver = new Receiver ( 'XXX', 'user@domain.com' );

	//dados do comprador
	$buyer = new Buyer ( 'Jose Antonio', 'ze@antonio.com.br' );

	//telefone do comprador
	$buyer->addNewPhone ( 'residencial', '1699999999' );

	//endereço do comprador
	$address = $buyer->createAddress ( 'entrega' );
	$address->setCity ( 'Cidade' );
	$address->setCountry ( 'Brasil' );
	$address->setNeighborhood ( 'Bairro' );
	$address->setNumber ( 0 );
	$address->setState ( 'estado' );
	$address->setStreet ( 'Rua dos bobos' );
	$address->setZip ( '00000000' );

	//carrinho e os produtos comprados
	$cart = new Cart ( $buyer, $receiver );
	$cart->addNewProduct ( 'Produto 1', 148.99, 8.5, 1, 16.45, 10 )->setId ( 'UFC1403' );
	$cart->addNewProduct ( 'Produto 3', 148.99, 8.5, 1, 16.45, 10 )->setId ( 'UFC1403' );

	$cart->getTransaction ()->setReference ( 'abc1234' );

	try {
		$akatusCartApi = new AkatusCartApi ();
	
		//o método test() indica que estamos usando o ambiente de testes,
		//para usar o ambiente de produção, basta não usar o método test.
		var_dump ( $akatusCartApi->test ()->execute ( $cart ) );
	} catch ( RuntimeException $e ) {
		//opz, alguma coisa saiu errada.
		//log...
		echo $e->getMessage ();
	}

