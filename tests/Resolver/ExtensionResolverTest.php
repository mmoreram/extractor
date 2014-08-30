<?php

/**
 * This file is part of the Extractor package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace Extractor\tests\Resolver;

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
     */
    public function testZipExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\ZipExtractorAdapter',
            $this
                ->extensionResolver
                ->getAdapterNamespaceGivenExtension('zip')
        );
    }

    /**
     * Test rar extension
     */
    public function testRarExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\RarExtractorAdapter',
            $this
                ->extensionResolver
                ->getAdapterNamespaceGivenExtension('rar')
        );
    }

    /**
     * Test phar extension
     */
    public function testPharExtension()
    {
        $this->assertEquals(
            '\Mmoreram\Extractor\Adapter\PharExtractorAdapter',
            $this
                ->extensionResolver
                ->getAdapterNamespaceGivenExtension('phar')
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
