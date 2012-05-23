<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

use \DOMDocument;
use \UnexpectedValueException;

/**
 * Deserialização da resposta XML da integração com a API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class AkatusCartResponseUnMarshaller {
	/**
	 * @param DOMDocument $dom
	 * @return AkatusCartResponse
	 * @throws UnexpectedValueException
	 */
	public function unMarshall(DOMDocument $dom) {
		$akatusCartResponse = new AkatusCartResponse();
		$akatusCartResponse->setStatus($this->getStatus($dom));
		$akatusCartResponse->setDescription($this->getDescription($dom));
		$akatusCartResponse->setCart($this->getCart($dom));
		$akatusCartResponse->setTransaction($this->getTransaction($dom));
		$akatusCartResponse->setReturnUrl($this->getReturnUrl($dom));
		
		return $akatusCartResponse;
	}
	
	private function getNodeValue(DOMDocument $dom, $tagName) {
		$element = $dom->getElementsByTagName($tagName)->item(0);

		return $element == null ? null : $element->nodeValue;
	}
	
	private function getStatus(DOMDocument $dom) {
		$status = $this->getNodeValue($dom, 'status');
		
		if ( $status == null ) {
			throw new UnexpectedValueException('Invalid XML');
		}
		
		return $status;
	}
	
	private function getCart(DOMDocument $dom) {
		return $this->getNodeValue($dom, 'carrinho');
	}
	
	private function getDescription(DOMDocument $dom) {
		return $this->getNodeValue($dom,'descricao');
	}
	
	private function getTransaction(DOMDocument $dom) {
		return $this->getNodeValue($dom,'transacao');
	}
	
	private function getReturnUrl(DOMDocument $dom) {
		return $this->getNodeValue($dom,'url_retorno');
	}
}