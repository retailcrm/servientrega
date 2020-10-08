<?php

namespace App\ArgumentResolver;

abstract class AbstractResolver
{
    protected $validator;

    protected function validate($dto): void
    {
        $errors = $this->validator->validate($dto);
        if (0 !== count($errors)) {
            throw new \InvalidArgumentException($errors);
        }
    }
}
