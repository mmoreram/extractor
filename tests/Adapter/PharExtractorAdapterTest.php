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

use Mmoreram\Extractor\Adapter\PharExtractorAdapter;
use PHPUnit_Framework_TestCase;

/**
 * Class PharExtractorAdapterTest
 */
class PharExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $pharExtractorAdapter = new PharExtractorAdapter();
        if (!$pharExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('PHP Phar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $pharExtractorAdapter = new PharExtractorAdapter();
        $finder = $pharExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/phar.phar');

        $this->assertEquals($finder->count(), 3);
    }
}
