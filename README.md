# Ionian Sample Project

This project actually contains 2 example project settings. One sample is using the Rapid routing which is basically a fast prototyping router.
The second one is using Defined which is a REST Router that supports GET, POST, PUT and DELETE verbs.

# Installation

1. Clone the project and run composer in the root folder

```
composer install
```

2. After running the composer command, import the **Project/articles.sql** file into your mysql DB.
The DB name should later on be inserted into **Project/settings.json**

3. Depending on which example you want to see running, you have to update your .htaccess file as follows

```
# .htaccess file

# To see Rapid example
RewriteEngine On
RewriteRule ^(.*)$ example_rapid.php [PT,L]

# To see Defined

RewriteEngine On
RewriteRule ^(.*)$ example_defined.php [PT,L]

```


# Usage

**Rapid**

This routing mechanism uses the following pattern: HTTP_VERB /controller/action/param

This means that **GET /articles/list** will initiate **ArticlesController->listAction()**

This routing mechanism does not distinguish between HTTP verbs. They are all the same!

See **example_rapid.php** for more info


**Defined**

Defined is a REST router with the following possible routes:

- **GET /articles**         will redirect to **ArticlesController->listAll()**
- **GET /articles/1**       will redirect to **ArticlesController->getSingle(1)**
- **POST /articles**        will redirect to **ArticlesController->addSingle()**

See **example_defined.php** for more info.


# TODO

- fix README to point out how to add your own project namespace in composer.json for autoloading instead of the default Project\\ namespace