# Summary

This project was created with `Laravel 8`. This project is password management. We have two primary entities. First, `Credential Type` such a **Google**, **Yahoo**, Second, `Credential` that it is an instance of a credential type. For example, **My google account**. We can have some different accounts (Credential) on one website (Credential Type). The technologies used in this project are `Laravel` as a core of the software, `MySQL` as a database, `LiveWire` as a front-end helper. This app is almost responsive. Also, I've prepared `Dockerfile` for this project that you can use for the DevOps side. `.gitlab-ci.yml` will be added in the next update to handle CI/CD.

## Getting Started

For starting you should install dependencies packages by the composer:

```bash
composer install
```

After install composer packages, you should create a MySQL database & change the `DB_DATABASE` value to the database name in the .env file. After these steps you should enter the below commands to create tables in the database:

```bash
php artisan migrate
```

To fill database records (Create sample user, credential types, and credentials) you should fill the database with the below command:

```bash
php artisan db:seed
```

## Requirements

| Name | Version |
|---|---|
| PHP | ^7.3 |
| LiveWire | ^2.4 |
| MySQL | ^5.7 |

## Environment

Environment variables are in the .env.example that should be copied in the .env file.

## Contributing

MohammadReza Haghighi: [LinkedIn Account](https://www.linkedin.com/in/mr-haghighi/)
MohammadReza Haghighi: [Github](https://github.com/mrhaghighi)
