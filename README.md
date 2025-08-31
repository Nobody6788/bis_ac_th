# Pinnacle International School Website

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Built with Laravel">
</p>

<p align="center">
  A modern, responsive school website built with Laravel 12.0 and modern frontend technologies.
</p>

## About This Project

This is a comprehensive school website for Pinnacle International School, showcasing modern web development practices with Laravel. The website features:

### 🏫 School Features
- **Complete School Information System** - Programs, admissions, faculty details
- **Multilingual Support** - Ready for internationalization with translation keys
- **Modern UI/UX** - Responsive design with Tailwind CSS
- **Interactive Elements** - Contact forms, virtual tours, photo galleries
- **SEO Optimized** - Proper meta tags and semantic HTML structure

### 🛠 Technical Features
- **Laravel 12.0** - Latest Laravel framework with PHP 8.2+
- **Vite Build System** - Modern asset bundling and hot reload
- **Tailwind CSS** - Utility-first CSS framework
- **Blade Templates** - Powerful templating engine
- **MVC Architecture** - Clean separation of concerns
- **Database Ready** - Migration files for user management and more

## Quick Start

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js (v16+ recommended)
- NPM or Yarn

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd project1
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install frontend dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # Configure your database in .env file
   php artisan migrate
   ```

6. **Build assets and start development**
   ```bash
   # Start all development services (recommended)
   composer run dev
   
   # Or manually start services
   npm run dev          # Frontend assets with hot reload
   php artisan serve    # Development server
   ```

### Development Commands

- `composer run dev` - Start all development services (server, queue, logs, vite)
- `npm run build` - Build production assets
- `npm run dev` - Start Vite development server with hot reload
- `php artisan serve` - Start Laravel development server
- `composer run test` - Run tests with configuration clearing

## Project Structure

```
project1/
├── app/
│   ├── Http/Controllers/     # Request handling logic
│   │   ├── HomeController.php
│   │   └── HomepageController.php
│   ├── Models/              # Database models
│   │   └── User.php
│   └── Providers/           # Service providers
├── resources/
│   ├── views/               # Blade templates
│   │   ├── layouts/
│   │   ├── homepage.blade.php  # Main school website
│   │   └── welcome.blade.php   # Laravel welcome page
│   ├── css/                 # Stylesheets
│   └── js/                  # JavaScript files
├── routes/
│   └── web.php              # Web routes definition
├── database/
│   ├── migrations/          # Database schema
│   └── factories/           # Model factories
└── public/                  # Web root
```

## Features Overview

### 🎓 School Website Sections
- **Hero Section** - Engaging introduction with key statistics
- **Programs** - Academic programs by grade level (K1-G12)
- **About** - School information and history
- **Gallery** - Photo showcase of facilities
- **News & Events** - Latest school updates
- **Admissions** - Application process and requirements
- **Contact** - Contact form and school information

### 🌐 Technical Highlights
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Performance Optimized** - Vite for fast builds and hot reload
- **SEO Ready** - Proper meta tags and structured content
- **Multilingual Ready** - Translation system prepared
- **Modern PHP** - Laravel 12.0 with PHP 8.2+ features

## Development Tools

### Available Scripts
- **`composer run dev`** - Concurrent development (server + queue + logs + vite)
- **`composer run test`** - Run test suite with config clearing
- **`npm run build`** - Production asset build
- **`npm run dev`** - Development with hot reload

### Code Quality
- **Laravel Pint** - Code style fixing
- **PHPUnit** - Testing framework
- **Laravel Pail** - Log monitoring

### Database
- User management system with migrations
- Cache and job queue tables included
- Factory and seeder patterns ready

## Customization

### Styling
- Modify `resources/css/app.css` for custom styles
- Tailwind CSS configuration in root directory
- Color scheme and themes in CSS variables

### Content
- Update school information in `resources/views/homepage.blade.php`
- Modify routes in `routes/web.php`
- Add new controllers in `app/Http/Controllers/`

### Configuration
- Environment settings in `.env`
- App configuration in `config/` directory
- Database settings in `config/database.php`

## Deployment

### Production Setup
1. Set `APP_ENV=production` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `php artisan view:cache`
5. Build assets with `npm run build`

### Server Requirements
- PHP 8.2+
- MySQL/PostgreSQL/SQLite
- Composer
- Node.js (for asset building)

## Technology Stack

- **Backend**: Laravel 12.0, PHP 8.2+
- **Frontend**: Vite, Tailwind CSS 4.0, Axios
- **Database**: MySQL/PostgreSQL/SQLite support
- **Testing**: PHPUnit
- **Code Quality**: Laravel Pint
- **Development**: Laravel Sail (Docker), Concurrently

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For Laravel framework documentation and support:
- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [Laracasts](https://laracasts.com)
