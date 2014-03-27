<?php
namespace Acme\Shop\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Purchase;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\QueryResultInterface;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class PurchaseRepository extends Repository {

	/**
	 * @return QueryResultInterface|Purchase[]
	 */
	public function findAll() {
		return parent::findAll();
	}

}