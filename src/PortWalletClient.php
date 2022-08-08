<?php

namespace Xenon\PortWallet;

use Xenon\PortWallet\Services\CoreServiceFactory;
use Xenon\PortWallet\Services\InvoiceService;
use Xenon\PortWallet\Services\RecurringService;

/**
 * Client used to send requests to PortWallet's API.
 *
 * @property InvoiceService $invoice
 * @property RecurringService $recurring
 */
class PortWalletClient extends BasePortWalletClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
