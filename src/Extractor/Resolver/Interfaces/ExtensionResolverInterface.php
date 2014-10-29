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

namespace Mmoreram\Extractor\Resolver\Interfaces;

use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;

/**
 * Interface ExtensionResolverInterface
 */
interface ExtensionResolverInterface
{
    /**
     * Return a extractor adapter namespace given an extension
     *
     * @param string $fileExtension File extension
     *
     * @return string Adapter namespace
     *
     * @throws ExtensionNotSupportedException Exception not found
     */
    public function getAdapterNamespaceGivenExtension($fileExtension);
}
