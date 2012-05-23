<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Representação de um telefone na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Phone {
	/**
	 * @var	string
	 */
	private $number;
	
	/**
	 * @var	string
	 */
	private $type;
	
	/**
	 * @param string $type
	 * @param string $number
	 */
	public function __construct($type, $number) {
		$this->setType($type);
		$this->setNumber($number);
	}
	
	/**
	 * @return string
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $number
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}
}