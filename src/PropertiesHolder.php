<?php

namespace Harp\ExternalProperties;

use SplObjectStorage;

/**
 * Hold all the links between objects. It is useful to hold this information outside of the objects
 * themselves (in SplObjectStorage), So that the objects' footprint remain as small as possible.
 *
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
class PropertiesHolder
{
    /**
     * @var SplObjectStorage
     */
    private $holder;

    public function __construct()
    {
        $this->holder = new SplObjectStorage();
    }

    /**
     * @return SplObjectStorage
     */
    public function all()
    {
        return $this->holder;
    }

    /**
     * Get Links object associated with this object.
     * If there is none, an empty Links object is created.
     *
     * @param  object $object
     * @return Properties
     */
    public function get($object)
    {
        if ($this->has($object)) {
            return $this->holder[$object];
        } else {
            return $this->holder[$object] = new Properties($object);
        }
    }

    /**
     * @param PropertyInterface $property
     * @return self
     */
    public function addProperty(PropertyInterface $property)
    {
        $this->get($property->getParent())->add($property);

        return $this;
    }

    /**
     * @param  object $object
     * @return boolean
     */
    public function isEmpty($object)
    {
        if (! $this->has($object)) {
            return true;
        }

        return $this->get($object)->isEmpty();
    }

    /**
     * @param  object $object
     * @return boolean
     */
    public function has($object)
    {
        return $this->holder->contains($object);
    }

    /**
     * @return self
     */
    public function clear()
    {
        $this->holder = new SplObjectStorage();

        return $this;
    }
}
