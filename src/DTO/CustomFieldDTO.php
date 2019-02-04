<?php


namespace Mindbox\DTO;

/**
 * Trait CustomFieldDTO
 * @package Mindbox\DTO
 */
trait CustomFieldDTO
{
    /**
     * @param $name
     *
     * @return string|null
     */
    public function getCustomField($name)
    {
        $fields = $this->getCustomFields();
        return !empty($fields[$name]) ? $fields[$name] : null;
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getField('customFields');
    }
}