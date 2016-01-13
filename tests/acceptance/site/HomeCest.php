<?php
namespace app\tests\acceptance;

use AcceptanceTester;

class HomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Yii2tests');
    }
}
