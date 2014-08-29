<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Extractor\tests;

use Mmoreram\Extractor\Extractor;
use PHPUnit_Framework_TestCase;

/**
 * Class ExtractorTest
 */
class ExtractorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests extractFromFile
     */
    public function testExtractFromFile()
    {
        $fileName = dirname(__FILE__) . '/Adapter/Fixtures/phar.phar';

        $extensionResolver = $this
            ->getMock('\Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface');

        $extensionResolver
            ->expects($this->any())
            ->method('getAdapterNamespaceGivenExtension')
            ->will($this->returnValue('Mmoreram\Extractor\Adapter\DummyExtractorAdapter'));

        $extractor = new Extractor($extensionResolver);

        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            $extractor->extractFromFile($fileName)
        );
    }
}
