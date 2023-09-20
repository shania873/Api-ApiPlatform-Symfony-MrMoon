# Api Mrs Moon

Pour les différents projets que je souhaiterais montrer sur mon github, je me suis permise de faire cette api pour pouvoir construire mes applications en React et Angular, en montrant en même temps mes compétences en symfony 6 et PHP 8.

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

#### add(num1, num2)

Takes two numbers and returns the sum.

## Tech Stack

**Server:** MySQL, PHP 8.1, Symfony 6.3

## Acknowledgements

- [PHP 8 ](https://www.php.net/manual/fr/install.php)
- [MySQL](https://dev.mysql.com/downloads/installer/)
