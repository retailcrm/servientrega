<?php

namespace App\Factory;

use App\Servientrega\ServientregaTrackingClient;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ServientregaTrackingClientFactory
 */
class ServientregaTrackingClientFactory
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function factory(): ServientregaTrackingClient
    {
        return new ServientregaTrackingClient($this->serializer);
    }
}
