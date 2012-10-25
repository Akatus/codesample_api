<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

/**
 * Serialização do XML com elementos do cartão
 */
class AkatusCartWithCardMarshaller extends AkatusCartMarshaller {
    /**
     * @var DOMDocument
     */
    private $dom;

    public function marshall(Cart $cart) {
        $this->dom = new DOMDocument();
        $this->dom->loadXML(parent::marshall($cart));

        $transactionNode = $this->dom->getElementsByTagName('transacao')->item(0);
        $this->createCardNodes($transactionNode, $cart->getTransaction());
        
        return $this->dom->saveXML();
    }

    private function createCardNodes(DOMNode $transactionNode,
                                     CardTransaction $transaction) {
    	
        $transactionNode->appendChild($this->dom->createElement('numero', $transaction->getNumber()));
        $transactionNode->appendChild($this->dom->createElement('parcelas', $transaction->getInstallments()));
        $transactionNode->appendChild($this->dom->createElement('codigo_de_seguranca', $transaction->getSecurityCode()));
        $transactionNode->appendChild($this->dom->createElement('expiracao', $transaction->getExpiration()));
        $transactionNode->appendChild($this->createHolderElement($transactionNode, $transaction));
    }

    private function createHolderElement(DOMNode $transactionNode,
                                         CardTransaction $transaction) {

        $holder = $transaction->holder();

        $holderElement = $this->dom->createElement('portador');
        $holderElement->appendChild($this->dom->createElement('nome',$holder->getName()));
        $holderElement->appendChild($this->dom->createElement('cpf',$holder->getDoc()));
        $holderElement->appendChild($this->dom->createElement('telefone',$holder->getPhone()));

        return $holderElement;
    }
}