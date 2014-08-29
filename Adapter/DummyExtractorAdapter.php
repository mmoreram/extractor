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

namespace Mmoreram\Extractor\Adapter;

use Mmoreram\Extractor\Adapter\Abstracts\AbstractExtractorAdapter;
use Mmoreram\Extractor\Adapter\Interfaces\ExtractorAdapterInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class DummyExtractorAdapter
 */
class DummyExtractorAdapter extends AbstractExtractorAdapter implements ExtractorAdapterInterface
{
    /**
     * Extract files from a filepath
     *
     * @param string $filePath File path
     *
     * @return Finder
     */
    public function extract($filePath)
    {
        return Finder::create();
    }
}
 