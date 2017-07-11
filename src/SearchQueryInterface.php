<?php

namespace CultuurNet\SearchV3;

/**
 * SearchQuery
 * @package CultuurNet\SearchV3
 */
interface SearchQueryInterface
{

    /**
    * Sorting options.
    */
    const SORT_DIRECTION_ASC = 'asc';
    const SORT_DIRECTION_DESC = 'desc';

    /**
    * Add a parameter to the search query.
    * @param ParameterInterface $parameter
    */
    public function addParameter(ParameterInterface $parameter);

    /**
    * Get the parameters.
    * @return array
    */
    public function getParameters();

    /**
    * Add a sort to the search query.
    */
    public function addSort(string $field, string $direction);

    /**
    * Add a sort to the search query.
    */
    public function removeSort(string $field);

    /**
    * Get the sorting options.
    * @return array
    */
    public function getSort();

    public function setEmbed(bool $embed);

    /**
    * Cast the search query to an array.
    */
    public function toArray();
}