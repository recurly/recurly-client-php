# Contributing

We're happy to have your bug fixes, corrections or other contributions.

## Testing

If you're submitting code changes we'd ask that you use Composer to install
PHPUnit, then run our existing tests:

```
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install --dev
$ vendor/phpunit/phpunit/phpunit Tests/
```

If you're adding new functionality, we'd love it if you could include tests. We
understand not everyone is comfortable writing tests, so submit a pull request
and we can help you with the tests.

## Coding Standards

The current code is inconsistent but we'd like to try to follow the [PEAR
coding standards](http://pear.php.net/manual/en/standards.php).

If you want to do style cleanups, put them in separate commits from functional
changes so the patches are easier to review.
