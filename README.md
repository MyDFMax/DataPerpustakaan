# Data Perpustakaan

## Install

```bash
git clone https://github.com/MyDFMax/DataPerpustakaan.git
```
```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan db:seed
```

## Cara login

> email : admin@gmail.com\
> password : admin1234

## Baca Dokumentasi
Dokumentasi ini berasal dari third party laravel yang di gunakan.

[spatie/laravel-permission](https://spatie.be/docs/laravel-permission/)\
[laravel/jetstream](https://jetstream.laravel.com/introduction.html)


## Struktur folder
>Pelajari file file yang terbuka dibawah

```tree
.
│   ...
│   .env
│   .env.exampl
│   ...
├───...     
├───app
│   ├───...
│   │           
│   ├───Http
│   │   ├───Controllers
│   │   │   │   ...
│   │   │   │   
│   │   │   └───Book
│   │   │           BookController.php
│   │   │           BorrowController.php
│   │   │           PublishedController.php
│   │   │           
│   │   └───Requests
│   │           StoreBookRequest.php
│   │           StoreBorrowRequest.php
│   │           StorePublishedRequest.php
│   │           UpdateBookRequest.php
│   │           UpdateBorrowRequest.php
│   │           UpdatePublishedRequest.php
│   │           
│   ├───Models
│   │       Book.php
│   │       Borrow.php
│   │       Permission.php
│   │       Published.php
│   │       ReturnedBook.php
│   │       Role.php
│   │       User.php
│   │       
│   ├───Policies
│   │       BookPolicy.php
│   │       
│   ├───Providers
│   │       AppServiceProvider.php
│   │       FortifyServiceProvider.php
│   │       JetstreamServiceProvider.php
│   │       
│   └───View
│       └───Components
│               AppLayout.php
│               GuestLayout.php
│               
├───bootstrap
│   │   ...
│   ├───...
│   └───...
│           
├───config
│       app.php
│       auth.php
│       cache.php
│       database.php
│       filesystems.php
│       fortify.php
│       jetstream.php
│       logging.php
│       mail.php
│       permission.php
│       queue.php
│       sanctum.php
│       services.php
│       session.php
│       
├───database
│   │   
│   ├───factories
│   │   ...
│   │       
│   ├───migrations
│   │       0001_01_01_000000_create_users_table.php
│   │       0001_01_01_000001_create_cache_table.php
│   │       0001_01_01_000002_create_jobs_table.php
│   │       2024_07_17_023410_add_two_factor_columns_to_users_table.php
│   │       2024_07_17_023442_create_personal_access_tokens_table.php
│   │       2024_07_26_134937_create_permission_tables.php
│   │       2024_07_26_145424_create_books_table.php
│   │       2024_07_26_172603_create_borrows_table.php
│   │       2024_07_26_172604_create_returned_books_table.php
│   │       2024_07_26_172635_create_publisheds_table.php
│   │       
│   └───seeders
│           DatabaseSeeder.php
│           RolePermissionSeeder.php
│           UserSeeder.php
│           
├───node_modules
│                   
├───public
│   │   ...
│   │       
│   ├───...
│   │       
│   └───...
│   
├───resources
│   ├───css
│   │       ...
│   │       
│   ├───js
│   │       ...
│   │       
│   ├───markdown
│   │       ...
│   │       
│   └───views
│       │   dashboard.blade.php
│       │   navigation-menu.blade.php
│       │   policy.blade.php
│       │   terms.blade.php
│       │   welcome.blade.php
│       │   
│       ├───api
│       │       ...
│       │       
│       ├───auth
│       │       confirm-password.blade.php
│       │       forgot-password.blade.php
│       │       login.blade.php
│       │       register.blade.php
│       │       reset-password.blade.php
│       │       two-factor-challenge.blade.php
│       │       verify-email.blade.php
│       │       
│       ├───components
│       │       ...
│       │       
│       ├───emails
│       │       team-invitation.blade.php
│       │       
│       ├───layouts
│       │       app.blade.php
│       │       error.blade.php
│       │       guest.blade.php
│       │       
│       ├───pages
│       │   ├───book
│       │   │       create.blade.php
│       │   │       edit.blade.php
│       │   │       index.blade.php
│       │   │       show.blade.php
│       │   │       
│       │   └───perpustakaan
│       │           create.blade.php
│       │           edit.blade.php
│       │           index.blade.php
│       │           show.blade.php
│       │           
│       └───profile
│               delete-user-form.blade.php
│               logout-other-browser-sessions-form.blade.php
│               show.blade.php
│               two-factor-authentication-form.blade.php
│               update-password-form.blade.php
│               update-profile-information-form.blade.php
│               
├───routes
│       api.php
│       console.php
│       web.php
│        
├───storage
│           
├───tests
│   │   ...
│   │       
│   ├───...
│   │       
│   └───...
│           
└───vendor
│   ...
│       
├───...
│       
└───...```