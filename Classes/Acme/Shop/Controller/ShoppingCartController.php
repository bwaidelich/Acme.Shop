<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Dto\ShoppingCart;
use Acme\Shop\Domain\Model\Product;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

/**
 * Controller for the shopping cart
 */
class ShoppingCartController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var ShoppingCart
	 */
	protected $shoppingCart;

	/**
	 * @return void
	 */
	public function showAction() {
		$this->view->assign('shoppingCart', $this->shoppingCart);
	}

	/**
	 * @param Product $product Product to add to the shopping cart
	 * @return void
	 */
	public function addProductAction(Product $product) {
		$this->shoppingCart->addProduct($product);
		$this->redirect('show');
	}

}