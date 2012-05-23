<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

use \ArrayIterator;

/**
 * Representação do comprador na API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class Buyer {
	/**
	 * @var	array[Address]
	 */
	private $addresses = array();
	
	/**
	 * @var	string
	 */
	private $email;
	
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var array[Phone]
	 */
	private $phones = array();
	
	/**
	 * @param string $name
	 */
	public function __construct( $name, $email ) {
		$this->setName( $name );
		$this->setEmail( $email );
	}
	
	/**
	 * @param Address $address
	 */
	public function addAddress( Address $address ) {
		$this->addresses[] = $address;
	}

	/**
	 * Cria uma instância de Phone e já adiciona na lista de telefones do
	 * comprador.
	 * @param string $type
	 * @param string $number
	 */
	public function addNewPhone($type, $number) {
		$this->addPhone( new Phone($type, $number));
	}
	
	/**
	 * @param Phone $phone
	 */
	public function addPhone( Phone $phone ) {
		$this->phones[] = $phone;
	}
	
	/**
	 * Cria uma instância de Address e já adiciona na lista de endereços do
	 * comprador.
	 * @param string $type
	 * @return Address
	 */
	public function createAddress( $type ) {
		$address = new Address();
		$address->setType($type);
		
		$this->addAddress($address);
		
		return $address;
	}
	
	/**
	 * @return	Iterator
	 */
	public function getAddressIterator() {
		return new ArrayIterator( $this->addresses );
	}
	
	/**
	 * @return	string
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @return	string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @return Iterator
	 */
	public function getPhoneIterator() {
		return new ArrayIterator( $this->phones );
	}
	
	/**
	 * @param string $email
	 */
	public function setEmail( $email ) {
		$this->email = $email;
	}
	
	/**
	 * @param 	string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}
}