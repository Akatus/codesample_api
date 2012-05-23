<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */
namespace akatus\php;

use \DOMDocument;
use \RuntimeException;
use \UnexpectedValueException;

/**
 * Integração com a API da Akatus
 * @author	João Batista Neto &lt;neto.joaobatista@gmail.com.br&gt;
 */
class AkatusCartApi {
	/**
	 * Endpoint de produção
	 * @var string
	 */
	const ENDPOINT = 'https://www.akatus.com/api/v1/carrinho.xml';
	
	/**
	 * Endpoint de testes
	 * @var string
	 */
	const TEST_ENDPOINT = 'https://dev.akatus.com/api/v1/carrinho.xml';
	
	/**
	 * @var	AkatusCartMarshaller
	 */
	private $marshaller;
	
	/**
	 * @var	AkatusCartResponseUnMarshaller
	 */
	private $unmarshaller;
	
	/**
	 * @var boolean
	 */
	private $test = false;
	
	/**
	 * @param AkatusCartMarshaller $marshaller
	 */
	public function __construct(AkatusCartMarshaller $marshaller = null,
								AkatusCartResponseUnMarshaller $unmarshaller = null ) {

		if ( $marshaller == null ) {
			$marshaller = new AkatusCartMarshaller();
		}
		
		if ( $unmarshaller == null ) {
			$unmarshaller = new AkatusCartResponseUnMarshaller();
		}
		
		$this->marshaller = $marshaller;
		$this->unmarshaller = $unmarshaller;
	}
	
	/**
	 * Executa a operação.
	 * @param Cart $cart O carrinho que será enviado.
	 * @return AkatusCartResponse A resposta do serviço.
	 * @throws RuntimeException
	 */
	public function execute( Cart $cart ) {
		$endpoint = $this->test ? self::TEST_ENDPOINT: self::ENDPOINT;
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $endpoint );
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($curl, CURLOPT_POST, true );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->marshaller->marshall($cart));
        
        $response = curl_exec( $curl );
        $errno = curl_errno($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        
        if ($errno != 0) {
        	throw new RuntimeException($error, $errno);
        }
        
        libxml_use_internal_errors(false);
        
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($response);
        
        $libxmlErrors = libxml_get_errors();

        if (count($libxmlErrors) != 0) {
        	$e = null;
        	
        	foreach ( $libxmlErrors as $libxmlError ) {
        		$e = new UnexpectedValueException($libxmlError->message,
        										  $libxmlError->code, $e);
        	}
        	
        	libxml_clear_errors();
        	
        	throw new RuntimeException( 'XML error', null, $e );
        } else {
	        try {
	        	$response = $this->unmarshaller->unmarshall($dom);
	        	
	        	if ($response->getStatus()=='erro') {
	        		throw new RuntimeException($response->getDescription());
	        	}
	        	
	        	return $response;
	        } catch (UnexpectedValueException $e) {
	        	throw new RuntimeException('Unmarshall problem', null, $e);
	        }
        }
	}
	
	/**
	 * Define a execução da operação no ambiente de testes.
	 * @return AkatusCartApi
	 */
	public function test() {
		$this->test = true;
		return $this;
	}
}