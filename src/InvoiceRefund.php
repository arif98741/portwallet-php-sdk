<?php


namespace Xenon\PortWallet;


class InvoiceRefund extends BaseObject
{
    /**
     * @var mixed
     */
    public $order;

    /**
     * @var mixed
     */
    public $refund;

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getRefund()
    {
        return $this->refund;
    }

    protected function setContent(object $content)
    {
        $this->order = $content->order;
        $this->refund = $content->refund;
    }
}
