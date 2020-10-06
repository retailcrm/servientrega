<?php


namespace App\Utils;

use Symfony\Component\Translation\Loader\YamlFileLoader;

/**
 * Class Translator
 *
 * @package App\Utils
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
     *
     * @param string $translation
     * @param string $locale
     */
    public function __construct(string $translation, string $locale)
    {
        $this->translation = $translation;
        $this->locale = $locale;
    }

    /**
     * @return array
     */
    public function dump(): array
    {
        $fileLoader = new YamlFileLoader();
        $messageCatalogue = $fileLoader->load(
            $this->translation . \DIRECTORY_SEPARATOR . 'vue.' . $this->locale . '.yaml',
            $this->locale
        );

        return [$this->locale => $messageCatalogue->all()['messages']];
    }
}
