# Changelog

## [4.0.1](https://github.com/recurly/recurly-client-php/tree/4.0.1) (2021-03-23)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/4.0.0...4.0.1)

**Merged pull requests:**

- Release 4.0.1 [\#596](https://github.com/recurly/recurly-client-php/pull/596) ([douglasmiller](https://github.com/douglasmiller))
- Generated Latest Changes for v2021-02-25 [\#595](https://github.com/recurly/recurly-client-php/pull/595) ([recurly-integrations](https://github.com/recurly-integrations))
- Sync updates not ported from 3.x client [\#590](https://github.com/recurly/recurly-client-php/pull/590) ([douglasmiller](https://github.com/douglasmiller))
- Replace empty\(\) with is\_null\(\) [\#588](https://github.com/recurly/recurly-client-php/pull/588) ([joannasese](https://github.com/joannasese))
- Replace empty\(\) with is\_null\(\) [\#587](https://github.com/recurly/recurly-client-php/pull/587) ([joannasese](https://github.com/joannasese))

## [4.0.0](https://github.com/recurly/recurly-client-php/tree/4.0.0) (2021-03-01)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.11.0...4.0.0)

# Major Version Release

The 4.x major version of the client pairs with the `v2021-02-25` API version. This version of the client and the API contain breaking changes that should be considered before upgrading your integration.

## Breaking Changes in the API
All changes to the core API are documented in the [Developer Portal changelog](https://developers.recurly.com/api/changelog.html#v2021-02-25---current-ga-version)

## Breaking Changes in Client

- Require query string parameters to be specified under the `params` key of the `$options` parameter. [[#522](https://github.com/recurly/recurly-client-php/pull/522)]

    ### 3.x
    ```php
    $options = [
      'limit' => 200
    ];
    $accounts = $client->listAccounts($options);
   ```
    ### 4.x
    ```php
    $options = [
      'params' => [
        'limit' => 200
      ],
      'headers' => [
        'Accept-Language' => 'fr'
      ]
    ];
    $accounts = $client->listAccounts($options);
    ```

**Implemented enhancements:**

- Updating operations to accept generic request options instead of just query parameters [\#522](https://github.com/recurly/recurly-client-php/pull/522) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 4.0.0 [\#586](https://github.com/recurly/recurly-client-php/pull/586) ([douglasmiller](https://github.com/douglasmiller))
- Updating changelog script and changelog generator config for 4.x release [\#582](https://github.com/recurly/recurly-client-php/pull/582) ([douglasmiller](https://github.com/douglasmiller))
- Null checking variable before calling property\_exists to prevent Warning [\#526](https://github.com/recurly/recurly-client-php/pull/526) ([douglasmiller](https://github.com/douglasmiller))

## [3.11.0](https://github.com/recurly/recurly-client-php/tree/3.11.0) (2021-01-22)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.10.0...3.11.0)

**Implemented enhancements:**

- Latest Changes for 2019-10-10 [\#577](https://github.com/recurly/recurly-client-php/pull/577) ([douglasmiller](https://github.com/douglasmiller))
- Latest Changes for 2019-10-10 [\#569](https://github.com/recurly/recurly-client-php/pull/569) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.11.0 [\#579](https://github.com/recurly/recurly-client-php/pull/579) ([douglasmiller](https://github.com/douglasmiller))
- Update readme to include memo on headers [\#571](https://github.com/recurly/recurly-client-php/pull/571) ([joannasese](https://github.com/joannasese))

## [3.10.0](https://github.com/recurly/recurly-client-php/tree/3.10.0) (2020-11-06)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.9.0...3.10.0)

**Implemented enhancements:**

- Latest Changes for 2019-10-10 \(Wallet, Item Coupons\) [\#564](https://github.com/recurly/recurly-client-php/pull/564) ([douglasmiller](https://github.com/douglasmiller))
- Implement Pager\#take [\#561](https://github.com/recurly/recurly-client-php/pull/561) ([joannasese](https://github.com/joannasese))

**Merged pull requests:**

- Release 3.10.0 [\#566](https://github.com/recurly/recurly-client-php/pull/566) ([douglasmiller](https://github.com/douglasmiller))

## [3.9.0](https://github.com/recurly/recurly-client-php/tree/3.9.0) (2020-10-20)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.8.1...3.9.0)

**Implemented enhancements:**

- Mon Oct 19 20:43:37 UTC 2020 Upgrade API version v2019-10-10 [\#559](https://github.com/recurly/recurly-client-php/pull/559) ([douglasmiller](https://github.com/douglasmiller))
- Adding \Recurly\Logger class and the ability to configure a logger [\#506](https://github.com/recurly/recurly-client-php/pull/506) ([douglasmiller](https://github.com/douglasmiller))

**Closed issues:**

- Custom Fields changed from 3.7.0 to 3.8.0 [\#558](https://github.com/recurly/recurly-client-php/issues/558)

**Merged pull requests:**

- Release 3.9.0 [\#560](https://github.com/recurly/recurly-client-php/pull/560) ([douglasmiller](https://github.com/douglasmiller))

## [3.8.1](https://github.com/recurly/recurly-client-php/tree/3.8.1) (2020-10-02)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.8.0...3.8.1)

**Implemented enhancements:**

- Adding \Recurly\Request to \Recurly\Response [\#543](https://github.com/recurly/recurly-client-php/pull/543) ([douglasmiller](https://github.com/douglasmiller))

**Fixed bugs:**

- Updating to be compliant with RFC 2616 [\#545](https://github.com/recurly/recurly-client-php/pull/545) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.8.1 [\#557](https://github.com/recurly/recurly-client-php/pull/557) ([douglasmiller](https://github.com/douglasmiller))

## [3.8.0](https://github.com/recurly/recurly-client-php/tree/3.8.0) (2020-09-22)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.7.0...3.8.0)

**Implemented enhancements:**

- Latest Changes for 2019-10-10 [\#541](https://github.com/recurly/recurly-client-php/pull/541) ([douglasmiller](https://github.com/douglasmiller))
- Latest Changes for 2019-10-10 \(Automated Exports, additional resource data methods\) [\#537](https://github.com/recurly/recurly-client-php/pull/537) ([douglasmiller](https://github.com/douglasmiller))

**Fixed bugs:**

- Fixing casting for list types that are not in pagers [\#539](https://github.com/recurly/recurly-client-php/pull/539) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.8.0 [\#542](https://github.com/recurly/recurly-client-php/pull/542) ([douglasmiller](https://github.com/douglasmiller))

## [3.7.0](https://github.com/recurly/recurly-client-php/tree/3.7.0) (2020-08-31)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.6.0...3.7.0)

**Implemented enhancements:**

- Mon Aug 31 19:51:28 UTC 2020 Upgrade API version v2019-10-10 [\#535](https://github.com/recurly/recurly-client-php/pull/535) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.7.0 [\#536](https://github.com/recurly/recurly-client-php/pull/536) ([douglasmiller](https://github.com/douglasmiller))
- Code of Conduct [\#534](https://github.com/recurly/recurly-client-php/pull/534) ([bhelx](https://github.com/bhelx))

## [3.6.0](https://github.com/recurly/recurly-client-php/tree/3.6.0) (2020-08-21)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.5.0...3.6.0)

**Implemented enhancements:**

- Fri Aug 21 16:27:03 UTC 2020 Upgrade API version v2019-10-10 [\#532](https://github.com/recurly/recurly-client-php/pull/532) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.6.0 [\#533](https://github.com/recurly/recurly-client-php/pull/533) ([douglasmiller](https://github.com/douglasmiller))

## [3.5.0](https://github.com/recurly/recurly-client-php/tree/3.5.0) (2020-07-31)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.4.0...3.5.0)

**Implemented enhancements:**

- Latest Changes for 2019-10-10 \(usage, measured units, etc\) [\#527](https://github.com/recurly/recurly-client-php/pull/527) ([bhelx](https://github.com/bhelx))

**Fixed bugs:**

- Warning in recurly\_resource.php @ line 113 [\#524](https://github.com/recurly/recurly-client-php/issues/524)

**Merged pull requests:**

- Release 3.5.0 [\#528](https://github.com/recurly/recurly-client-php/pull/528) ([douglasmiller](https://github.com/douglasmiller))
- Null checking variable before calling property\_exists to prevent Warning [\#525](https://github.com/recurly/recurly-client-php/pull/525) ([douglasmiller](https://github.com/douglasmiller))
- Updates array syntax to modern format [\#521](https://github.com/recurly/recurly-client-php/pull/521) ([douglasmiller](https://github.com/douglasmiller))
- Mon Jul  6 14:54:15 UTC 2020 Upgrade API version v2019-10-10 [\#515](https://github.com/recurly/recurly-client-php/pull/515) ([douglasmiller](https://github.com/douglasmiller))

## [3.4.0](https://github.com/recurly/recurly-client-php/tree/3.4.0) (2020-07-01)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.3.0...3.4.0)

**Implemented enhancements:**

- Wed Jul  1 02:11:57 UTC 2020 Upgrade API version v2019-10-10 [\#513](https://github.com/recurly/recurly-client-php/pull/513) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.4.0 [\#514](https://github.com/recurly/recurly-client-php/pull/514) ([douglasmiller](https://github.com/douglasmiller))

## [3.3.0](https://github.com/recurly/recurly-client-php/tree/3.3.0) (2020-06-30)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.2.0...3.3.0)

**Implemented enhancements:**

- Mon Jun 29 17:06:38 UTC 2020 Upgrade API version v2019-10-10 [\#510](https://github.com/recurly/recurly-client-php/pull/510) ([douglasmiller](https://github.com/douglasmiller))
- Convert DateTime objects to ISO8601 strings [\#504](https://github.com/recurly/recurly-client-php/pull/504) ([douglasmiller](https://github.com/douglasmiller))

**Fixed bugs:**

- Fix HTTP 411 error by including Content-Length header [\#509](https://github.com/recurly/recurly-client-php/pull/509) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.3.0 [\#511](https://github.com/recurly/recurly-client-php/pull/511) ([douglasmiller](https://github.com/douglasmiller))

## [3.2.0](https://github.com/recurly/recurly-client-php/tree/3.2.0) (2020-06-01)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.1.1...3.2.0)

**Implemented enhancements:**

- Latest Features [\#501](https://github.com/recurly/recurly-client-php/pull/501) ([bhelx](https://github.com/bhelx))

**Merged pull requests:**

- Release 3.2.0 [\#502](https://github.com/recurly/recurly-client-php/pull/502) ([bhelx](https://github.com/bhelx))
- \[Internal\] Disabling 'composer dump-autoload' in codefresh [\#499](https://github.com/recurly/recurly-client-php/pull/499) ([douglasmiller](https://github.com/douglasmiller))

## [3.1.1](https://github.com/recurly/recurly-client-php/tree/3.1.1) (2020-05-06)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.1.0...3.1.1)

**Fixed bugs:**

- Parsing 'false' as null inside the v3 API [\#495](https://github.com/recurly/recurly-client-php/issues/495)

**Merged pull requests:**

- Release 3.1.1 [\#497](https://github.com/recurly/recurly-client-php/pull/497) ([douglasmiller](https://github.com/douglasmiller))
- Make returns nullable [\#496](https://github.com/recurly/recurly-client-php/pull/496) ([bhelx](https://github.com/bhelx))
- Ensure that path parameters are not empty strings [\#494](https://github.com/recurly/recurly-client-php/pull/494) ([douglasmiller](https://github.com/douglasmiller))

## [3.1.0](https://github.com/recurly/recurly-client-php/tree/3.1.0) (2020-04-20)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.0.1...3.1.0)

**Merged pull requests:**

- Release 3.1.0 [\#493](https://github.com/recurly/recurly-client-php/pull/493) ([douglasmiller](https://github.com/douglasmiller))
- Tue Apr 14 20:57:43 UTC 2020 Upgrade API version v2019-10-10 [\#492](https://github.com/recurly/recurly-client-php/pull/492) ([douglasmiller](https://github.com/douglasmiller))
- Included the to-be released changes in the changelog [\#491](https://github.com/recurly/recurly-client-php/pull/491) ([douglasmiller](https://github.com/douglasmiller))
- Adding phpDocumentor and ./scripts/docs [\#489](https://github.com/recurly/recurly-client-php/pull/489) ([douglasmiller](https://github.com/douglasmiller))
- Updating release script to be uniform across all clients [\#487](https://github.com/recurly/recurly-client-php/pull/487) ([douglasmiller](https://github.com/douglasmiller))
- Thu Mar 26 20:48:25 UTC 2020 Upgrade API version v2019-10-10 [\#484](https://github.com/recurly/recurly-client-php/pull/484) ([bhelx](https://github.com/bhelx))

## [3.0.1](https://github.com/recurly/recurly-client-php/tree/3.0.1) (2020-03-20)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.0.0...3.0.1)

**Implemented enhancements:**

- Enable gzip compression on HTTP responses [\#475](https://github.com/recurly/recurly-client-php/pull/475) ([douglasmiller](https://github.com/douglasmiller))

**Merged pull requests:**

- Release 3.0.1 [\#481](https://github.com/recurly/recurly-client-php/pull/481) ([douglasmiller](https://github.com/douglasmiller))
- Fri Mar 20 17:48:03 UTC 2020 Upgrade API version v2019-10-10 [\#480](https://github.com/recurly/recurly-client-php/pull/480) ([douglasmiller](https://github.com/douglasmiller))
- Adding release scripts [\#478](https://github.com/recurly/recurly-client-php/pull/478) ([douglasmiller](https://github.com/douglasmiller))
- Reducing minimum php version from 7.3 to 7.2 [\#473](https://github.com/recurly/recurly-client-php/pull/473) ([douglasmiller](https://github.com/douglasmiller))
- Adding parameter comment and including formatted code [\#468](https://github.com/recurly/recurly-client-php/pull/468) ([douglasmiller](https://github.com/douglasmiller))

## [3.0.0](https://github.com/recurly/recurly-client-php/tree/3.0.0) (2020-03-03)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.0.0-beta5...3.0.0)

**Merged pull requests:**

- Updating version to GA 3.0.0 [\#467](https://github.com/recurly/recurly-client-php/pull/467) ([douglasmiller](https://github.com/douglasmiller))
- Adding and Updating Pager tests [\#466](https://github.com/recurly/recurly-client-php/pull/466) ([douglasmiller](https://github.com/douglasmiller))
- \[V3\] Mock Client [\#461](https://github.com/recurly/recurly-client-php/pull/461) ([bhelx](https://github.com/bhelx))

## [3.0.0-beta5](https://github.com/recurly/recurly-client-php/tree/3.0.0-beta5) (2020-02-21)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.0.0-beta2...3.0.0-beta5)

## [3.0.0-beta2](https://github.com/recurly/recurly-client-php/tree/3.0.0-beta2) (2020-02-14)

[Full Changelog](https://github.com/recurly/recurly-client-php/compare/3.0.0-beta1...3.0.0-beta2)



\* *This Changelog was automatically generated by [github_changelog_generator](https://github.com/github-changelog-generator/github-changelog-generator)*
