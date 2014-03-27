<?php
namespace Acme\Shop\Tests\Unit\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Acme.Shop".             *
 *                                                                        *
 *                                                                        */

use Acme\Shop\Domain\Model\PurchaseItem;
use TYPO3\Flow\Tests\UnitTestCase;

/**
 * Testcase for Purchase item
 */
class PurchaseItemTest extends UnitTestCase {

	/**
	 * @var PurchaseItem
	 */
	protected $purchaseItem;

	public function setUp() {
		$mockProduct = $this->getMockBuilder('Acme\Shop\Domain\Model\Product')->disableOriginalConstructor()->getMock();
		$this->purchaseItem = new PurchaseItem($mockProduct);
	}

	/**
	 * @test
	 */
	public function theAmountIsOneByDefault() {
		$this->assertSame(1, $this->purchaseItem->getAmount());
	}

	/**
	 * Data provider for the setValueDoesNotStoreNegativeValues test
	 *
	 * @return array
	 */
	public function setValueDataProvider() {
		return array(
			array('value' => -5, 'expectedResult' => 1),
			array('value' => 0, 'expectedResult' => 1),
			array('value' => 5, 'expectedResult' => 5),
		);
	}

	/**
	 * @test
	 * @dataProvider setValueDataProvider
	 */
	public function setValueDoesNotStoreNegativeValues($value, $expectedResult) {
		$this->purchaseItem->setAmount($value);

		$this->assertSame($expectedResult, $this->purchaseItem->getAmount());
	}
}