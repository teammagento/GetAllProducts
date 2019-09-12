<?php

require '../app/bootstrap.php';

use Magento\Framework\App\Bootstrap;
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();


$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');

$collection = $productCollection->create()
            ->addAttributeToSelect('*')
            ->load();

foreach ($collection as $product){
	if(($product->getStatus()==1) AND ($product->getTypeId()=='simple')) {
    	echo $product->getTypeId()."-".$product->getSku()."-".$product->getStatus().'<br>';
    } 
}