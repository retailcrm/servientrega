<?php

namespace App\Servientrega;

use App\Servientrega\RestType\CalculateRequest;
use App\Servientrega\RestType\CalculateResponse;
use App\Servientrega\RestType\ClientErrorResponse;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\LoginResponse;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ServientregaRestClient
 *
 * @see http://web.servientrega.com:8058/cotizadorcorporativo/doc
 */
class ServientregaRestClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var string|null
     */
    private $token;

    private const API_URL = 'http://web.servientrega.com:8058';

    public function __construct(?string $token = null)
    {
        $this->client = new Client(
            [
                'base_uri' => static::API_URL,
                'headers'  => ['Content-Type' => 'application/json'],
            ]
        );

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $encoders    = [new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(
                $classMetadataFactory, null, null, new PhpDocExtractor()
            ),
            new DateTimeNormalizer(),
        ];

        $this->serializer = new Serializer($normalizers, $encoders);

        $this->token = $token;
    }

    /**
     * Получение токена для запросов к API
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authenticationLogin(LoginRequest $login): LoginResponse
    {
        $data = $this->serializer->serialize($login, 'json');

        $response = $this->client->request(
            'POST',
            '/cotizadorcorporativo/api/autenticacion/login', ['body' => $data]
        );

        return $this->serializer->deserialize(
            $response->getBody()->getContents(), LoginResponse::class, 'json'
        );
    }

    /**
     * Производит расчет стоимости доставки
     *
     * @throws \Throwable
     */
    public function calculate(CalculateRequest $calculate): CalculateResponse
    {
        if (null === $this->token) {
            throw new \LogicException('`Token` is not defined');
        }

        $data = $this->serializer->serialize($calculate, 'json');

        try {
            $response = $this->client->request(
                'POST',
                '/cotizadorcorporativo/api/cotizacion/cotizar',
                [
                    'body'    => $data,
                    'headers' => [
                        'Authorization' => sprintf('Bearer %s', $this->token),
                    ],
                ]
            );
        } catch (\Throwable | ClientException | ServerException $exception) {
            if ($exception instanceof ClientException || $exception instanceof ServerException) {
                throw new \App\Servientrega\Exceptions\ClientException($this->serializer->deserialize(
                    $exception->getResponse()->getBody()->getContents(), ClientErrorResponse::class, 'json'
                ));
            }

            throw $exception;
        }

        return $this->serializer->deserialize(
            $response->getBody()->getContents(), CalculateResponse::class, 'json'
        );
    }
}
