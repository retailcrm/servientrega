<?php

namespace App\Factory;

use App\Servientrega\ServientregaTrackingClient;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ServientregaTrackingClientFactory
 *
 * @package App\Factory
 */
class ServientregaTrackingClientFactory
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return ServientregaTrackingClient
     */
    public function factory(): ServientregaTrackingClient
    {
        return new ServientregaTrackingClient($this->serializer);
    }
}
