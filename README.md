# Blog System for YHA Student

### Getting Started

## YHA Computer Training Center

### Getting Started

1. Clone the repository
```shell
git clone https://github.com/YHA-Center/blog-system.git
```

2. Redirect to your clone repo and type the follow command
```shell
cd blog-system
code .
```

3. Create new database on MySQL workbench
```shell
create database DB_NAME;
```

4. Copy the .env from .env.example
```shell
cp .env.example .env
```

5. Setup .env for database connection
```env
DB_DATABASE=DB_NAME
```

6. Install dependencies
```shell
composer install
```

7. Migrate the database tables
```shell
php artisan migrate:fresh --seed
```

9.  Serve the project on local server
```shell
php artisan serve
```

## **Enjoy Your Learning 🐼🐼🐼**