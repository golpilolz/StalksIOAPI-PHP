# StalksIOAPI PHP
Unofficial PHP library for https://stalks.io API

## Installation

````bash
composer require golpilolz/stalksioapi
````

## Usage
### Initialisation
Init `StalksIOApi` with the API Key

````php
<?php
  $api = new StalksIOApi('1234567890abcdefghijklm0987654321');
````

### Available methods

#### Weeks

Current Week

````php
<?php
  $api->currentWeek();
````

If you want specific week just add the date (If date is not a sunday the function find the sunday before)

````php
<?php
  $api->week(new DateTime('now'));
````

#### Friends

List all user's friends

````php
<?php
  $api->friends();
````

#### Profile

````php
<?php
  $api->getUserProfile("someone");
````

````php
<?php
  $api->currentUser();
````

````php
<?php
  $api->updatePassport($passport);
````
