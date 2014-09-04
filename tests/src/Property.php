<?php

namespace Harp\ExternalProperties\Test;

use Harp\ExternalProperties\PropertyInterface;

/**
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
class Property implements PropertyInterface
{
    private $parent;
    private $name;
    private $value;

    public function __construct($parent, $name, $value)
    {
        $this->parent = $parent;
        $this->name = $name;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getPropertyName()
    {
        return $this->name;
    }
}
