# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Key Features

1. CodeIgniter 4.1.6
2. PHP v7.3.21
3. [Faker](https://fakerphp.github.io/) generate data test
4. Seeders
5. Fabricators Models
6. RESTfull API
7. Library [codeigniter4-cors](https://github.com/agungsugiarto/codeigniter4-cors)

## Installation

Once the project is downloaded, rename the `env` file to `.env`

Open the .env file and change the value of `CI ENVIRONMENT` to `development`, when you deploy your project change this value to `production`
```
CI_ENVIRONMENT = development
```

Write the global url that you will occupy for the whole project this in the file `.env` in:
```
app.baseURL = 'project_url/'
```

Now configure the accesses for your `DB`, this is important because the migration and the seeder will be executed on it. It is configured in the `.env` file or in `app/Config/Database.php`
```
/* Modify the value of the variables according to your needs */
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'nameYourDataBase'

```

Since you have made your DB and have the variables of the db configured, in the terminal position yourself on the root of the project and execute the following command to execute the migration
```
> php spark migrate
```

Finally run the seeder with
```
> php spark db: seed
```
