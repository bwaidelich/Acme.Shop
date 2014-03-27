<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Product;
use Acme\Shop\Domain\Model\Purchase;
use Acme\Shop\Domain\Repository\PurchaseRepository;
use TYPO3\Flow\Annotations as Flow;

/**
 * Controller for creating and managing purchases
 */
class PurchaseController extends AbstractBaseController {

	/**
	 * @Flow\Inject
	 * @var PurchaseRepository
	 */
	protected $purchaseRepository;

	/**
	 * @return void
	 */
	public function newAction() {
		$purchase = $this->shoppingCart->createPurchase();
		$this->view->assign('purchase', $purchase);
	}

	/**
	 * @param Purchase $purchase
	 * @return void
	 */
	public function createAction(Purchase $purchase) {
		$this->purchaseRepository->add($purchase);
		$this->shoppingCart->removeAll();
		$this->addFlashMessage('Purchase created');

		$this->redirect('index', 'Product');
	}

}