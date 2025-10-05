# Dashboard App Boilerplate

A modern boilerplate for building **dashboard applications** in PHP. This project combines a lightweight framework with powerful tools for dependency management, templating, database interactions, and testing.

## Features

- **Slim Framework** – Fast and minimal PHP framework for routing and middleware.
- **PHP-DI** – Dependency injection container to manage services and dependencies.
- **Doctrine ORM** – Robust and flexible database ORM for PHP.
- **Twig** – Templating engine for clean and maintainable views.
- **vlucas/phpdotenv** – Manage environment variables in `.env` files.
- **PHPUnit** – Unit testing framework to ensure code quality.

## Requirements

- PHP 8.1+
- Composer
- MySQL, PostgreSQL, or any database supported by Doctrine ORM

## Installation

1. Clone the repository:

```bash
git clone https://github.com/FotisKal/dashboard-app-boilerplate.git
cd dashboard-boilerplate
```

2. Install dependencies:

```bash
composer install
```

3. Copy the `.env.example` file to `.env` and configure your environment variables:

```bash
cp .env.example .env
```

4. Configure your database credentials in `.env`.

5. Set up the database (Doctrine will manage migrations):

```bash
php vendor/bin/doctrine orm:schema-tool:create
```

## Usage

### Running the App

Start the built-in PHP server:

```bash
php -S localhost:8080 -t public
```

Navigate to `http://localhost:8080` in your browser.

### Adding Routes

Routes are defined in `src/routes.php`:

```php
$app->get('/dashboard', \App\Controllers\DashboardController::class . ':index');
```

### Creating Controllers

Controllers live in `src/Controllers`:

```php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class DashboardController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write($this->twig->render('dashboard.twig'));
        return $response;
    }
}
```

### Templates

Twig templates are stored in `views/`:

```twig
<!-- views/dashboard.twig -->
<h1>Welcome to the Dashboard</h1>
```

### Testing

Run PHPUnit tests:

```bash
vendor/bin/phpunit
```

## Project Structure

```
.
├── public/                 # Publicly accessible files (entry point)
├── src/                    # Application source code
│   ├── Controllers/        # Controller classes
│   ├── Entities/           # Doctrine entities
│   ├── Repositories/       # Custom repositories
│   └── routes.php          # Application routes
├── views/                  # Twig templates
├── tests/                  # PHPUnit tests
├── .env.example            # Environment variable example
├── composer.json
└── README.md
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add YourFeature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License.

