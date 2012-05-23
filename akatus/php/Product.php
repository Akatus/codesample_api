<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

/**
 * Representação de um produto na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Product {
	/**
	 * @var	string
	 */
	private $description;
	
	/**
	 * @var	float
	 */
	private $discount = 0;
	
	/**
	 * @var	string
	 */
	private $id;
	
	/**
	 * @var	float
	 */
	private $price;
	
	/**
	 * @var	integer
	 */
	private $quantity;
	
	/**
	 * @var	float
	 */
	private $shipping = 0;
	
	/**
	 * @var	float
	 */
	private $weight;
	
	/**
	 * @param string $description
	 * @param float $price
	 * @param float $weight
	 * @param integer $quantity
	 */
	public function __construct( $description, $price, $weight, $quantity = 1 ) {
		$this->setDescription($description);
		$this->setPrice($price);
		$this->setQuantity($quantity);
		$this->setWeight($weight);
	}
	
	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
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
	public function getId() {
		return $this->id;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @return integer
	 */
	public function getQuantity() {
		return $this->quantity;
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
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @param float $discount
	 */
	public function setDiscount($discount) {
		$this->discount = (float) $discount;
	}

	/**
	 * @param string $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param float $price
	 */
	public function setPrice($price) {
		$this->price = (float) $price;
	}

	/**
	 * @param integer $quantity
	 */
	public function setQuantity($quantity) {
		$this->quantity = (int) $quantity;
	}

	/**
	 * @param float $shipping
	 */
	public function setShipping($shipping) {
		$this->shipping = (float) $shipping;
	}

	/**
	 * @param float $weight
	 */
	public function setWeight($weight) {
		$this->weight = (float) $weight;
	}
}