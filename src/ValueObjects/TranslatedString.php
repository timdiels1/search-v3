<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Annotation\HandlerCallback;

/**
 * Provides a value object for translated strings like name and description.
 */
class TranslatedString
{
    /**
     * Translations
     *
     * @var string[]
     */
    protected $values = [];

    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    public function getValueForLanguage(string $langcode): string
    {
        return $this->values[$langcode] ?? '';
    }

    /**
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): void
    {
        $this->values = $values;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(
        JsonDeserializationVisitor $visitor,
        $value,
        DeserializationContext $context
    ): void {
        // Some properties are not translated yet in the api. Force them as nl.
        $this->values = is_array($value) ? $value : ['nl' => $value];
    }
}
