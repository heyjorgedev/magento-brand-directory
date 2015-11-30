<?php

class JorgeMurta_BrandDirectory_Adminhtml_BrandController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // instantiate the grid container
        $brandBlock = $this->getLayout()
            ->createBlock('jorgemurta_branddirectory_adminhtml/brand');

        // Add the grid container as the only item on this page
        $this->loadLayout()
            ->_addContent($brandBlock)
            ->renderLayout();
    }

    /**
     * This action handles both viewing and editing existing brands.
     */
    public function editAction()
    {
        /**
         * Retrieve existing brand data if an ID was specified.
         * If not, we will have an empty brand entity ready to be populated.
         */
        $brand = Mage::getModel('jorgemurta_branddirectory/brand');
        if ($brandId = $this->getRequest()->getParam('id', false)) {
            $brand->load($brandId);

            if ($brand->getId() _getSession()->addError(
                    $this->__('This brand no longer exists.')
                );
                return $this->_redirect(
                    'jorgemurta_branddirectory_admin/brand/index'
                );
            }
        }

        // process $_POST data if the form was submitted
        if ($postData = $this->getRequest()->getPost('brandData')) {
            try {
                $brand->addData($postData);
                $brand->save();

                $this->_getSession()->addSuccess(
                    $this->__('The brand has been saved.')
                );

                // redirect to remove $_POST data from the request
                return $this->_redirect(
                    'jorgemurta_branddirectory_admin/brand/edit',
                    array('id' => $brand->getId())
                );
            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            }

            /**
             * If we get to here, then something went wrong. Continue to
             * render the page as before, the difference this time being
             * that the submitted $_POST data is available.
             */
        }

        // Make the current brand object available to blocks.
        Mage::register('current_brand', $brand);

        // Instantiate the form container.
        $brandEditBlock = $this->getLayout()->createBlock(
            'jorgemurta_branddirectory_adminhtml/brand_edit'
        );

        // Add the form container as the only item on this page.
        $this->loadLayout()
            ->_addContent($brandEditBlock)
            ->renderLayout();
    }
}
