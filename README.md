# StarCurrency

A professional cryptocurrency business platform built with **Laravel 11**, **Bootstrap 5**, and **PostgreSQL**.

Design direction: "Celestial Ledger" — a deep-space navy surface with muted starlight-gold and
nebula-violet accents, a serif display face (Fraunces) paired with Inter and JetBrains Mono for
data. Built to read as institutional and trustworthy rather than a generic crypto template.

## Stack

- **Backend:** PHP 8.2+, Laravel 11
- **Frontend:** Blade templates, Bootstrap 5.3, Bootstrap Icons, custom CSS design system
- **Database:** PostgreSQL
- **Pages:** Home, About, Services (with pricing), Live Market, Contact (working form),
  Newsletter signup — all backed by real Eloquent models and migrations

## Folder structure

```
starcurrency/
├── app/
│   ├── Http/Controllers/     HomeController, ContactController, NewsletterController
│   └── Models/                Cryptocurrency, ContactMessage, Subscriber, Testimonial
├── bootstrap/                 Laravel 11 app bootstrap
├── config/                    app, database (pgsql), session, cache, mail, queue, filesystems, logging
├── database/
│   ├── migrations/            users, sessions, cache/jobs, cryptocurrencies, contact_messages,
│   │                           subscribers, testimonials — all PostgreSQL-ready
│   └── seeders/                sample market data + testimonials
├── public/                    front controller, .htaccess, css/app.css, js/app.js
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── partials/               navbar.blade.php, footer.blade.php
│   └── home/                   index, about, services, market, contact
├── routes/web.php
├── storage/                    cache, sessions, views, logs (writable)
├── .env.example                pre-configured for PostgreSQL
└── composer.json
```

## Setup

1. **Install dependencies**
   ```bash
   composer install
   ```

2. **Configure the environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Then edit `.env` and set your PostgreSQL credentials:
   ```
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=starcurrecy
   DB_USERNAME=postgres
   DB_PASSWORD=your_password
   ```

3. **Create the database** (PostgreSQL)
   ```bash
   createdb starcurrecy
   # or, from psql:
   # CREATE DATABASE starcurrecy;
   ```

4. **Run migrations and seed sample data**
   ```bash
   php artisan migrate --seed
   ```

5. **Serve the app**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000`.

## Notes

- The market prices in `CryptocurrencySeeder` are illustrative placeholder data — wire in a real
  market data provider (e.g. via a scheduled job hitting an exchange API) to make the ticker live.
- The contact form and newsletter signup persist to `contact_messages` and `subscribers` tables —
  hook up a `Mail` notification in `ContactController`/`NewsletterController` if you want email
  alerts as well.
- Bootstrap 5, Bootstrap Icons, and Google Fonts are loaded via CDN in
  `resources/views/layouts/app.blade.php` — swap for local assets if you need to run fully offline.
- `vendor/` is intentionally not included; run `composer install` to generate it.
