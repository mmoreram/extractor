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

namespace Mmoreram\Extractor\Resolver;

use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;
use Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface;

/**
 * Class ExtensionResolver
 */
class ExtensionResolver implements ExtensionResolverInterface
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
    public function getAdapterNamespaceGivenExtension($fileExtension)
    {
        $adapterNamespace = '\Mmoreram\Extractor\Adapter\\';

        switch ($fileExtension) {

            case 'zip':
                $adapterNamespace .= 'ZipExtractorAdapter';
                break;

            case 'rar':
                $adapterNamespace .= 'RarExtractorAdapter';
                break;

            case 'phar':
                $adapterNamespace .= 'PharExtractorAdapter';
                break;

            case 'tar':
                $adapterNamespace .= 'TarExtractorAdapter';
                break;

            case 'gz':
                $adapterNamespace .= 'TarGzExtractorAdapter';
                break;

            case 'bz2':
                $adapterNamespace .= 'TarBz2ExtractorAdapter';
                break;

            default:
                throw new ExtensionNotSupportedException($fileExtension);
        }

        return $adapterNamespace;
    }
}
