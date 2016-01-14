<?php
namespace app\tests\functional;

use FunctionalTester;

class ListCest
{


    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testAccess(FunctionalTester $I)
    {
        $I->logout();
        $I->amOnPage('/books');
        $I->seeCurrentUrlEquals('/login');

        $I->login('user', '123');
        $I->amOnPage('/books');
        $I->seeCurrentUrlEquals('/books');
    }
}