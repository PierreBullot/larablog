pull

composer install

touch database/database.sqlite

create .env with:

APP_KEY=base64:WA3CGlKttlrTS9OnHzVnHKazMvLk2UaUPZfptrubaDg=

DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/larablog/database/database.sqlite


php artisan migrate:fresh --seed -v

php artisan serve

DBAdmin password for phpLiteadmin is admin
