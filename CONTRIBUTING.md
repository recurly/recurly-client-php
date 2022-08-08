# Contributing

We're happy to have your bug fixes, corrections or other contributions.

## Testing

If you're submitting code changes we'd ask that you use Composer to install
PHPUnit, then run our existing tests:

```
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install
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

## Infrastructure Landscape

It may not be immediately clear how to add a specific XML node to an existing model or create a new model. There are some edge cases that are targeted with specific conditionals, but the following are some general guidelines when adding to this library.


### Adding Something New

No matter what you add, there's always some sort of file change requirement.

#### Preload the thing
At a bare minimum, the file contents need to be preloaded. The first time this is done, and sometimes on subsequent runs, you may want to consider an initial `composer dump-autoload` to ensure the autoload cache is up-to-date:
```php
// lib/recurly.php
// ensure that your `require_once` is somewhere _before_ something
// else uses it. generally, traits/utils/base things at the top.

<?php
// ...
require_once(__DIR__ . '/recurly/utils/a_new_util.php');
require_once(__DIR__ . '/recurly/traits/a_new_trait.php');
require_once(__DIR__ . '/recurly/a_new_class_or_resource.php');
// ...
```

#### Register resource, class, or wrapper

Generally, you're going to be adding one of three things:
1. A single field/node (e.g. `<new_thing>foo</new_thing>`)
2. A new node that will have unique(-ish?) children (e.g. `<new_thing><foo>bar</foo></new_thing>`)
3. A new node that is simply a collection wrapper for the _real_ new thing in multiples (e.g. `<new_things><new_thing>bar</new_thing></new_things>`)

For each of things, you should register your new thing in the `XmlTools::CLASS_MAP` array so that the library knows how to process the XML node when it is encountered (please keep the alphabetical order). For a new thing that has a collection wrapper, you'll have two new entries:
```php
// lib/recurly/util/xml_tools.php
static $CLASS_MAP = array(
  'new_thing' => 'string',
  // OR...
  'new_things' => 'array', // OR, if ambitious => 'Recurly_NewThingsList',
  'new_thing' => 'Recurly_NewThing',
);
```

#### To Resource or not to Resource?

Usually, a "resource" is a model that can be requested via some endpoint. That is, it _can be_ a top-level node. A couple of obvious examples are `<plan>` and `<subscription>`. Sometimes these can be nested within other resources, but if your new thing is available as a top-level node, then your new class should extend from `Recurly_Resource`. For example:
```php
// lib/magic_wand.php
<?php

// maybe there's a new POST/GET/PUT/DELETE `/magic_wands(/:wand_id)`?
class Recurly_MagicWand extends Recurly_Resource
{
  // ...
}
```

Otherwise, if your new thing is only ever nested in other things, then your class can simply use the `XmlDoc` trait to get all the benefits of xml node building:
```php
// lib/magic_wand.php
<?php

// maybe there's a new `magic_wand` addon type?
class Recurly_MagicWand
{
  use XmlDoc;

  // ...
}
```
