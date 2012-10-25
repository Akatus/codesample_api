<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

/**
 * Portador do cartão
 */
class Holder {
    /**
     * @var string
     */
    private $doc;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

	/**
     * @return string
     */
    public function getDoc() {
        return $this->doc;
    }

	/**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

	/**
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

	/**
     * @param string $doc
     */
    public function setDoc($doc) {
        $this->doc = $doc;
    }

	/**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

	/**
     * @param string $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }
}