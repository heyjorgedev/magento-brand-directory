<?php

class JorgeMurta_BrandDirectory_Model_Resource_Brand_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();

        $this->_init(
            'jorgemurta_branddirectory/brand'
            // 'jorgemurta_branddirectory/brand'
        );
    }
}
