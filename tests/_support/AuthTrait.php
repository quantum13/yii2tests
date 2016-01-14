<?php

trait AuthTrait
{
    public function login($user, $pass)
    {
        /** @var $I FunctionalTester */
        $I = $this;

        $I->amOnPage('/login');
        $I->fillField('LoginForm[username]', $user);
        $I->fillField('LoginForm[password]', $pass);
        $I->click('Login', 'form');
        $I->seeCurrentUrlEquals(isset($_SESSION['__returnUrl']) ? $_SESSION['__returnUrl'] : '/');
        $I->see('Logout', 'a');
    }

    public function logout()
    {
        /** @var $I FunctionalTester */
        $I = $this;

        $I->amOnPage('/logout');
        $I->seeCurrentUrlEquals('/');
        $I->see('Login', 'a');
    }
}