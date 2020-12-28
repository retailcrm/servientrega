<?php

namespace App\Servientrega;

use App\Servientrega\TrackingType\ArrayOfGuiasDTO;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ServientregaTrackingClient
 */
class ServientregaTrackingClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    private const API_URL = 'http://sismilenio.servientrega.com.co';

    public function __construct(SerializerInterface $serializer)
    {
        $this->client = new Client(
            [
                'base_uri' => static::API_URL,
                'headers'  => ['Content-Type' => 'application/x-www-form-urlencoded'],
            ]
        );

        $this->serializer = $serializer;
    }

    /**
     * @param string[] $trackNumbers
     *
     * @return ArrayOfGuiasDTO
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDeliveryStatus(array $trackNumbers)
    {
        if (empty($trackNumbers)) {
            throw new \InvalidArgumentException('Track numbers not specified');
        }

        if (count($trackNumbers) > 1) {
            $trackNumbers = implode(',', $trackNumbers);
        } else {
            $trackNumbers = $trackNumbers[0];
        }

        $response = $this->client->request(
            'POST',
            '/wsrastreoenvios/wsrastreoenvios.asmx/ConsultarInfoGuias',
            [
                'form_params' => [
                    'NumerosGuias' => $trackNumbers,
                ],
            ]
        );

        return $this->serializer->deserialize(
            $response->getBody()->getContents(), ArrayOfGuiasDTO::class, 'xml'
        );
    }
}
