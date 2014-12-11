<?php
// incluir o autoload para o zf2
require_once("autoload-zend.php");
 
if (isset($_GET['wsdl'])) {
        // geracao automatica do WSDL
        $autodiscover = new Zend\Soap\AutoDiscover();
        $autodiscover->setUri('http://www.dums.com.br/WSCalculadora/soap-server.php');
 
        // servindo a classe Calculadora
        $autodiscover->setClass('Calculadora');
        $autodiscover->handle();
} else {
        // instancia do Soao Server
        $soap = new Zend\Soap\Server("http://www.dums.com.br/WSCalculadora/soap-server.php?wsdl");
 
        // servindo a classe Calculadora
        $soap->setClass('Calculadora');
        $soap->handle();
        exit;
}
 
/*
 * Classe calculadora
 */
class Calculadora {
 
        /**
         * Realiza Soma
         * @param integer $a
         * @param integer $b
         * @return integer
         */
        public function soma($a, $b) {
                return $a + $b;
        }
 
        /**
         * Realiza Subtracao
         * @param integer $a
         * @param integer $b
         * @return integer
         */
        public function subtrai($a, $b) {
                return $a - $b;
        }
}
