<?php

namespace App\ArgumentResolver;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestDtoResolver extends AbstractResolver implements ArgumentValueResolverInterface
{
    private $serializer;
    private $denormalizer;
    private $params;

    public function __construct(
        SerializerInterface $serializer,
        DenormalizerInterface $denormalizer,
        ValidatorInterface $validator,
        ParameterBagInterface $params
    ) {
        $this->serializer = $serializer;
        $this->denormalizer = $denormalizer;
        $this->validator = $validator;
        $this->params = $params;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return in_array($argument->getType(), $this->params->get('dto_arguments'));
    }

    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        if (Request::METHOD_GET === $request->getMethod()) {
            $data = $request->query->all();

            $dto = $this->denormalizer->denormalize(
                $data,
                $argument->getType()
            );
        } else {
            $data = $request->getContent();

            $dto = $this->serializer->deserialize(
                $data,
                $argument->getType(),
                'json'
            );
        }

        $this->validate($dto);

        yield $dto;
    }
}
