<?php
// incluir o autoload para o zf2
require_once("autoload-zend.php");
 
// canal de comunicacao com o webservice, apontar para a URL do WSDL
$soap = new Zend\Soap\Client("http://127.0.0.1/WSTeste/soap-server.php?wsdl");
 
// utilizando as funcoes do webservice
echo $soap->soma(5, 5) . "<br />"; // 10
echo $soap->subtrai(100, 50) . "<br />"; // 50
echo $soap->soma(30, 15) . "<br />"; //Resultado 45
