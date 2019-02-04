<?php


namespace Mindbox\DTO;

/**
 * Class SmsConfirmationRequestDTO
 *
 * @package Mindbox\DTO
 * @property string code
 **/
class SmsConfirmationRequestDTO extends DTO
{
    /**
     * @var string DTO name.
     */
    protected static $xmlName = 'smsConfirmation';

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->setField('code', $code);
    }
}