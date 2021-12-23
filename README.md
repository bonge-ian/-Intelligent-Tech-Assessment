# Intelligent Technologies Assessment

## Steps to install

1. clone the repo
2. cd into the local repo
3. composer install
4. mv .env.example .env
5. set the database credentials
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed
9. php artisan serve.

### Notes
- api routes
    - {domain}/api/auth/login
    - {domain}/api/auth/register
    - {domain}/api/auth/logout
    - {domain}/api/profile

- admin routes
    - {domain}/login
    - {domain}/admin/
    - {domain}/admin/user/{user}
