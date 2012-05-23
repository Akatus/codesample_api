<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Representação do recebedor na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Receiver {
	/**
	 * @var	string
	 */
	private $apiKey;
	
	/**
	 * @var	string
	 */
	private $email;
	
	/**
	 * @param string $apiKey
	 * @param string $email
	 */
	public function __construct( $apiKey, $email ) {
		$this->setApiKey($apiKey);
		$this->setEmail($email);
	}
	
	/**
	 * @return string
	 */
	public function getApiKey() {
		return $this->apiKey;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $apiKey
	 */
	public function setApiKey($apiKey) {
		$this->apiKey = $apiKey;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
}