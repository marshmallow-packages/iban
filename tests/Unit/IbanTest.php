<?php

namespace Tests\Unit;

use Marshmallow\IBAN\IBAN;
use PHPUnit\Framework\TestCase;
use Marshmallow\Priceable\Facades\Price;

class IbanTest extends TestCase
{
	protected $valid_iban = 'NL93RABO0317745646';
	protected $invalid_iban = 'NOT_A_VALID_IBAN';
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItReturnsTrueOnAValidIban()
    {
        $this->assertTrue(
        	IBAN::validate($this->valid_iban)
        );
    }

    public function testItReturnsFalseOnInvalidIban ()
    {
    	$this->assertFalse(
        	IBAN::validate($this->invalid_iban)
        );
    }

    public function testItReturnsABankAccountOnValidIban ()
    {
    	$this->assertEquals(
    		'317745646',
    		IBAN::getBankAccount($this->valid_iban)
    	);
    }

    public function testItReturnsNullWhenGettingBankaccountOnInvalidIban ()
    {
    	$this->assertNull(
    		IBAN::getBankAccount($this->invalid_iban)
    	);
    }

    public function testGettingBicReturnsAnArray ()
    {
    	$this->assertIsArray(
    		IBAN::getBic($this->valid_iban)
    	);
    }

    public function testBicArrayHasBic ()
    {
    	$this->assertArrayHasKey('bic', IBAN::getBic($this->valid_iban));
    }

    public function testBicArrayHasIdentifier ()
    {
    	$this->assertArrayHasKey('identifier', IBAN::getBic($this->valid_iban));
    }

    public function testBicArrayHasName ()
    {
    	$this->assertArrayHasKey('name', IBAN::getBic($this->valid_iban));
    }

    public function testBicArrayHasIban ()
    {
    	$this->assertArrayHasKey('iban', IBAN::getBic($this->valid_iban));
    }

    public function testBicArrayHasAccountNumber ()
    {
    	$this->assertArrayHasKey('account_number', IBAN::getBic($this->valid_iban));
    }

    public function testBicArrayBicValueIsAString ()
    {
    	$this->assertIsString(IBAN::getBic($this->valid_iban)['bic']);
    }

    public function testBicArrayIdentifierValueIsAString ()
    {
    	$this->assertIsString(IBAN::getBic($this->valid_iban)['identifier']);
    }

    public function testBicArrayNameValueIsAString ()
    {
    	$this->assertIsString(IBAN::getBic($this->valid_iban)['name']);
    }

    public function testBicArrayIbanValueIsAString ()
    {
    	$this->assertIsString(IBAN::getBic($this->valid_iban)['iban']);
    }

    public function testBicArrayAccountNumberValueIsAString ()
    {
    	$this->assertIsString(IBAN::getBic($this->valid_iban)['account_number']);
    }

    public function testGetBicReturnsNullWhenInvalidIbanIsProvided ()
    {
    	$this->assertNull(
    		IBAN::getBic($this->invalid_iban)
    	);
    }
}
