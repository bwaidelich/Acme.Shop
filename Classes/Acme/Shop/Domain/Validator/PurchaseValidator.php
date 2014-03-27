<?php
namespace Acme\Shop\Domain\Validator;

use Acme\Shop\Domain\Model\Purchase;
use TYPO3\Flow\Validation\Validator\AbstractValidator;

/**
 * Custom validator for the purchase domain model
 */
class PurchaseValidator extends AbstractValidator {

	/**
	 * @param Purchase $purchase
	 * @return void
	 * @throws \InvalidArgumentException
	 */
	protected function isValid($purchase) {
		if (!$purchase instanceof Purchase) {
			throw new \InvalidArgumentException('The PurchaseValidator can only be used for Purchase instances', 1395936693);
		}
		if ($purchase->isCustomerNewsletterActive() && strlen($purchase->getCustomerEmailAddress()) < 1) {
			$this->addError('If you want to receive our newsletter you must provide an email address', 1395936793);
		}
	}

}