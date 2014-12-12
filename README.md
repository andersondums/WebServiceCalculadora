WebServiceCalculadora
=====================

WebService em PHP com ZendFramework e consumo em Progress 4GL e Android

Obs: Caso o objetivo seja apenas testar o webservice o mesmo está ativo em www.dums.com.br/WSCalculadora/soap-server.php?wsdl, através da URL http://www.dums.com.br/WSCalculadora/soap-client.php poderá ver o resultado do uso das operações soma e subtrai do WS.

Obs2: Caso crie o seu WebService com alguma nova operação e ao tentar executar o mesmo retorne o erro de <faultstring>Procedure 'abc' not present</faultstring>, exclua os arquivos wsdl gerados automaticamente na pasta temp do seu servidor (exemplo: rm /tmp/wsdl-*)

Repositório dividido em 3 diretórios:
* WSCalculadora: WebService, deve ser baixado no servidor, exemplo /var/www/html (manter o diretório WSCalculadora,ficaria como /var/www/html/WSCalculadora), contendo os arquivos:
    - autoload-zend.php: arquivo para load das includes do PHP (não necessita de alteração)
    - soap-server.php: arquivo do webservice em sí, este arquivo contém as operações a serem executadas no webservice, deve ser alterado as linhas 8 e 15, onde está http://www.dums.com.br/ pelo caminho do servidor onde estará hospeado o webservice (http://localhost/ por exemplo)
    - soap-client.php: arquivo de exemplo de consumo do webservice, deve ser alterado a linha 7, onde está http://www.dums.com.br/ pelo caminho do servidor onde estará hospeado o webservice (http://localhost/ por exemplo)
    - Além das alterações citadas acima, deve ser baixado dentro do diretório WSCalculadora o ZendFramework (disponivel em http://framework.zend.com/downloads/latest, a forma de download depende do ambiente - win, linux ou mac). Feito o download deve ser recortada o diretório Zend de dentro de library para ficar diretamente relacionado ao diretório WSCalculadora.
  Com as alterações acima o diretório onde estará o WebService ficará com a seguinte estrutura (considerando que o mesmo está em http://localhost/WSCalculadora):
    * WSCalculadora
      + autoload-zend.php
      + soap-server.php
      + soap-client.php
      + Zend (dir)
      + Zend-Framework-x-x-x (dir)
