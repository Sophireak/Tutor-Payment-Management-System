# Tutor Payment Management System

A small tutoring payment management application for managing students and tracking their monthly tuition payments.

## Tech Stack

- **Laravel 13** (PHP 8.3+) — server-rendered with Blade
- **Laravel Sail** — Docker-based local development
- **MySQL 8** — database
- **Tailwind CSS** + **Alpine.js** — styling and small client-side interactions
- **Laravel Breeze** — authentication scaffolding (Blade)
- **Vite** — asset bundling
- **Chart.js** + **Lucide Icons** — charts and icons

## Requirements

You only need **Docker** (Docker Desktop on macOS/Windows, or Docker Engine on Linux).
PHP, Composer, Node, and MySQL are *not* required on your machine — Sail runs them all in containers.

## Getting Started

```bash
# 1. Install the PHP dependencies (first time only — you'll need PHP + Composer locally for this step,
#    or run it inside the container as described below)
composer install

# 2. Create your environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 3. Start the application (builds the containers on the first run)
./vendor/bin/sail up -d

# 4. Run the database migrations
./vendor/bin/sail artisan migrate

# 5. Install and build the front-end assets
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

Then open **http://localhost** and register an account.

> **Don't have PHP/Composer installed locally?** Start the containers first
> (`docker run --rm -v $(pwd):/opt -w /opt laravelsail/php84-composer:latest composer install`),
> then use `./vendor/bin/sail` for everything else.

### Everyday commands

```bash
./vendor/bin/sail up -d        # start in the background
./vendor/bin/sail down         # stop the containers
./vendor/bin/sail artisan ...  # run an Artisan command (e.g. migrate, tinker)
./vendor/bin/sail composer ... # run Composer inside the container
./vendor/bin/sail npm ...      # run npm inside the container
./vendor/bin/sail mysql        # open the MySQL shell
./vendor/bin/sail test         # run the test suite
```

## How Docker + Sail fit together

**Containers used** (defined in `compose.yaml`):

1. **`laravel.test`** — the application container. It contains PHP 8.4, Composer,
   and Node, and serves the app on port 80. This is where `artisan`, `composer`,
   and `npm` commands run.
2. **`mysql`** — the database container, running MySQL 8.4. Data is stored in a
   Docker volume named `sail-mysql`, so it survives container restarts.

**What Laravel Sail does:** Sail is a thin command-line wrapper (the `./vendor/bin/sail`
script) around Docker Compose. When you type `sail artisan migrate`, it runs
`artisan migrate` *inside* the `laravel.test` container for you — so you don't
need PHP or MySQL installed on your own computer.

**How Laravel talks to MySQL:** both containers are attached to the same Docker
network (`sail`), so the app can reach the database using its container/service
name as the hostname. That's why the `.env` file uses `DB_HOST=mysql` — from the
app container's point of view, `mysql` resolves to the database container.

## Current Status

This is **Phase 1 — Foundation**: project scaffolding, Docker/Sail setup, Breeze
authentication, and a responsive admin layout (sidebar + top navigation) with a
Dashboard and placeholder navigation for Students, Payments, and Reports.
Student/payment functionality will be added in later phases.
