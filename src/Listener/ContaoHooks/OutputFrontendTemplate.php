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

namespace Markocupic\PreloaderOverlay\Listener\ContaoHooks;

class OutputFrontendTemplate
{
    public function onOutputFrontendTemplate(string $buffer, string $template): string
    {
        if (0 === strpos($template, 'fe_')) {
            $pattern = '/<!-- Start preloader overlay(.*?)-->(.*)<!-- End preloader overlay(.*?)-->/s';

            if (preg_match($pattern, $buffer, $matches)) {
                // Cut overlay
                $buffer = preg_replace($pattern, '', $buffer);

                // Use backreferences & paste overlay into new position
                $replacement = '<body${1}>'.$matches[2].'${2}</body>';
                $buffer = preg_replace('/<body(.*?)>(.*)<\/body>/s', $replacement, $buffer);
            }
        }

        return $buffer;
    }
}
