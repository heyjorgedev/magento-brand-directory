<?php

class JorgeMurta_BrandDirectory_Block_Adminhtml_Brand_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel(
            'jorgemurta_branddirectory/brand_collection'
        );
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl(
            'jorgemurta_branddirectory_admin/brand/edit',
            array(
                'id' => $row->getId(),
            )
        );
    }

    protected function _prepareColumns()
    {
        /**
         * Here, we'll define which columns to display in the grid.
         */
        $this->addColumn('id', array(
            'header' => $this->_getHelper()->__('ID'),
            'type'   => 'number',
            'index'  => 'id',
        ));

        $this->addColumn('created_at', array(
            'header' => $this->_getHelper()->__('Created'),
            'type'   => 'datetime',
            'index'  => 'created_at',
        ));

        $this->addColumn('updated_at', array(
            'header' => $this->_getHelper()->__('Updated'),
            'type'   => 'datetime',
            'index'  => 'updated_at',
        ));

        $this->addColumn('name', array(
            'header' => $this->_getHelper()->__('Name'),
            'type'   => 'text',
            'index'  => 'name',
        ));

        $this->addColumn('lastname', array(
            'header' => $this->_getHelper()->__('Url Key'),
            'type'   => 'text',
            'index'  => 'url_key',
        ));

        $brandSingleton = Mage::getSingleton(
            'jorgemurta_branddirectory/brand'
        );
        $this->addColumn('visibility', array(
            'header'  => $this->_getHelper()->__('Visibility'),
            'type'    => 'options',
            'index'   => 'visibility',
            'options' => $brandSingleton->getAvailableVisibilies(),
        ));

        /**
         * Finally, we'll add an action column with an edit link.
         */
        $this->addColumn('action', array(
            'header'   => $this->_getHelper()->__('Action'),
            'width'    => '50px',
            'type'     => 'action',
            'actions'  => array(
                array(
                    'caption' => $this->_getHelper()->__('Edit'),
                    'url'     => array(
                        'base' => 'jorgemurta_branddirectory_admin'
                        . '/brand/edit',
                    ),
                    'field'   => 'id',
                ),
            ),
            'filter'   => false,
            'sortable' => false,
            'index'    => 'entity_id',
        ));

        return parent::_prepareColumns();
    }

    protected function _getHelper()
    {
        return Mage::helper('jorgemurta_branddirectory');
    }
}
