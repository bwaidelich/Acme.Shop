<?php
namespace Acme\Shop\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Repository\ProductRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

/**
 * Controller for listing products
 */
class ProductController extends ActionController {

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

}