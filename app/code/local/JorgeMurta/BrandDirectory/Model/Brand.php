<?php

class JorgeMurta_BrandDirectory_Model_Brand extends Mage_Core_Model_Abstract
{
    const VISIBILITY_HIDDEN    = '0';
    const VISIBILITY_DIRECTORY = '1';

    protected function _construct()
    {
        $this->_init('jorgemurta_branddirectory/brand');
    }

    public function getAvailableVisibilies()
    {
        return array(
            self::VISIBILITY_HIDDEN    => Mage::helper('jorgemurta_branddirectory')
                ->__('Hidden'),
            self::VISIBILITY_DIRECTORY => Mage::helper('jorgemurta_branddirectory')
                ->__('Visible in Directory'),
        );
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();

        $this->_updateTimestamps();
        $this->_prepareUrlKey();

        return $this;
    }

    protected function _updateTimestamps()
    {
        $timestamp = now();

        $this->setUpdatedAt($timestamp);

        if ($this->isObjectNew()) {
            $this->setCreatedAt($timestamp);
        }

        return $this;
    }

    protected function _prepareUrlKey()
    {
        return $this;
    }
}
