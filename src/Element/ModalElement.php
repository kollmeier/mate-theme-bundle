<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace ContaoThemesNet\MateThemeBundle\Element;

/**
 * Class ModalElement
 *
 * @author Philipp Seibt <develop@pdir.de>
 */
class ModalElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_mate_modal';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### MATE MODAL ###';
            $objTemplate->title = $this->name;
            $objTemplate->id = $this->id;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }


    /**
     * Generate the element
     */
    protected function compile()
    {
        if($this->mateModal_customTpl != "") {
            $this->Template->setName($this->mateModal_customTpl);
        } else {
            $this->Template->setName("ce_mate_modal");
        }
        $this->Template->linkText = $this->mateModal_linkText;

        if($this->mateModal_linkClass != "") {
            $this->Template->linkClass = " ".$this->mateModal_linkClass;
        } else {
            $this->Template->linkClass = "";
        }

        if($this->mateModal_class != "") {
            $this->Template->modalClass = " ".$this->mateModal_class;
        } else {
            $this->Template->modalClass = "";
        }

        $this->Template->text = $this->mateModal_text;
    }
}
