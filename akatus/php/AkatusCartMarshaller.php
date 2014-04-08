<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

/**
 * Serialização do carrinho para XML para integração com a API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class AkatusCartMarshaller {
	/**
	 * @return string
	 */
	public function marshall( Cart $cart ) {
		$dom = new DOMDocument('1.0','UTF-8');
		$carrinho = $dom->createElement('carrinho');
		$carrinho->appendChild($this->createReceiverElement($dom, $cart));
		$carrinho->appendChild($this->createBuyerElement($dom, $cart));
		$carrinho->appendChild($this->createProductsElement($dom, $cart));
		$carrinho->appendChild($this->createTransactionElement($dom, $cart));
		
		$dom->appendChild($carrinho);
		
		return $dom->saveXML();
	}
	
	private function createReceiverElement(DOMDocument $dom, Cart $cart) {
		$receiver = $cart->getReceiver();
		
		$receiverElement = $dom->createElement('recebedor');
		$receiverElement->appendChild(
			$dom->createElement('api_key', $receiver->getApiKey())
		);
		$receiverElement->appendChild(
			$dom->createElement('email', $receiver->getEmail())
		);
		
		return $receiverElement;
	}
	
	private function createBuyerElement(DOMDocument $dom, Cart $cart) {
		$buyer = $cart->getBuyer();
		
		$buyerElement = $dom->createElement('pagador');
		$buyerElement->appendChild(
			$dom->createElement('nome', $buyer->getName())
		); 
		$buyerElement->appendChild(
			$dom->createElement('email', $buyer->getEmail())
		);
		$addressesElement = $dom->createElement('enderecos');
		$buyerElement->appendChild($addressesElement);
		
		foreach ( $buyer->getAddressIterator() as $address ) {
			$addressesElement->appendChild(
				$this->createAddressElement($dom, $address)
			);
		}
		
		$phonesElement = $dom->createElement('telefones');
		$buyerElement->appendChild($phonesElement);
		
		foreach ($buyer->getPhoneIterator() as $phone ) {
			$phonesElement->appendChild(
				$this->createPhoneElement($dom, $phone)
			);
		}
		
		return $buyerElement;
	}
	
	private function createAddressElement(DOMDocument $dom, Address $address) {
		$addressElement = $dom->createElement('endereco');
		$addressElement->appendChild(
			$dom->createElement('tipo', $address->getType())
		);
		$addressElement->appendChild(
			$dom->createElement('logradouro', $address->getStreet())
		);
		$addressElement->appendChild(
			$dom->createElement('numero', $address->getNumber())
		);
		$addressElement->appendChild(
			$dom->createElement('bairro', $address->getNeighborhood())
		);
		$addressElement->appendChild(
			$dom->createElement('cidade', $address->getCity())
		);
		$addressElement->appendChild(
			$dom->createElement('estado', $address->getState())
		);
		$addressElement->appendChild(
			$dom->createElement('pais', $address->getCountry())
		);
		$addressElement->appendChild(
			$dom->createElement('cep', $address->getZip())
		);
		
		return $addressElement;
	}
	
	private function createPhoneElement(DOMDocument $dom, Phone $phone) {
		$phoneElement = $dom->createElement('phone');
		$phoneElement->appendChild(
			$dom->createElement('tipo', $phone->getType())
		);
		$phoneElement->appendChild(
			$dom->createElement('numero', $phone->getNumber())
		);
		
		return $phoneElement;
	}
	
	private function createProductsElement(DOMDocument $dom, Cart $cart) {
		$productsElement = $dom->createElement('produtos');
		
		foreach ($cart->getIterator() as $product) {
			$productsElement->appendChild(
				$this->createProductElement($dom, $product)
			);
		}
		
		return $productsElement;
	}
	
	private function createProductElement(DOMDocument $dom, Product $product) {
		$productElement = $dom->createElement('produto');
		$productElement->appendChild(
			$dom->createElement('codigo', $product->getId())
		);
		$productElement->appendChild(
			$dom->createElement('descricao', $product->getDescription())
		);
		$productElement->appendChild(
			$dom->createElement('quantidade', $product->getQuantity())
		);
		$productElement->appendChild(
			$dom->createElement('preco', number_format($product->getPrice(), 2, '', ''))
		);
		$productElement->appendChild(
			$dom->createElement('peso', number_format($product->getWeight(), 2, '', ''))
		);
		$productElement->appendChild(
			$dom->createElement('frete', number_format($product->getShipping(), 2, '', ''))
		);
		$productElement->appendChild(
			$dom->createElement('desconto', number_format($product->getDiscount(), 2, '', ''))
		);
		
		return $productElement;
	}
	
	private function createTransactionElement(DOMDocument $dom, Cart $cart) {
		$transaction = $cart->getTransaction();
		$transactionElement = $dom->createElement('transacao');
		$transactionElement->appendChild(
			$dom->createElement('desconto', $transaction->getDiscount())
		);
		$transactionElement->appendChild(
			$dom->createElement('peso', $transaction->getWeight())
		);
		$transactionElement->appendChild(
			$dom->createElement('frete', $transaction->getShipping())
		);
		$transactionElement->appendChild(
			$dom->createElement('moeda', $transaction->getCurrency())
		);
		$transactionElement->appendChild(
			$dom->createElement('referencia', $transaction->getReference())
		);
		$transactionElement->appendChild(
			$dom->createElement('meio_de_pagamento', $transaction->getPaymentMethod())
		);
		
		if($transaction->getFingerprintAkatus()) {
			$transactionElement->appendChild(
				$dom->createElement('fingerprint_akatus', $transaction->getFingerprintAkatus())
			);
			$transactionElement->appendChild(
				$dom->createElement('fingerprint_partner_id', $transaction->getFingerprintPartnerId())
			);
			$transactionElement->appendChild(
				$dom->createElement('ip', $transaction->getIp())
			);
		}
		
		return $transactionElement;
	}
}
