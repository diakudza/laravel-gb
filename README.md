## step for run:

composer install

to start app
````
./vendor/bin/sail up 
````
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
````
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=News
./vendor/bin/sail artisan db:seed --class=Feedback
./vendor/bin/sail artisan db:seed --class=UserSeeder
````
for test user: admin@gmail.com/123


for inertia install
````
./vendor/bin/sail composer require laravel/ui
./vendor/bin/sail npm install && npm run dev
./vendor/bin/sail composer require inertiajs/inertia-laravel
./vendor/bin/sail npm install @inertiajs/inertia @inertiajs/inertia-vue
./vendor/bin/sail npm run watch 
````
