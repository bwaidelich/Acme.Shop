<?php
namespace Acme\Shop\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Category;
use Acme\Shop\Domain\Model\Product;
use Acme\Shop\Domain\Repository\ProductRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class SetupCommandController extends CommandController {

	/**
	 * @Flow\Inject
	 * @var ProductRepository
	 */
	protected $productRepository;

	/**
	 * Set up some dummy product and categories
	 *
	 * @return void
	 */
	public function dummyCommand() {
		$category1 = new Category();
		$category1->setName('Category 01');

		$category2 = new Category();
		$category2->setName('Category 02');

		$this->createProduct('Product 01', 123.45, $category1);
		$this->createProduct('Product 02', 45.33, $category2);
		$this->createProduct('Product 03', 12.33);

		$this->outputLine('Done.');
	}

	/**
	 * @param string $name
	 * @param float $price
	 * @param Category $category
	 * @return void
	 */
	protected function createProduct($name, $price, Category $category = NULL) {
		$product = new Product();
		$product->setName($name);
		$product->setPrice($price);
		$product->setCategory($category);
		$this->productRepository->add($product);
	}
}