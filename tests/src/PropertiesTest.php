<?php

namespace Harp\ExternalProperties\Test;

use Harp\ExternalProperties\Properties;

/**
 * @coversDefaultClass Harp\ExternalProperties\Properties
 *
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
class PropertiesTest extends AbstractTestCase
{
    /**
     * @covers ::all
     */
    public function testConstructor()
    {
        $properties = new Properties();

        $this->assertInternalType('array', $properties->all());
    }

    /**
     * @covers ::add
     */
    public function testAdd()
    {
        $properties = new Properties();
        $object = new Extendable();

        $property1 = new Property($object, 'test1', 1);
        $property2 = new Property($object, 'test2', 2);

        $properties
            ->add($property1)
            ->add($property2);

        $this->assertSame(['test1' => $property1, 'test2' => $property2], $properties->all());
    }

    /**
     * @covers ::get
     */
    public function testGet()
    {
        $properties = new Properties();
        $object = new Extendable();

        $property1 = new Property($object, 'test1', 1);
        $property2 = new Property($object, 'test2', 2);

        $properties
            ->add($property1)
            ->add($property2);

        $this->assertSame($property1, $properties->get('test1'));
        $this->assertSame($property2, $properties->get('test2'));
        $this->assertNull($properties->get('test3'));
    }

    /**
     * @covers ::isEmpty
     */
    public function testIsEmpty()
    {
        $properties = new Properties();
        $object = new Extendable();

        $property = new Property($object, 'test1', 1);

        $this->assertTrue($properties->isEmpty());

        $properties->add($property);

        $this->assertFalse($properties->isEmpty());
    }

    /**
     * @covers ::has
     */
    public function testHas()
    {
        $properties = new Properties();
        $object = new Extendable();

        $property = new Property($object, 'test1', 1);

        $this->assertFalse($properties->has('test1'));

        $properties->add($property);

        $this->assertTrue($properties->has('test1'));
    }

    /**
     * @covers ::clear
     */
    public function testCleaer()
    {
        $properties = new Properties();
        $object = new Extendable();

        $property = new Property($object, 'test1', 1);

        $properties->add($property);

        $properties->clear();

        $this->assertEquals([], $properties->all());
    }
}
