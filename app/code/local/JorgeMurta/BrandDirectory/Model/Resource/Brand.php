<?php

class JorgeMurta_BrandDirectory_Resource_Brand extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('jorgemurta_branddirectory/brand', 'id');
    }
}
