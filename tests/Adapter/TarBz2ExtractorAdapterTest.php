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

namespace Extractor\tests\Adapter;

use Mmoreram\Extractor\Adapter\TarBz2ExtractorAdapter;
use PHPUnit_Framework_TestCase;

/**
 * Class TarBz2ExtractorAdapterTest
 */
class TarBz2ExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $pharExtractorAdapter = new TarBz2ExtractorAdapter();
        if (!$pharExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('Phar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $tarExtractorAdapter = new TarBz2ExtractorAdapter();
        $finder = $tarExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/file.tar.bz2');

        $this->assertEquals($finder->count(), 3);
    }
}
