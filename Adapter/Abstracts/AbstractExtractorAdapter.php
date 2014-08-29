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

namespace Mmoreram\Extractor\Adapter\Abstracts;

use Symfony\Component\Finder\Finder;

/**
 * Class AbstractExtractorAdapter
 */
abstract class AbstractExtractorAdapter
{
    /**
     * Create finder from a directory
     *
     * @param string $directory Directory
     *
     * @return Finder
     */
    protected function createFinderFromDirectory($directory)
    {
        $finder = Finder::create();
        $finder->in($directory);

        return $finder;
    }

    /**
     * Returns new random temporary dir
     *
     * @return string Temporary dir
     */
    protected function getRandomTemporaryDir()
    {
        $tempfile = tempnam(sys_get_temp_dir(), '_extractor');

        if (file_exists($tempfile)) {
            unlink($tempfile);
        }

        mkdir($tempfile);

        return($tempfile);
    }
}
 