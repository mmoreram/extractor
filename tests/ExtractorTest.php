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

namespace Mmoreram\Extractor\tests;

use Mmoreram\Extractor\Exception\AdapterNotAvailableException;
use Mmoreram\Extractor\Exception\FileNotFoundException;
use Mmoreram\Extractor\Extractor;
use Mmoreram\Extractor\Filesystem\TemporaryDirectory;
use Mmoreram\Extractor\Resolver\ExtensionResolver;
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
        $fileName = dirname(__FILE__) . '/Adapter/Fixtures/file.phar';

        $extensionResolver = $this
            ->getMock('\Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface');

        $extensionResolver
            ->expects($this->any())
            ->method('getAdapterNamespaceGivenExtension')
            ->will($this->returnValue('Mmoreram\Extractor\Adapter\DummyExtractorAdapter'));

        $filesystem = new TemporaryDirectory();
        $extractor = new Extractor($filesystem, $extensionResolver);

        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            $extractor->extractFromFile($fileName)
        );
    }

    /**
     * Tests extractFromFile
     */
    public function testExtractFromNonExistingFile()
    {
        $fileName = dirname(__FILE__) . '/Adapter/Fixtures/phar2.phar';

        $extensionResolver = $this
            ->getMock('\Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface');

        $extensionResolver
            ->expects($this->any())
            ->method('getAdapterNamespaceGivenExtension')
            ->will($this->returnValue('Mmoreram\Extractor\Adapter\DummyExtractorAdapter'));

        $filesystem = new TemporaryDirectory();
        $extractor = new Extractor($filesystem, $extensionResolver);

        try {
            $extractor->extractFromFile($fileName);
            $this->fail();
        } catch (FileNotFoundException $e) {

        }
    }

    /**
     * Tests extractFromFile
     */
    public function testExtractWithNotAvailableAdapter()
    {
        $fileName = dirname(__FILE__) . '/Adapter/Fixtures/file.phar';

        $extractorAdapterInterface = $this
            ->getMock('\Mmoreram\Extractor\Adapter\Interfaces\ExtractorAdapterInterface');

        $extractorAdapterInterface
            ->expects($this->any())
            ->method('isAvailable')
            ->will($this->returnValue(false));

        $extensionResolver = $this
            ->getMock('\Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface');
        $filesystem = new TemporaryDirectory();

        $extractor = $this
            ->getMockBuilder('\Mmoreram\Extractor\Extractor')
            ->setConstructorArgs(array($filesystem, $extensionResolver))
            ->setMethods(array('instanceExtractorAdapter'))
            ->getMock();

        $extractor
            ->expects($this->any())
            ->method('instanceExtractorAdapter')
            ->will($this->returnValue($extractorAdapterInterface));

        try {
            $extractor->extractFromFile($fileName);
            $this->fail();
        } catch (AdapterNotAvailableException $e) {

        }
    }

    /**
     * Tests extractFromFile
     */
    public function testExtractWithMultiExtension()
    {
        $fileName = dirname(__FILE__) . '/Adapter/Fixtures/file.tar.gz';

        $extensionResolver = new ExtensionResolver();
        $filesystem = new TemporaryDirectory();
        $extractor = new Extractor($filesystem, $extensionResolver);

        try {
            $extractor->extractFromFile($fileName);
        } catch (AdapterNotAvailableException $e) {
            $this->fail();
        }
    }
}
