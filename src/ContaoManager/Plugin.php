<?php

namespace Markocupic\PreloaderOverlayBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * Class Plugin
 * @package Markocupic\PreloaderOverlayBundle\ContaoManager
 */
class Plugin implements BundlePluginInterface
{

    /**
     * @param ParserInterface $parser
     * @return array|\Contao\ManagerPlugin\Bundle\Config\ConfigInterface[]
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('Markocupic\PrelaoderOverlayBundle\MarkocupicPrelaoderOverlayBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle']),
        ];
    }
}
