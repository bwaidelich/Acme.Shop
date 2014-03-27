<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Dto\ShoppingCart;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use TYPO3\Flow\Mvc\View\ViewInterface;

/**
 * Common base controller for the "Acme.Shop" package
 */
abstract class AbstractBaseController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var ShoppingCart
	 */
	protected $shoppingCart;

	/**
	 * @param ViewInterface $view
	 * @return void
	 */
	protected function initializeView(ViewInterface $view) {
		$view->assign('shoppingCart', $this->shoppingCart);
	}

	/**
	 * @return boolean
	 */
	protected function getErrorFlashMessage() {
		return FALSE;
	}
}