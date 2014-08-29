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
 
namespace Extractor\Tests\Resolver;

use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;
use Mmoreram\Extractor\Resolver\ExtensionResolver;
use PHPUnit_Framework_TestCase;

/**
 * Class ExtensionResolverTest
 */
class ExtensionResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test zip extension
     */
    public function testZipExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\ZipExtractorAdapter',
            ExtensionResolver::getAdapterNamespaceGivenExtension('zip')
        );
    }

    /**
     * Test rar extension
     */
    public function testRarExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\RarExtractorAdapter',
            ExtensionResolver::getAdapterNamespaceGivenExtension('rar')
        );
    }

    /**
     * Test phar extension
     */
    public function testPharExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\PharExtractorAdapter',
            ExtensionResolver::getAdapterNamespaceGivenExtension('phar')
        );
    }

    /**
     * Test unknown extension
     */
    public function testUnknownExtension()
    {
        try {
            ExtensionResolver::getAdapterNamespaceGivenExtension('/tmp/file.engonga');
            $this->fail();

        } catch (ExtensionNotSupportedException $e) {

        }
    }
}
 