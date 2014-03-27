<?php
namespace Acme\Shop\Tests\Unit\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\Purchase;
use TYPO3\Flow\Tests\UnitTestCase;

/**
 * Testcase for Purchase
 */
class PurchaseTest extends UnitTestCase {

	/**
	 * @test
	 */
	public function getTotalPriceSumsUpTheTotalPriceOfEachItem() {
		$purchase = new Purchase();

		$mockPurchaseItem1 = $this->getMockBuilder('Acme\Shop\Domain\Model\PurchaseItem')->disableOriginalConstructor()->getMock();
		$mockPurchaseItem1->expects($this->atLeastOnce())->method('getTotalPrice')->will($this->returnValue(123.45));
		$purchase->addItem($mockPurchaseItem1);

		$mockPurchaseItem2 = $this->getMockBuilder('Acme\Shop\Domain\Model\PurchaseItem')->disableOriginalConstructor()->getMock();
		$mockPurchaseItem2->expects($this->atLeastOnce())->method('getTotalPrice')->will($this->returnValue(33.56));
		$purchase->addItem($mockPurchaseItem2);

		$expectedResult = 157.01;
		$this->assertSame($expectedResult, $purchase->getTotalPrice());
	}
}