<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Product;
use Acme\Shop\Domain\Repository\ProductRepository;
use TYPO3\Flow\Annotations as Flow;

/**
 * Controller for listing products
 */
class ProductController extends AbstractBaseController {

	/**
	 * @Flow\Inject
	 * @var ProductRepository
	 */
	protected $productRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$products = $this->productRepository->findAll();
		$this->view->assign('products', $products);
	}

	/**
	 * @param Product $product
	 * @return void
	 * @Flow\IgnoreValidation("$product")
	 */
	public function showAction(Product $product) {
		$this->view->assign('product', $product);
	}

}