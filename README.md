## step for run:

composer install

./vendor/bin/sail up

alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=News
./vendor/bin/sail artisan db:seed --class=Feedback
./vendor/bin/sail artisan db:seed --class=UserSeeder

for test user: admin@gmail.com/123
