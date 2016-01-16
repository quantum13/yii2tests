## Installation

* `composer global require "fxp/composer-asset-plugin:~1.1.1"`
* `composer create-project --prefer-dist --stability=dev quantum13/yii2tests yii2tests --repository-url=https://raw.githubusercontent.com/quantum13/yii2tests/master/`
* copy `config.local.php.example` to `config.local.php` and change db connections
* `yii migrate`
* `/public` dir is doc root

for tests
* `yii-tests site/tools/db-cleanup`
* `yii-tests migrate`
* `vendor/bin/codecept run functional`