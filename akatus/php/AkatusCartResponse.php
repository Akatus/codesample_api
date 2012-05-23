<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Resposta da API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class AkatusCartResponse {
	/**
	 * @var	string
	 */
	private $cart;
	
	/**
	 * @var	string
	 */
	private $description;
	
	/**
	 * @var	string
	 */
	private $returnUrl;
	
	/**
	 * @var	string
	 */
	private $status;
	
	/**
	 * @var	string
	 */
	private $transaction;
	
	/**
	 * @return string
	 */
	public function getCart() {
		return $this->cart;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getReturnUrl() {
		return $this->returnUrl;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return string
	 */
	public function getTransaction() {
		return $this->transaction;
	}

	/**
	 * @param string $cart
	 */
	public function setCart($cart) {
		$this->cart = $cart;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @param string $returnUrl
	 */
	public function setReturnUrl($returnUrl) {
		$this->returnUrl = $returnUrl;
	}

	/**
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @param string $transaction
	 */
	public function setTransaction($transaction) {
		$this->transaction = $transaction;
	}
}