# Dainik Shahtha — Laravel News Portal

A news portal built on Laravel 5.7. This repository contains the application source, frontend assets, and deployment helpers for a content-driven news website.

**Quick links**
- Project files: [composer.json](composer.json#L1), [package.json](package.json#L1), [webpack.mix.js](webpack.mix.js#L1)
- Key folders: [app](app), [routes/web.php](routes/web.php#L1), [public/index.php](public/index.php#L1)

## Requirements

- PHP 7.1.3+ (project requires PHP ^7.1.3)
- Composer
- Node.js + npm (for frontend assets)
- MySQL or another supported database

## Installation

1. Clone the repository:

	`git clone <repo-url> && cd dainikShahtha`

2. Install PHP dependencies:

	`composer install`

3. Copy and configure environment file:

	`cp .env.example .env`

	Edit `.env` to set the database and other credentials.

4. Generate an application key:

	`php artisan key:generate`

5. Run database migrations (and seeders if present):

	`php artisan migrate --seed`

6. Install and build frontend assets:

	`npm install`
	`npm run dev` (or `npm run production` for production builds)

7. Ensure storage and bootstrap directories are writable:

	`chmod -R 775 storage bootstrap/cache`

8. (Optional) Create the storage symlink for public file access:

	`php artisan storage:link`

## Running the application (local)

- Start the built-in server: `php artisan serve` — app will be available at `http://127.0.0.1:8000`.
- Or configure a virtual host pointing to the `public/` directory in your web server.

## Tests

- Run the test suite with: `vendor/bin/phpunit`

## Deployment

- Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
- Run migrations with `php artisan migrate --force`.
- Cache config/routes: `php artisan config:cache && php artisan route:cache`.
- Build production assets: `npm run production`.

## Project structure (high level)

- `app/` — application code (models, controllers, middleware)
- `routes/web.php` — main web routes
- `resources/views/` — Blade templates and views
- `public/` — public web root (index.php, assets)
- `database/migrations` — database schema
- `database/seeds` — seed data for development

## Contributing

Contributions are welcome. Please open issues or pull requests describing changes. Follow the existing code style and include tests where appropriate.

## License

This project uses the MIT license (see `composer.json`).

---

If you want, I can also:
- run the test suite locally, or
- create a short CONTRIBUTING.md and a deployment checklist.

Updated: tailored README for this repository.
