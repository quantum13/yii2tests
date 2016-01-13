<?php
namespace app\tests\functional;

use FunctionalTester;

class ErrorCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testNotFound(FunctionalTester $I)
    {
        $I->amOnPage('/notexist');
        $I->seeResponseCodeIs(404);
        $I->see('Yii2tests');
    }
}