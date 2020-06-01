<?php

namespace Markocupic\PreloaderOverlay\Listener\ContaoHooks;

/**
 * Class OutputFrontendTemplate
 * @package Markocupic\PreloaderOverlay\Listener\ContaoHooks
 */
class OutputFrontendTemplate
{
    /**
     * @param string $buffer
     * @param string $template
     * @return string
     */
    public function onOutputFrontendTemplate(string $buffer, string $template): string
    {
        if (strpos($template, 'fe_') === 0)
        {
            $pattern = '/<!-- Start preloader overlay(.*?)-->(.*)<!-- End preloader overlay(.*?)-->/s';
            if (preg_match($pattern, $buffer, $matches))
            {
                // Cut overlay
                $buffer = preg_replace($pattern, '', $buffer);

                // Use backreferences & paste overlay into new position
                $replacement = '<body${1}>' . $matches[2] . '${2}</body>';
                $buffer = preg_replace('/<body(.*?)>(.*)<\/body>/s', $replacement, $buffer);
            }
        }

        return $buffer;
    }
}
