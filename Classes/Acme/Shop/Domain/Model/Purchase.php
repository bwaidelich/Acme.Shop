<?php
namespace Acme\Shop\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Doctrine\Common\Collections\Collection;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Purchase {

	/**
	 * @var \Doctrine\Common\Collections\Collection<\Acme\Shop\Domain\Model\PurchaseItem>
	 * @ORM\OneToMany(mappedBy="purchase")
	 */
	protected $items;

	/**
	 * @var string
	 */
	protected $customerName;

	/**
	 * @var string
	 */
	protected $customerEmailAddress;

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
		$this->items->add($purchaseItem);
	}

	/**
	 * @return Collection|PurchaseItem[]
	 */
	public function getItems() {
		return $this->items;
	}

}