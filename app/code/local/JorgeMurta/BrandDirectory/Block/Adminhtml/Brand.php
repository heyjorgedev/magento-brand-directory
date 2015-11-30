<?php

class JorgeMurta_BrandDirectory_Block_Adminhtml_Brand extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'jorgemurta_branddirectory_adminhtml';

        $this->_controller = 'brand';

        $this->_headerText = Mage::helper('jorgemurta_branddirectory')
            ->__('Brand Directory');
    }

    public function getCreateUrl()
    {
        return $this->getUrl(
            'jorgemurta_branddirectory_admin/brand/edit'
        );
    }
}
