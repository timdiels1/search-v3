<?php

namespace CultuurNet\SearchV3\Parameter;

/**
 * Provides a parameter to search on languages.
 */
class Languages extends AbstractParameter
{
    const LANG_NL = 'nl';
    const LANG_FR = 'fr';
    const LANG_DE = 'de';
    const LANG_EN = 'en';

    /**
     * Languages constructor.
     * @param $language
     *
     * @throws \Exception when language is not one of the constants.
     */
    public function __construct($language)
    {
        if (in_array($language, self::getConstants())) {
            $this->value = $language;
            $this->key = 'languages';
        } else {
            throw new \Exception('Invalid language parameter for '.__CLASS__.' constructor');
        }
    }

    protected static function getConstants()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}