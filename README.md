# Simple Laravel Blog

A simple and clean blog platform built with Laravel, featuring basic post management, Blade templating, and modern Laravel best practices.

## Features

- CRUD operations for blog posts and categories  
- User authentication (login/logout)  
- Blade templating with reusable layouts and partials  
- Localization support (English and Persian)  
- Responsive admin panel  
- Database migrations and seeders  
- Docker and Docker Compose support for easy setup  

## Requirements

- PHP >= 8.0  
- Composer  
- MySQL or compatible database  
- Node.js and npm (for frontend assets)  

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Erfan-Mohamadi/simple-laravel-blog.git
   cd simple-laravel-blog

### 2. Install PHP dependencies:

```bash
composer install
```

Edit `.env` and set your DB credentials, mail settings, etc.

### 3. Install Node.js dependencies and build assets:

```bash
npm install
npm run dev
```

### 4. Copy the example environment file and set your configuration:

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
docker-compose exec app php artisan key:generate
```

### 6. Configure your .env file database settings.


### 7. Run database migrations and seeders:

```bash
php artisan migrate --seed
```

### 8. Generate application key:

```bash
php artisan key:generate
```

### 9. (Optional) If you want to run via Docker:

```bash
docker-compose up -d
```

### 10. Serve the application:

```bash
php artisan serve
```

### 11. Visit http://localhost:8000 in your browser.

Usage
Access the admin panel to manage posts, categories, and sliders.

Use localization toggles for Persian and English languages.

Contributing
Feel free to fork the repository and submit pull requests.

## 📝 License

This project is open-sourced under the [MIT license](LICENSE).
