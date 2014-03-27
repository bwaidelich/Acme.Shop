<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Product;
use TYPO3\Flow\Annotations as Flow;

/**
 * Controller for the shopping cart
 */
class ShoppingCartController extends AbstractBaseController {

	/**
	 * @return void
	 */
	public function showAction() {
	}

	/**
	 * @param Product $product Product to add to the shopping cart
	 * @return void
	 */
	public function addProductAction(Product $product) {
		$this->shoppingCart->addProduct($product);
		$this->redirect('index', 'Product');
	}

}