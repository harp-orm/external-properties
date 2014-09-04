<?php

namespace Harp\ExternalProperties;

/**
 * @author     Ivan Kerin <ikerin@gmail.com>
 * @copyright  (c) 2014 Clippings Ltd.
 * @license    http://spdx.org/licenses/BSD-3-Clause
 */
interface PropertyInterface
{
    /**
     * @return string
     */
    public function getPropertyName();

    /**
     * @return object
     */
    public function getParent();
}
