<?php
namespace app\tests\acceptance;

use AcceptanceTester;

class ErrorCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testNotFound(AcceptanceTester $I)
    {
        $I->amOnPage('/notexist');
        $I->seeResponseCodeIs(404);
        $I->see('Yii2tests');
    }
}