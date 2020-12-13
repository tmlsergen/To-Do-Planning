## Todo-Planning Project

## Installation

1. Clone repository `git clone https://github.com/tmlsergen/To-Do-Planning.git`
2. Run `composer install`
3. Make a Database `todo_planning`
4. `cp .env.example .env`
5. Run `php artisan migrate --seed`
6. Run `php artisan todos:get` to fetch and store "todos".


Run `php artisan serve`

You can see "todos" at [http://127.0.0.1:8000](http://127.0.0.1:8000)

