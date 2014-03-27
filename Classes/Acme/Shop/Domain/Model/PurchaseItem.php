<?php
namespace Acme\Shop\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class PurchaseItem {

	/**
	 * @var Product
	 * @ORM\ManyToOne
	 */
	protected $product;

	/**
	 * @var integer
	 */
	protected $amount = 1;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var Purchase
	 * @ORM\ManyToOne(inversedBy="items")
	 * @ORM\Column(nullable=TRUE)
	 */
	protected $purchase;

	/**
	 * @param Product $product
	 */
	function __construct(Product $product) {
		$this->product = $product;
		$this->price = $product->getPrice();
	}

	/**
	 * @return Product
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getProduct()->getName();
	}

	/**
	 * @return integer
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param integer $amount
	 * @return void
	 */
	public function setAmount($amount) {
		$this->amount = max(1, $amount);
	}

	/**
	 * @return void
	 */
	public function increaseAmount() {
		$this->amount ++;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @return float
	 */
	public function getTotalPrice() {
		return $this->price * $this->amount;
	}

	/**
	 * @param Purchase $purchase
	 * @return void
	 */
	public function setPurchase(Purchase $purchase) {
		$this->purchase = $purchase;
	}

	/**
	 * @return Purchase
	 */
	public function getPurchase() {
		return $this->purchase;
	}

}