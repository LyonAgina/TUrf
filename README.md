# Setting Up a New Laravel Project for Team Distribution

## 1. Create a New Laravel Project

Each collaborator should set up a fresh Laravel project to show their individual contributions:

```bash
composer create-project laravel/laravel your-project-name
cd your-project-name
```

## 2. Initialize Git and Connect to New Repo

```bash
git init
git remote add origin https://github.com/yourusername/your-new-repo.git
git branch -M main
```

## 3. Install Node Dependencies

```bash
npm install && npm run build
```

## 4. Set Up Environment File

Copy the example environment file and update it:
```bash
cp .env.example .env
```
Edit `.env` and set your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

## 5. Create the Database

Create a new MySQL database matching your `.env` settings:
```sql
CREATE DATABASE your_db_name;
```

## 6. Generate Application Key

```bash
php artisan key:generate
```

## 7. Add Your Feature Files

Each collaborator should add only their assigned files (controllers, models, views, migrations, seeders, tests, etc.) to the new project, commit, and push. This will show individual contributions in the git history.

## 8. Run Migrations

```bash
php artisan migrate
```

## 9. (Optional) Seed the Database

If you have seeders, run:
```bash
php artisan db:seed
```

## 10. Start the Development Server

```bash
php artisan serve
```

## 11. Push Your Work

- Add, commit, and push only your assigned files.
- Use feature branches for each major part (e.g., `feature/auth-backend`, `feature/ui-frontend`, `feature/testing`).
- Open a pull request for review and merging.

---

**This process ensures each team member’s contribution is visible in the git commit history and meets the rubric requirements for distributed work.**
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.


# Turf Bila Worry – Team Setup & Work Distribution

## 1. Project Setup (All Collaborators)
- Clone the new repository.
- Copy all files from the current project into the new repo folder.
- Run:
	```bash
	composer install
	npm install && npm run build
	cp .env.example .env
	php artisan key:generate
	```
- Update `.env` with your local database credentials:
	```
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=your_db_name
	DB_USERNAME=your_db_user
	DB_PASSWORD=your_db_password
	```
- Create a local MySQL database with the name you set above.
- Run migrations:
	```bash
	php artisan migrate
	```
- (Optional) Seed the database:
	```bash
	php artisan db:seed
	```
- Start the server:
	```bash
	php artisan serve
	```

## 2. Work Distribution & File Responsibilities

### Mitchell & Yvonne – Backend Development
- **User Authentication:**  
	Files: `app/Http/Controllers/Auth/`, `resources/views/auth/`, `app/Models/User.php`, `database/migrations/*users*`
- **Booking Flow:**  
	Files: `app/Http/Controllers/BookingController.php`, `app/Models/Booking.php`, `database/migrations/*bookings*`, `resources/views/bookings.blade.php`
- **Payment Integration (Mobile Money):**  
	Files: `app/Http/Controllers/PaymentController.php`, `app/Models/Payment.php`, `database/migrations/*payments*`, `resources/views/payments.blade.php`
- **Push:** All backend logic, migrations, and related Blade views.

### Mahir & Kisiwani – Frontend Development
- **UI/UX for Web:**  
	Files: `resources/views/home.blade.php`, `resources/views/turfs.blade.php`, `resources/views/layouts/`, `public/css/app.css`, `resources/js/app.js`
- **Search / Listing / Availability Display:**  
	Files: `app/Http/Controllers/TurfController.php`, `app/Models/Turf.php`, `resources/views/turfs.blade.php`
- **Push:** All frontend Blade views, CSS, JS, and UI components.

### Lyon – Testing, Database, Deployment
- **Unit Testing & Usability Testing:**  
	Files: `tests/Unit/`, `tests/Feature/`, `phpunit.xml`
- **Database Integration:**  
	Files: `database/migrations/`, `database/seeders/`, `app/Models/`
- **Performance & Reliability:**  
	Files: `config/`, `app/Providers/`
- **Deployment & Maintenance Plan:**  
	Files: `README.md` (add deployment steps), `public/.htaccess`, `artisan`, `composer.json`, `package.json`
- **Push:** All test files, seeders, deployment scripts, and documentation.

## 3. Rubric Coverage Checklist

- **Laravel Setup:**  
	`.env.example`, `.env`, `composer.json`, `package.json`, `artisan`, `config/`
- **GitHub Collaboration:**  
	Commit regularly, use descriptive messages, create feature branches for each major part.
- **Database Design:**  
	All migration files, seeders, relationships in models.
- **CRUD Operations:**  
	Controllers and Blade views for create, read, update, delete.
- **Core Models & Logic:**  
	All model files in `app/Models/`, business logic in controllers.
- **UI/UX:**  
	All Blade views, CSS, JS.
- **Authentication & Authorization:**  
	Auth controllers, middleware, user roles in models and migrations.
- **Bonus Features:**  
	Any extra functionality (e.g., notifications, reviews, support tickets).

## 4. How to Push Your Work

- Only push the files you are responsible for (see above).
- Use feature branches named after your task (e.g., `feature/auth-backend`, `feature/ui-frontend`, `feature/testing`).
- Make regular, meaningful commits with clear messages.
- After finishing your part, open a pull request for review.

## 5. Presentation Prep

- Test your setup and database before demo.
- Make sure your branch is merged and up-to-date.
- Be ready to explain your files and contributions.

---

**Each team member should copy only their assigned files into the new repo, commit, and push. This ensures clear ownership and meets the rubric requirements.**

For help, open an issue or contact the repo owner.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
