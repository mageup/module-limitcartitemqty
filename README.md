# Extensão Limitar Quantidade de Itens no Carrinho para Magento 2 (Magento CE 2)
Com este módulo é possível limitar a quantidade de itens que seu cliente possui no carrinho em cada compra, possibilitando que se limite uma quantidade personalizada e que quando o limite seja atingido, uma mensagem informativa é apresentada ao seu cliente (mensagem personalizada via Admin).
## Instalação
### Instalar usando o [composer](https://getcomposer.org/):

1. Entre na pasta raíz da sua instalação
2. Digite o seguinte comando:
    ```bash
    composer require mageup/module-limitcartitemqty:dev-master
    ```

3. Digite os seguintes comandos, no terminal, para habilitar o módulo:

    ```bash
    php bin/magento module:enable Trezo_LimitCartItemQty --clear-static-content
    php bin/magento setup:upgrade
    ```
### ou baixar e instalar manualmente:


* Criar a seguinte estrutura de pastas app/code/Trezo/LimitCartItemQty
* Baixe a ultima versão [aqui](https://codeload.github.com/mageup/module-limitcartitemqty/zip/master)
* Descompacte o arquivo baixado e copie as pastas para dentro do diretório criado no início
* Digite os seguintes comandos, no terminal, para habilitar o módulo:

    ```bash
    php bin/magento module:enable Trezo_LimitCartItemQty --clear-static-content
    php bin/magento setup:upgrade
    ```
