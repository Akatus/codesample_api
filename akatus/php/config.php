<?php
/**
 * Pacote de integração com a API da Akatus
 * @package akatus\php
 */

//configuração do include_path
ini_set('include_path', implode(PATH_SEPARATOR, array_unique(
	array_merge(
		array(realpath(dirname(__FILE__).'/../..')),
		explode(PATH_SEPARATOR, ini_get('include_path'))
	)
)));

/**
 * Função para carregamento automático das classes de integração.
 * @param string $class Nome da classe
 */
function akatus__autoload($class) {
	require 'akatus/php/'.basename($class).'.php';
}

//registra a função autoload
spl_autoload_register('akatus__autoload',true);