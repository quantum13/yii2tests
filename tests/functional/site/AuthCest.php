<?php
namespace app\tests\functional;

use FunctionalTester;

class AuthCest
{


    public function _before(FunctionalTester $I)
    {

    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testLoginLogout(FunctionalTester $I)
    {
        $I->login('user', '123');
        $I->logout();
    }
}