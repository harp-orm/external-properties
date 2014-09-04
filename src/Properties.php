<?php

namespace Harp\ExternalProperties;

/**
 * A class holding all the links for a given model. LinkMap holds Links objects.
 * Allows retrieving all the linked models recursively.
 *
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
class Properties
{
    /**
     * @var AbstractLink[]
     */
    private $properties = [];

    /**
     * @return PropertyInterface[]
     */
    public function all()
    {
        return $this->properties;
    }

    /**
     * @param  PropertyInterface $property
     * @return self
     */
    public function add(PropertyInterface $property)
    {
        $name = $property->getPropertyName();

        $this->properties[$name] = $property;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->properties);
    }

    /**
     * @param  string            $name
     * @return PropertyInterface|null
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->properties[$name];
        }
    }

    /**
     * @return self
     */
    public function clear()
    {
        $this->properties = [];

        return $this;
    }


    /**
     * @param  string  $name
     * @return boolean
     */
    public function has($name)
    {
        return isset($this->properties[$name]);
    }

}
