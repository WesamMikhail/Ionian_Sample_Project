# Ionian Sample Project

This project actually contains 2 samples. One sample is using the Rapid routing which is basically a fast prototyping router.
The second one is using Defined which is a REST Router that supports GET, POST, PUT and DELETE verbs.

# Installation

1. Clone the project and run the following command in the **/Rapid** as well as **/Defined** folders

```
composer install
```

2. After running the composer command, import the **articles.sql** file into your mysql DB. The DB name should later on be inserted into **settings.json in each folder**

# Usage

**Rapid**

This routing mechanism uses the following pattern: GET|POST /controller/action/param

This means that **GET /articles/list** will initiate **ArticlesController->listAction()**

This routing mechanism does not distinguish between HTTP verbs. They are all the same!

See **/Rapid/index.php** for more info


**Defined**

Defined is a REST router with the following possible routes:

- **GET /articles**         will redirect to **ArticlesController->listAll()**
- **GET /articles/1**       will redirect to **ArticlesController->getSingle(1)**
- **POST /articles**        will redirect to **ArticlesController->addSingle()**

See **/Defined/index.php** for more info.