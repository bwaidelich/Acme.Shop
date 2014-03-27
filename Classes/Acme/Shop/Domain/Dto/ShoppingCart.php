<?php
namespace Acme\Shop\Domain\Dto;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Product;
use Acme\Shop\Domain\Model\Purchase;
use Acme\Shop\Domain\Model\PurchaseItem;
use Doctrine\Common\Collections\ArrayCollection;
use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("session")
 */
class ShoppingCart {

	/**
	 * @var PurchaseItem[]
	 */
	protected $items = array();

	/**
	 * @return PurchaseItem[]
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @Flow\Session(autoStart=TRUE)
	 * @param Product $product
	 * @return void
	 */
	public function addProduct(Product $product) {
		foreach ($this->items as $item) {
			if ($product === $item->getProduct()) {
				$item->increaseAmount();
				return;
			}
		}
		$this->items[] = new PurchaseItem($product);
	}

	/**
	 * @return float
	 */
	public function getTotalPrice() {
		$totalPrice = 0;
		foreach($this->getItems() as $item) {
			$totalPrice += $item->getTotalPrice();
		}
		return $totalPrice;
	}

	/**
	 * @return Purchase
	 */
	public function createPurchase() {
		$purchase = new Purchase();
		$purchase->setItems(new ArrayCollection($this->items));
		return $purchase;
	}

	/**
	 * @return void
	 */
	public function removeAll() {
		$this->items = array();
	}

}