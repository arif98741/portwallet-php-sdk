<?php


namespace Xenon\PortWallet\Services;


abstract class AbstractService
{
    protected $client;

    /**
     * AbstractService constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param $method
     * @param $path
     * @param $params
     * @param $opts
     * @return mixed
     */
    protected function request($method, $path, $params, $opts)
    {
        return $this->getClient()->request($method, $path, static::formatParams($params), $opts);
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    private static function formatParams($params)
    {
        if (null === $params) {
            return null;
        }
        \array_walk_recursive($params, function (&$value, $key) {
            if (null === $value) {
                $value = '';
            }
        });

        return $params;
    }
}
