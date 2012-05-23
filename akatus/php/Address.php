<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Representação do endereço do comprador na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Address {
	/**
	 * @var	string
	 */
	private $city;
	
	/**
	 * @var string
	 */
	private $country;
	
	/**
	 * @var string
	 */
	private $neighborhood;
	
	/**
	 * @var integer
	 */
	private $number;
	
	/**
	 * @var string
	 */
	private $state;
	
	/**
	 * @var string
	 */
	private $street;
	
	/**
	 * @var string
	 */
	private $type;
		
	/**
	 * @var string
	 */
	private $zip;
	
	/**
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}
	
	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @return string
	 */
	public function getNeighborhood() {
		return $this->neighborhood;
	}

	/**
	 * @return integer
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @return string
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}
	
	/**
	 * @param string $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @param string $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @param string $neighborhood
	 */
	public function setNeighborhood($neighborhood) {
		$this->neighborhood = $neighborhood;
	}

	/**
	 * @param integer $number
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * @param string $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * @param string $street
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @param string $zip
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}
}