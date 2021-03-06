<?php

namespace App\ArgumentResolver;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class RetailcrmCallbackResolver implements ArgumentValueResolverInterface
{
    private $serializer;
    private $denormalizer;
    private $params;

    public function __construct(
        SerializerInterface $serializer,
        DenormalizerInterface $denormalizer,
        ParameterBagInterface $params
    ) {
        $this->serializer   = $serializer;
        $this->denormalizer = $denormalizer;
        $this->params       = $params;
    }

    public function supports(Request $request, ArgumentMetadata $argument)
    {
        $parameter = array_search($argument->getType(), $this->params->get('retailcrm_callback'), true);

        return in_array($argument->getType(), $this->params->get('retailcrm_callback'))
            && !empty($request->get($parameter));
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $parameter = array_search($argument->getType(), $this->params->get('retailcrm_callback'), true);
        $data      = $request->get($parameter);

        yield $this->serializer->deserialize($data, $argument->getType(), 'json');
    }
}
