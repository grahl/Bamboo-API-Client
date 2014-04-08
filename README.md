# Bamboo REST API client

An API client consuming the [REST resources][1] made available for Atlassian's
CI software - Bamboo

## Installation

Add this line to your composer.json file, and run `composer update`

```json
"peterjmit/bamboo-api-client": "~0.1.0"
```

## Usage

Create an API client using http basic authentication

```php
<?php
use  Peterjmit\Bamboo\Bamboo;

$bamboo = Bamboo::create('bamboo.com', 'username', 'password');
```

Specify an API version

```php
<?php
$bamboo = Bamboo::create('bamboo.com', 'username', 'password', 1);
```

### Methods

Get all build results

```php
<?php
$bamboo->getAllBuildResults();
```

Get build results for a plan

```php
<?php
$bamboo->getPlanResults('AN', 'EXAMPLE');
```

Get build results for a plan branch

```php
<?php
$bamboo->getPlanBranchResults('AN', 'EXAMPLE', 'my-cool-feature-branch');
```

Get plan information for a specific branch

```php
<?php
$bamboo->getPlanBranch('AN', 'EXAMPLE', 'my-cool-feature-branch');
```

## Todo

* Implement all [endpoints/resources][1]
* Create objects to represent resources
* Utilize "expand" functionality in bamboo
* Use HATEOS links to load relations to returned objects

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

[1]: https://developer.atlassian.com/display/BAMBOODEV/Bamboo+REST+Resources#BambooRESTResources-BuildService—SpecificPlan
