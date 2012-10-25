<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

/**
 * Transação para cartões de crédito
 */
class CardTransaction extends Transaction {
    /**
     * @var string
     */
    private $expiration;

    /**
     * @var Holder
     */
    private $holder;

    /**
     * @var integer
     */
    private $installments = 1;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $securityCode;
    
	/**
     * @return string
     */
    public function getExpiration() {
        return $this->expiration;
    }

	/**
     * @return integer
     */
    public function getInstallments() {
        return $this->installments;
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
    public function getSecurityCode() {
        return $this->securityCode;
    }

    /**
     * @return Holder
     */
    public function holder() {
        if ($this->holder == null) {
            $this->holder = new Holder();
        }

        return $this->holder;
    }

	/**
     * @param string $expiration
     */
    public function setExpiration($expiration) {
        $this->expiration = $expiration;
    }

	/**
     * @param integer $installments
     */
    public function setInstallments($installments) {
        $this->installments = $installments;
    }

	/**
     * @param string $number
     */
    public function setNumber($number) {
        $this->number = $number;
    }

	/**
     * @param string $securityCode
     */
    public function setSecurityCode($securityCode) {
        $this->securityCode = $securityCode;
    }
}