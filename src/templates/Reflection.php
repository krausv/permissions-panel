<?php
/**
 * Created by PhpStorm.
 * User: Vašík
 * Date: 20.2.2016
 * Time: 17:28
 */

namespace Krausv\PermissionsPanel;


class Reflection extends \ReflectionClass
{
    private $object;

    public function __construct($object)
    {
        parent::__construct($object);
        $this->object = $object;
    }

    /**
     * @param $property
     * @return mixed
     */
    public function getPropertyValue($property)
    {
        $reflection = $this->getProperty($property);
        $reflection->setAccessible(true);

        return $reflection->getValue($this->object);
    }
}