<?php

/*
 * This file is part of the Extractor package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace Mmoreram\Extractor\tests\Resolver;

use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;
use Mmoreram\Extractor\Resolver\ExtensionResolver;
use Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface;
use PHPUnit_Framework_TestCase;

/**
 * Class ExtensionResolverTest
 */
class ExtensionResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ExtensionResolverInterface
     *
     * Extension Resolver
     */
    protected $extensionResolver;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->extensionResolver = new ExtensionResolver();
    }

    /**
     * Test zip extension
     *
     * @dataProvider dataTestExtension
     */
    public function testExtension($extension, $adapterNamespace)
    {
        $this->assertEquals(
            $adapterNamespace,
            $this
                ->extensionResolver
                ->getAdapterNamespaceGivenExtension($extension)
        );
    }

    /**
     * Data for test extensions
     */
    public function dataTestExtension()
    {
        return array(
            array('zip', '\Mmoreram\Extractor\Adapter\ZipExtractorAdapter'),
            array('rar', '\Mmoreram\Extractor\Adapter\RarExtractorAdapter'),
            array('phar', '\Mmoreram\Extractor\Adapter\PharExtractorAdapter'),
            array('tar', '\Mmoreram\Extractor\Adapter\TarExtractorAdapter'),
            array('gz', '\Mmoreram\Extractor\Adapter\TarGzExtractorAdapter'),
            array('bz2', '\Mmoreram\Extractor\Adapter\TarBz2ExtractorAdapter'),
        );
    }

    /**
     * Test unknown extension
     */
    public function testUnknownExtension()
    {
        try {
            $this
                ->extensionResolver
                ->getAdapterNamespaceGivenExtension('/tmp/file.engonga');

            $this->fail();

        } catch (ExtensionNotSupportedException $e) {

        }
    }
}
