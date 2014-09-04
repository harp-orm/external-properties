<?php

namespace Harp\ExternalProperties\Test;

use Harp\ExternalProperties\PropertiesHolder;
use SplObjectStorage;

/**
 * @coversDefaultClass Harp\ExternalProperties\PropertiesHolder
 *
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
class PropertiesHolderTest extends AbstractTestCase
{
    /**
     * @covers ::__construct
     * @covers ::all
     */
    public function testConstructor()
    {
        $holder = new PropertiesHolder();

        $this->assertInstanceOf('SplObjectStorage', $holder->all());
    }

    /**
     * @covers ::get
     */
    public function testGet()
    {
        $holder = new PropertiesHolder();

        $object = new Extendable();

        $properties1 = $holder->get($object);

        $this->assertInstanceOf('Harp\ExternalProperties\Properties', $properties1);

        $properties2 = $holder->get($object);

        $this->assertSame($properties1, $properties2);
    }

    /**
     * @covers ::isEmpty
     */
    public function testIsEmpty()
    {
        $holder = new PropertiesHolder();

        $object = new Extendable();

        $property = new Property($object, 'test', 1);

        $this->assertTrue($holder->isEmpty($object));

        $properties = $holder->get($object);

        $this->assertTrue($holder->isEmpty($object));

        $properties->add($property);

        $this->assertFalse($holder->isEmpty($object));
    }

    /**
     * @covers ::addProperty
     */
    public function testAddProperty()
    {
        $holder = new PropertiesHolder();

        $object = new Extendable();

        $property = new Property($object, 'test', 1);

        $holder->addProperty($property);

        $this->assertEquals(['test' => $property], $holder->get($object)->all());
    }

    /**
     * @covers ::has
     */
    public function testHas()
    {
        $holder = new PropertiesHolder();

        $object = new Extendable();

        $this->assertFalse($holder->has($object));

        $properties = $holder->get($object);

        $this->assertTrue($holder->has($object));
    }

    /**
     * @covers ::clear
     */
    public function testCleaer()
    {
        $holder = new PropertiesHolder();

        $object = new Extendable();

        $properties = $holder->get($object);

        $this->assertTrue($holder->has($object));

        $holder->clear();

        $this->assertFalse($holder->has($object));

        $this->assertEquals(new SplObjectStorage(), $holder->all());
    }
}
