<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 28.04.2017
 * Time: 22:25
 */

namespace Markocupic;

use Patchwork\Utf8;


class PreloaderOverlay extends \Module
{



    /**
     * template
     * @var string
     */
    protected $strTemplate = 'mod_preloader_overlay';

    /**
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');
            if (version_compare(VERSION . '.' . BUILD, '4.0.0', '<'))
            {
                $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['preloader_overlay'][0]) . ' ###';
            }else{
                $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['preloader_overlay'][0]) . ' ###';
            }
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        // Overwrite default template
        if($this->customSectionTpl != '')
        {
            $this->strTemplate = $this->customSectionTpl;
        }

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        //
    }
}