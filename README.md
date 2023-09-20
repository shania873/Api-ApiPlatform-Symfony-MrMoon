# Api Mrs Moon

Pour présenter les différents projets que je souhaite afficher sur mon GitHub, j'ai créé cette API afin de pouvoir développer mes applications en React et Angular, tout en mettant en avant mes compétences en Symfony 6 et PHP 8.

## Lien vers l'api

https://api-mrsmoon.online/api

## Installation

Après avoir récupéré le projet

```bash
  composer install
  php bin/console make:migration
  php bin/console doctrine:migrations:migrate
```

## API Reference

#### Get all items

```http
  GET /api/works
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get item

```http
  GET /api/works/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

## Tech Stack

**Server:** MySQL, PHP 8.1, Symfony 6.3

## Acknowledgements

- [PHP 8 ](https://www.php.net/manual/fr/install.php)
- [MySQL](https://dev.mysql.com/downloads/installer/)
