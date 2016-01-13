<?php
namespace app\tests\functional;

use FunctionalTester;

class HomeCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testHomeOpened(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Yii2tests');
    }
}