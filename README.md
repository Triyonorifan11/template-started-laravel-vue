# STARTED TEMPLATE LARAVEL 10 VUE

STARTED TEMPLATE LARAVEL 10 VUE

## Table of Contents

- [STARTED TEMPLATE LARAVEL 10 VUE](#started-template)
  - [Table of Contents](#table-of-contents)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
  - [Running server development](#running-server-development)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them.

-   [PHP v8.2](https://www.php.net/downloads.php)
-   [Composer](https://getcomposer.org/download/)
-   [Postgresql v11.14](https://www.postgresql.org/download/)
-   [PHP Modules]

        bcmath
        bz2
        calendar
        Core
        ctype
        curl
        date
        dom
        exif
        FFI
        fileinfo
        filter
        ftp
        gd
        gettext
        hash
        iconv
        igbinary
        imagick
        imap
        intl
        json
        ldap
        libxml
        mbstring
        openssl
        pcntl
        pcre
        PDO
        pdo_pgsql
        pdo_sqlite
        pgsql
        Phar
        posix
        random
        readline
        redis
        Reflection
        session
        shmop
        SimpleXML
        soap
        sockets
        sodium
        SPL
        sqlite3
        standard
        sysvmsg
        sysvsem
        sysvshm
        tokenizer
        xml
        xmlreader
        xmlwriter
        xsl
        Zend OPcache
        zip
        zlib

        [Zend Modules]
        Zend OPcache
-   [Postman](https://www.postman.com/downloads/)
-   [NPM v10.7.0](https://www.npmjs.com/)
-   [Node JS v20.14.0](https://www.npmjs.com/)

### Installation

A step-by-step guide on setting up the project locally.

1. Clone the repository.

```bash
git clone https://github.com/Triyonorifan11/template-started-laravel-vue
```

2. Navigate into the directory.

```bash
cd template-started-laravel-vue
```

3. Install the dependencies.

```bash
composer install
```

4. Copy file `.env.example` to `.env` and configured database setting, midtrans setting and anything want do you want.

```bash
cp .env.example .env
```

5. Generate key using this command.

```bash
php artisan key:generate
```

6. Running migration for initiate data province, city, district, villange for country indonesia.

```bash
php artisan laravolt:indonesia:seed
```

7. Running migration and seeder for intial data.

```bash
php artisan migrate --seed
```

8. Running log viewer

```bash
php artisan log-viewer:publish
```

8. Running ls swagger for Api documentation

```bash
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```

```bash
 php artisan l5-swagger:generate
```

9. Install depedencies using this command.

```bash
npm install
```

10. Build frontend section, if case this frontend is not reload

```bash
npm run build
```

## Running server development

How to running server developement.

1. Running for application using development environment for backend.

```bash
php artisan serve
```

2. Running for application using development environment for frontned.

```bash
npm run dev
```
