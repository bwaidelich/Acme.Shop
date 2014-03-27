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
class Product {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var Category
	 * @ORM\ManyToOne
	 * @ORM\Column(nullable=TRUE)
	 */
	protected $category;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param float $price
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * @return Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param Category $category
	 * @return void
	 */
	public function setCategory(Category $category = NULL) {
		$this->category = $category;
	}

}