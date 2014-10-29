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

namespace Mmoreram\Extractor\Adapter\Interfaces;

use Symfony\Component\Finder\Finder;

/**
 * Interface ExtractorAdapterInterface
 */
interface ExtractorAdapterInterface
{
    /**
     * Checks if current adapter can be used
     *
     * @return boolean Adapter usable
     */
    public function isAvailable();

    /**
     * Return the adapter identifier
     *
     * @return string Adapter identifier
     */
    public function getIdentifier();

    /**
     * Extract files from a filepath
     *
     * @param string $filePath File path
     *
     * @return Finder
     */
    public function extract($filePath);
}
