<?php

namespace App\Utils;

use Symfony\Component\Translation\Loader\YamlFileLoader;

/**
 * Class Translator
 */
class Translator
{
    /**
     * @var string
     */
    private $translation;

    /**
     * @var string
     */
    private $locale;

    /**
     * Translator constructor.
     */
    public function __construct(string $translation, string $locale)
    {
        $this->translation = $translation;
        $this->locale      = $locale;
    }

    public function dump(): array
    {
        $fileLoader       = new YamlFileLoader();
        $messageCatalogue = $fileLoader->load(
            $this->translation . \DIRECTORY_SEPARATOR . 'vue.' . $this->locale . '.yaml',
            $this->locale
        );

        return [$this->locale => $messageCatalogue->all()['messages']];
    }
}
