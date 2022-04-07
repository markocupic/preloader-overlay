<?php

declare(strict_types=1);

/*
 * This file is part of Preloader Overlay Bundle.
 *
 * (c) Marko Cupic 2022 <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/preloader-overlay
 */

namespace Markocupic\PreloaderOverlay\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Config\ConfigInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Markocupic\PreloaderOverlay\MarkocupicPreloaderOverlay;

class Plugin implements BundlePluginInterface
{
    /**
     * @return array<ConfigInterface>
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(MarkocupicPreloaderOverlay::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
