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
- MySQL or compatible database

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
   php artisan migrate --seed
   ```

6. **Build assets and start development**
   ```bash
   # Start all development services (recommended)
   composer run dev
   
   # Or manually start services
   npm run dev          # Frontend assets with hot reload
   php artisan serve    # Development server
   ```

7. **Create storage link for public file access**
   ```bash
   php artisan storage:link
   ```

### Development Commands

- `composer run dev` - Start all development services (server, queue, logs, vite)
- `npm run build` - Build production assets
- `npm run dev` - Start Vite development server with hot reload
- `php artisan serve` - Start Laravel development server
- `composer run test` - Run tests with configuration clearing
- `./vendor/bin/pint` - Format code with Laravel Pint
- `php artisan cache:clear` - Clear application cache
- `php artisan view:clear` - Clear view cache

### Admin Access

1. After running seeders, use the default admin account:
   - Email: admin@example.com
   - Password: password

2. Access the admin dashboard at `/admin`

3. Change the default password immediately after first login

## Project Structure

```
project1/
├── app/
│   ├── Http/Controllers/     # Request handling logic
│   │   ├── Admin/            # Admin controllers
│   │   │   ├── AdminController.php       # Dashboard
│   │   │   ├── ContentController.php     # Content management
│   │   │   ├── GalleryController.php     # Gallery management
│   │   │   ├── NewsController.php        # News management
│   │   │   ├── ProgramController.php     # Programs management
│   │   │   ├── SiteImageController.php   # Site images management
│   │   │   ├── StaffController.php       # Staff management
│   │   │   └── UserController.php        # User management
│   │   ├── Auth/             # Authentication controllers
│   │   ├── HomeController.php
│   │   └── HomepageController.php
│   ├── Models/              # Database models
│   │   ├── ContentSection.php  # Dynamic content management
│   │   ├── GalleryImage.php    # Gallery images
│   │   ├── NewsItem.php        # News articles
│   │   ├── Program.php         # Academic programs
│   │   ├── SiteImage.php       # Website section images
│   │   ├── Staff.php           # Staff profiles
│   │   └── User.php            # User accounts
│   ├── Http/Middleware/     # Request middleware
│   │   ├── AdminMiddleware.php  # Admin access control
│   │   └── LocaleMiddleware.php # Language handling
│   └── Providers/           # Service providers
├── resources/
│   ├── views/               # Blade templates
│   │   ├── admin/           # Admin panel views
│   │   ├── layouts/         # Layout templates
│   │   ├── components/      # Reusable components
│   │   ├── homepage.blade.php  # Main school website
│   │   ├── staff.blade.php     # Staff page
│   │   ├── gallery.blade.php   # Gallery page
│   │   ├── news.blade.php      # News page
│   │   └── welcome.blade.php   # Laravel welcome page
│   ├── lang/                # Language translations
│   │   ├── en/              # English translations
│   │   ├── th/              # Thai translations
│   │   └── ko/              # Korean translations
│   ├── css/                 # Stylesheets
│   └── js/                  # JavaScript files
├── routes/
│   ├── web.php              # Public website routes
│   ├── admin.php            # Admin panel routes
│   └── auth.php             # Authentication routes
├── database/
│   ├── migrations/          # Database schema
│   ├── seeders/             # Database seeders
│   └── factories/           # Model factories
└── public/                  # Web root
```

## Database

### Data Models

- **User Management** 
  - `users` - Authentication and role-based access control (admin, superadmin)
  - `password_reset_tokens` - Password reset functionality
  - `sessions` - User session management

- **Content Management**
  - `content_sections` - Dynamic content for website sections with multilingual support
  - `news_items` - School news articles with publishing controls
  - `programs` - Academic program information
  - `staff` - Teacher and staff profiles

- **Media Management**
  - `gallery_images` - Photo gallery with categories and featured image flags
  - `site_images` - Website section images (hero, about, programs, etc.)

- **System Tables**
  - Cache and job queue tables for Laravel's built-in systems
  - Failed jobs tracking

### Data Features

- **Factories and Seeders** - Sample data for development and testing
- **Eloquent ORM** - Object-relational mapping for database interactions
- **Migrations** - Version-controlled database schema

## Features Overview

### 🎓 School Website Sections
- **Hero Section** - Engaging introduction with dynamic content management and multilingual support
- **Programs** - Academic programs by grade level (K1-G12) with customizable content and images
- **About** - School information and history with editable content sections
- **Gallery** - Photo showcase with featured images, categories, and filtering capabilities
- **News & Events** - Latest school updates with publishing controls and content management
- **Staff** - Teacher profiles with customizable information and sorting
- **Admissions** - Application process and requirements with editable content
- **Contact** - Contact form and school information with configurable details

### 🌐 Technical Highlights
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Content Management System** - Dynamic content editing for all website sections
- **Image Management** - Dedicated systems for gallery images and site-specific images
- **Multilingual Support** - Full translation capabilities for English, Thai, and Korean
- **Admin Dashboard** - Comprehensive statistics and management interface

### 👩‍💼 Admin Features
- **Dashboard** - Overview with statistics and quick access to management sections
- **Content Management** - Edit website content with section-based organization
- **News Management** - Create, edit, and publish school news articles
- **Gallery Management** - Upload, categorize, and feature images in the gallery
- **Site Images** - Manage images for specific website sections (hero, about, etc.)
- **Staff Management** - Add and edit teacher profiles with position and bio
- **Programs Management** - Create and update academic program information
- **User Management** - Control admin access with role-based permissions
- **Debug Content** - Developer tools for content troubleshooting
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

### Content Management
- **Content Sections** - Edit dynamic content through the admin interface
  - Section keys for different website areas (hero, about, admissions, etc.)
  - Support for HTML, Markdown, and plain text content types
  - Multilingual content with language-specific versions

- **News Articles** - Manage school news through the admin interface
  - Publishing controls (draft/published status)
  - Featured image upload
  - Multilingual content support

- **Programs** - Update academic programs through the admin interface
  - Program details with rich text content
  - Custom images for each program
  - Ordering control for display sequence

- **Staff Profiles** - Manage teacher information through the admin interface
  - Name, position, and biography fields
  - Profile image upload
  - Custom sort order for display sequence

### Media Management
- **Gallery Images** - Upload and organize photos through the admin interface
  - Category assignment for filtering
  - Featured flag for homepage display
  - Image optimization and thumbnail generation

- **Site Images** - Manage website section images through the admin interface
  - Dedicated images for specific website sections
  - Recommended image sizes for each section
  - Image optimization and responsive versions

### Configuration
- Environment settings in `.env`
- App configuration in `config/` directory
- Database settings in `config/database.php`
- Languages configuration in `lang/` directory

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

### Backend
- **Framework**: Laravel 12.0 (PHP 8.2+)
- **Authentication**: Laravel Breeze with customized admin access control
- **File Storage**: Laravel Filesystem with public disk configuration
- **Caching**: Laravel built-in cache system
- **Queues**: Laravel job queue system for background processing

### Frontend
- **Templates**: Blade templating engine with components and layouts
- **CSS Framework**: Tailwind CSS 4.0 with custom configuration
- **JavaScript**: Axios for API requests, Alpine.js for interactive UI components
- **Build Tool**: Vite for fast builds and hot module replacement
- **Responsive Design**: Mobile-first approach with Tailwind breakpoints

### Database
- **RDBMS**: MySQL/PostgreSQL/SQLite support
- **ORM**: Laravel Eloquent with model relationships
- **Migrations**: Version-controlled database schema
- **Seeders**: Sample data generation for development

### Multilingual
- **Localization**: Laravel's built-in localization system
- **Languages**: English, Thai, and Korean translations
- **Middleware**: Custom locale middleware for language switching

### Testing & Quality
- **Unit Testing**: PHPUnit for backend testing
- **Code Formatting**: Laravel Pint (PHP CS Fixer)
- **Static Analysis**: Code quality tools

### Development Tools
- **Package Manager**: Composer for PHP dependencies
- **Frontend Dependencies**: NPM for JavaScript packages
- **Version Control**: Git with conventional commit messages
- **Environment**: Laravel Sail (Docker) for containerized development, Concurrently

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For Laravel framework documentation and support:
- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [Laracasts](https://laracasts.com)
