<?php
 /**
 * RiseCore Technologies Pvt Ltd, Lucknow, India
 *
 * Copyright © Risecommerce. All rights reserved.
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer version in the future.
 * If you wish to customise this module for your needs.
 * Please contact us https://risecommerce.com/contact
 *
 * @category    Risecommerce
 * @package     Risecommerce_StorePickup
 * @developer   Amarjeet Prajapati (amarjeet.wdev@gmail.com)
 * @copyright   Copyright (c) Risecommerce (https://www.risecommerce.com/)
 * @license     https://www.risecommerce.com/LICENSE.txt
 */

namespace Risecommerce\StorePickup\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;

/**
 * Class StorePickup
 * @package Risecommerce\StorePickup\Model\Carrier
 */
class StorePickup extends AbstractCarrier implements CarrierInterface
{
    /**
     * Constant defining shipping code for method
     */
    const SHIPPING_CODE = 'storepickup';

    /**
     * @var string
     */
    public $_code = self::SHIPPING_CODE;

    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    public $rateResultFactory;

    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    public $rateMethodFactory;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array $data = []
    ) {
        $this->rateResultFactory = $rateResultFactory;
        $this->rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return [self::SHIPPING_CODE => $this->getConfigData('name')];
    }

    /**
     * @param RateRequest $request
     * @return bool|Result
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getActiveFlag()) {
            return false;
        }

        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->rateResultFactory->create();
        $shippingPrice = $this->getConfigData('price');
        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->rateMethodFactory->create()
            ->setCarrier(self::SHIPPING_CODE)
            ->setCarrierTitle($this->getConfigData('title'))
            ->setMethod(self::SHIPPING_CODE)
            ->setMethodTitle($this->getConfigData('name'))
            ->setPrice($shippingPrice)
            ->setCost($shippingPrice);
        $result->append($method);
        return $result;
    }
}