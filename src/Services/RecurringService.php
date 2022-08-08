<?php

namespace Xenon\PortWallet\Services;


use Xenon\PortWallet\Exceptions\BadRequestException;
use Xenon\PortWallet\Exceptions\InternalServiceException;
use Xenon\PortWallet\Exceptions\NotFoundException;
use Xenon\PortWallet\Exceptions\PortWalletClientException;
use Xenon\PortWallet\Exceptions\UnauthorizedException;
use Xenon\PortWallet\Invoice;
use Xenon\PortWallet\Recurring;
use Xenon\PortWallet\RecurringCancel;
use Xenon\PortWallet\Traits\ResponseTrait;

class RecurringService extends AbstractService
{
    use ResponseTrait;

    /**
     * Create a new recurring
     *
     * @param array $data
     * @return Invoice
     * @throws PortWalletClientException
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws InternalServiceException
     */
    public function create(array $data): Invoice
    {
        $url = '/recurring';
        $response = $this->client->request('POST', $url, [], $data);
        $content = $this->getContent($response);

        return new Invoice($content);
    }

    /**
     * Get recurring
     *
     * @param string $invoiceId
     * @return Recurring
     * @throws PortWalletClientException
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws InternalServiceException
     */
    public function retrieve(string $invoiceId)
    {
        $url = '/recurring/' . 'R' . $invoiceId;
        $response = $this->client->request('GET', $url);
        $content = $this->getContent($response);

        return new Recurring($content);
    }

    /**
     * Cancel recurring
     *
     * @param string $invoiceId
     * @param array $data
     * @return RecurringCancel
     * @throws PortWalletClientException
     * @throws BadRequestException
     * @throws NotFoundException
     * @throws UnauthorizedException
     * @throws InternalServiceException
     */
    public function cancel(string $invoiceId, array $data): RecurringCancel
    {
        $url = '/recurring/cancel/' . 'R' . $invoiceId;
        $response = $this->client->request('PUT', $url, $data);
        $content = $this->getContent($response);

        return new RecurringCancel($content);
    }
}
