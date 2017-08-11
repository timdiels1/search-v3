<?php

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\TypeParser;
use JMS\Serializer\Annotation\HandlerCallback;

class Collection
{

    protected $contextMapping = [
        '/contexts/event' => Event::class,
        '/contexts/place' => Place::class
    ];

    protected $items = [];

    /**
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Collection
     */
    public function setItems($items) {
        $this->items = $items;

        return $this;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $values, DeserializationContext $context)
    {
        $deserializationContext = DeserializationContext::create()
            ->setSerializeNull(true);

        $memberVisitor = clone $visitor;

        $deserializationContext->initialize(
            'json',
            $memberVisitor,
            $context->getNavigator(),
            $context->getMetadataFactory()
        );

        $typeParser = new TypeParser();
        $metadata = [];
        foreach ($values as $member) {

            // If context is given, we have a full entity.
            if (isset($member['@context'])) {
                $class = $this->contextMapping[$member['@context']];
                $metadata[$class] = $metadata[$class] ?? $deserializationContext->getMetadataFactory()->getMetadataForClass($class);

                $object = new $class();
                $memberVisitor->startVisitingObject($metadata[$class], $object, $typeParser->parse($class), $deserializationContext);

                $properties = $metadata[$class]->propertyMetadata;
                foreach ($properties as $property) {
                    $memberVisitor->visitProperty($property, $member, $deserializationContext);
                }

                $this->items[] = $object;
            }
            // If not, we only have id + type. Just copy the array.
            else {
                $this->items[] = $member;
            }


        }
    }

}