External Properties
===================

[![Build Status](https://travis-ci.org/harp-orm/external-properties.png?branch=master)](https://travis-ci.org/harp-orm/external-properties)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/external-properties/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/external-properties/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/external-properties/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/external-properties/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/external-properties/v/stable.png)](https://packagist.org/packages/harp-orm/external-properties)

Object properties, held outside the object itself

Usage
-----

```php
$object = new MyObject();
$holder = new PropertiesHolder();

// This will give you the properties for this specific object
// It will always return the same properties for the same object
$properties = $holder->get($object);

$properties2 = $holder->get($object);
echo $properties === $properties2; // true

// You'll need some "Property" classes of your own to define
class Property implements PropertyInterface
{
    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getPropertyName()
    {
        return $this->name;
    }
}


$property = new Property('test', 12);

// And now you can add them to the "properties" of the object

$holder->get($object)->add($property);

$holder->get($object)->get('test1');
```

License
-------

Copyright (c) 2014, ClippingsLtd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
