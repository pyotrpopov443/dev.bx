<?php

include '../../src/DataGenerator/FinancialTransactionsRu.php';
include '../../src/Result.php';

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				]
			],
			'one missing field' => [
				[
					'Name' => 'Peter',
					'PersonalAcc' => '12345678901234567890',
					'BankName' => 'SomeBank',
					'BIC' => '123456789',
				]
			],
			'value overflow' => [
				[
					'Name' => 'Peter',
					'PersonalAcc' => '12345678901234567890',
					'BankName' => 'SomeBank',
					'BIC' => '12345678910', // overflow
					'CorrespAcc' => '12345678901234567890',
				]
			],
			'invalid value type' => [
				[

					'Name' => 'Peter',
					'PersonalAcc' => '12345678901234567890',
					'BankName' => false,
					'BIC' => '123456789',
					'CorrespAcc' => '12345678901234567890',
				]
			]
		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 */
	public function testValidateFail(array $fields): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();

		static::assertFalse($result->isSuccess());
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$dataGenerator
			->setName('Name')
			->setBIC('BIC')
			->setBankName('BankName')
			->setCorrespondentAccount('CorrespondentAccount')
			->setPersonalAccount('CorrespondentAccount')
		;

		$result = $dataGenerator->validate();

		static::assertTrue($result->isSuccess());
	}

	public function testGetData(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=', $data);
	}
}
