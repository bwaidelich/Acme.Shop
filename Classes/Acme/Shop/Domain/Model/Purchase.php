<?php
namespace Acme\Shop\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Purchase {

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @var \Doctrine\Common\Collections\Collection<\Acme\Shop\Domain\Model\PurchaseItem>
	 * @ORM\OneToMany(mappedBy="purchase")
	 */
	protected $items;

	/**
	 * @Flow\Validate(type="NotEmpty")
	 * @var string
	 */
	protected $customerName;

	/**
	 * @Flow\Validate(type="EmailAddress")
	 * @var string
	 */
	protected $customerEmailAddress;

	/**
	 * @var boolean
	 */
	protected $customerNewsletterActive = FALSE;

	/**
	 * Constructor
	 */
	function __construct() {
		$this->items = new ArrayCollection();
	}

	/**
	 * @return string
	 */
	public function getCustomerName() {
		return $this->customerName;
	}

	/**
	 * @param string $customerName
	 * @return void
	 */
	public function setCustomerName($customerName) {
		$this->customerName = $customerName;
	}

	/**
	 * @return string
	 */
	public function getCustomerEmailAddress() {
		return $this->customerEmailAddress;
	}

	/**
	 * @param string $customerEmailAddress
	 * @return void
	 */
	public function setCustomerEmailAddress($customerEmailAddress) {
		$this->customerEmailAddress = $customerEmailAddress;
	}

	/**
	 * @param boolean $customerNewsletterActive
	 * @return void
	 */
	public function setCustomerNewsletterActive($customerNewsletterActive) {
		$this->customerNewsletterActive = $customerNewsletterActive;
	}

	/**
	 * @return boolean
	 */
	public function isCustomerNewsletterActive() {
		return $this->customerNewsletterActive;
	}

	/**
	 * @param Collection $items
	 * @return void
	 */
	public function setItems(Collection $items) {
		$this->items = $items;
	}

	/**
	 * @param PurchaseItem $purchaseItem
	 * @return void
	 */
	public function addItem(PurchaseItem $purchaseItem) {
		$purchaseItem->setPurchase($this);
		$this->items->add($purchaseItem);
	}

	/**
	 * @return Collection|PurchaseItem[]
	 */
	public function getItems() {
		return $this->items;
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

}