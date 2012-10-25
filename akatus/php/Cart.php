<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

/**
 * Representação do carrinho na integração com a API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Cart implements Countable, IteratorAggregate {
	/**
	 * @var	Buyer
	 */
	private $buyer;

	/**
	 * @var	array[Product]
	 */
	private $products;

	/**
	 * @var	Receiver
	 */
	private $receiver;

	/**
	 * @var	Transaction
	 */
	private $transaction;

	/**
	 * @param	Buyer $buyer
	 * @param	Receiver $receiver
	 */
	public function __construct( Buyer $buyer, Receiver $receiver ) {
		$this->buyer = $buyer;
		$this->products = array();
		$this->receiver = $receiver;
		$this->transaction = new Transaction();
	}

	/**
	 * Adiciona um novo produto ao carrinho.
	 * @param string $description
	 * @param float $price
	 * @param float $weight
	 * @param integer $quantity
	 * @param float $shipping
	 * @param float $discount
	 * @return Product
	 */
	public function addNewProduct($description,
								  $price,
								  $weight,
								  $quantity = 1,
								  $shipping = 0,
								  $discount = 0) {

		$product = new Product($description, $price, $weight,$quantity);
		$product->setDiscount((float) $discount);
		$product->setShipping((float) $shipping);

		$this->addProduct($product);

		return $product;
	}

	/**
	 * @param Product $product
	 */
	public function addProduct( Product $product ) {
		$this->products[] = $product;
		$this->transaction->setDiscount(
			$this->transaction->getDiscount() + $product->getDiscount()
		);

		$this->transaction->setShipping(
			$this->transaction->getShipping() + $product->getShipping()
		);

		$this->transaction->setWeight(
			$this->transaction->getWeight() +
			($product->getWeight() * $product->getQuantity())
		);
	}

	/* (non-PHPdoc)
	 * @see Countable::count()
	 */
	public function count() {
		return count( $this->products );
	}

	/**
	 * @return Buyer
	 */
	public function getBuyer() {
		return $this->buyer;
	}

	/* (non-PHPdoc)
	 * @see IteratorAggregate::getIterator()
	 */
	public function getIterator() {
		return new ArrayIterator( $this->products );
	}

	/**
	 * @return Receiver
	 */
	public function getReceiver() {
		return $this->receiver;
	}

	/**
	 * @return Transaction
	 */
	public function getTransaction() {
		return $this->transaction;
	}

	/**
	 * @param Transaction $transaction
	 */
	public function setTransaction(Transaction $transaction) {
	    $this->transaction = $transaction;
	}
}