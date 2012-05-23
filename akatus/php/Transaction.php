<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Representação de uma transação na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Transaction {
	/**
	 * Método de pagamento padrão
	 * @var string
	 */
	const DEFAULT_PAYMENT_METHOD = 'boleto';
	
	/**
	 * Moeda padrão.
	 * @var string
	 */
	const DEFAULT_CURRENCY = 'BRL';
	
	/**
	 * @var	string
	 */
	private $currency = Transaction::DEFAULT_CURRENCY;
	 
	/**
	 * @var	float
	 */
	private $discount = 0;

	/**
	 * @var	string
	 */
	private $paymentMethod = Transaction::DEFAULT_PAYMENT_METHOD;
	
	/**
	 * @var	string
	 */
	private $reference;
	
	/**
	 * @var	float
	 */
	private $shipping = 0;
	
	/**
	 * @var	float
	 */
	private $weight = 0;
	
	/**
	 * @return string
	 */
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * @return float
	 */
	public function getDiscount() {
		return $this->discount;
	}

	/**
	 * @return string
	 */
	public function getPaymentMethod() {
		return $this->paymentMethod;
	}

	/**
	 * @return string
	 */
	public function getReference() {
		return $this->reference;
	}

	/**
	 * @return float
	 */
	public function getShipping() {
		return $this->shipping;
	}

	/**
	 * @return float
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * @param string $currency
	 */
	public function setCurrency($currency) {
		$this->currency = $currency;
	}

	/**
	 * @param float $discount
	 */
	public function setDiscount($discount) {
		$this->discount = $discount;
	}

	/**
	 * @param string $paymentMethod
	 */
	public function setPaymentMethod($paymentMethod) {
		$this->paymentMethod = $paymentMethod;
	}

	/**
	 * @param string $reference
	 */
	public function setReference($reference) {
		$this->reference = $reference;
	}

	/**
	 * @param float $shipping
	 */
	public function setShipping($shipping) {
		$this->shipping = $shipping;
	}

	/**
	 * @param float $weight
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
	}
}