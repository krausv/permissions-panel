<?php
/**
 * This file is part of the krausv/permissions-panel
 *
 * Copyright (c) 2016 Vaclav Kraus (krauva@gmail.com)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this
 * source code.
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