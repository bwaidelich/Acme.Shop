<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Initial migration
 */
class Version20140327125942 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE acme_shop_domain_model_product (persistence_object_identifier VARCHAR(40) NOT NULL, category VARCHAR(40) DEFAULT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_49B7671E64C19C1 (category), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE acme_shop_domain_model_category (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE acme_shop_domain_model_purchase (persistence_object_identifier VARCHAR(40) NOT NULL, customername VARCHAR(255) NOT NULL, customeremailaddress VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE acme_shop_domain_model_purchaseitem (persistence_object_identifier VARCHAR(40) NOT NULL, product VARCHAR(40) DEFAULT NULL, purchase VARCHAR(40) DEFAULT NULL, amount INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_C30A78DBD34A04AD (product), INDEX IDX_C30A78DB6117D13B (purchase), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("ALTER TABLE acme_shop_domain_model_product ADD CONSTRAINT FK_49B7671E64C19C1 FOREIGN KEY (category) REFERENCES acme_shop_domain_model_category (persistence_object_identifier)");
		$this->addSql("ALTER TABLE acme_shop_domain_model_purchaseitem ADD CONSTRAINT FK_C30A78DBD34A04AD FOREIGN KEY (product) REFERENCES acme_shop_domain_model_product (persistence_object_identifier)");
		$this->addSql("ALTER TABLE acme_shop_domain_model_purchaseitem ADD CONSTRAINT FK_C30A78DB6117D13B FOREIGN KEY (purchase) REFERENCES acme_shop_domain_model_purchase (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("ALTER TABLE acme_shop_domain_model_purchaseitem DROP FOREIGN KEY FK_C30A78DBD34A04AD");
		$this->addSql("ALTER TABLE acme_shop_domain_model_product DROP FOREIGN KEY FK_49B7671E64C19C1");
		$this->addSql("ALTER TABLE acme_shop_domain_model_purchaseitem DROP FOREIGN KEY FK_C30A78DB6117D13B");
		$this->addSql("DROP TABLE acme_shop_domain_model_product");
		$this->addSql("DROP TABLE acme_shop_domain_model_category");
		$this->addSql("DROP TABLE acme_shop_domain_model_purchase");
		$this->addSql("DROP TABLE acme_shop_domain_model_purchaseitem");
	}
}