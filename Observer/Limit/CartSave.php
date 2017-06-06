<?php
/**
* Trezo
*
* NOTICE OF LICENSE
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade Magento to newer
* versions in the future. If you wish to customize Magento for your
* needs please refer to http://www.bseller.com.br for more information.
*
* @category Trezo
* @package Trezo_LimitCartItemQty
*
* @copyright Copyright (c) 2017 Trezo. (http://www.trezo.com.br)
*
* @author Bruno Roeder <bruno@trezo.com.br>
*/

namespace Trezo\LimitCartItemQty\Observer\Limit;

class CartSave implements \Magento\Framework\Event\ObserverInterface
{
    protected $_checkoutSession;
    protected $_scopeConfig;
    protected $_logger;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_scopeConfig         = $scopeConfig;
        $this->_checkoutSession     = $checkoutSession;
        $this->_logger              = $logger;
    }

    /**
     * Execute observer, limiting the qty of intens in cart
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        if ($this->_scopeConfig->getValue(
            'limitcartitemqty/configuration/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )) {
            $object      = $observer->getObject();
            // only cart item
            if ($object instanceof \Magento\Quote\Model\Quote\Item) {
                $totalQtyInCart = $object->getQuote()->getItemsQty();
                $maxItemsQtyInCart = $this->_scopeConfig->getValue(
                    'limitcartitemqty/configuration/max_item_qty',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                );

                if ($totalQtyInCart > $maxItemsQtyInCart) {
                    $erroMessage = $this->_scopeConfig->getValue(
                        'limitcartitemqty/configuration/error_message',
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                    );
                    throw new \Magento\Framework\Exception\LocalizedException(__(sprintf($erroMessage, $maxItemsQtyInCart)));
                }
            }
        }
    }
}
