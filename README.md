# Laravel Livewire test

Demo site: https://ryan-laravel-livewire-test-540b2dab7fd6.herokuapp.com/

Basic authentication: 

```
User: user
Pasword: password
```

API token
```
#Put it on header
Key: apitoken
Value: nus2024

```


It is used for the purpose of demo site for Laravel and livewire

# Precondition
- Composer v2
- PHP 8.2 or higher

# Starting project

Create a `.env` file from `.env.example`

```bash
cp .env.example .env
```

Run composer to download package
```
composer install
```

Start project with Sail
```
./vendor/bin/sail up
```

Install application key
```
./vendor/bin/sail artisan key:generate

```

Create SQLite database
```
touch database/database.sqlite
```

Run migration
```
./vendor/bin/sail artisan migrate
```


Run npm to download js package
```
./vendor/bin/sail npm install
```

Buid project asset
```
./vendor/bin/sail npm run build
```


# Testing
Go to http://localhost to see the result


Run the following command to trigger test
```
./vendor/bin/sail artisan test
```

Test the API via endpoint http://localhost/api/kanye/get_list

# Configuration
```
API_KEY= #change it to secure API endpoint, need put API key to apitoken header to bypass authentication
QUOTE_LIMIT=5 #change amount of quote retrived
BASIC_USER=user 
BASIC_PASSWORD=password
QUOTE_INTERVAL=60000 #change internal time quote is fetched (as milisecond unit)
```


