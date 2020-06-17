# Online-Support-Platform


## Server Requirements

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
 
## Setup Instructions

1. Download or clone the repository
2. Rename .env.example as **.env**
3. Run `composer update`
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `npm install`
7. Run `npm run dev`
8. Run `php artisan serve`

## Usage

- Agent Register: `{domain}/register`
- Agent Login: `{domain}/login`

- Create a Ticket: `{domain}/ticket/create`
- Check Ticket Status: `{domain}/ticket/status`

