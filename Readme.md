bin/console doctrine:database:create
bin/console doctrine:schema:create

curl --location --request POST '127.0.0.1:8888/api/getNewBaseByNumberCar' --header 'Content-Type: text/plain' --data-raw '{"number_car":"Т934ВН50"}'

curl --location --request POST '127.0.0.1:8888/api/getNewBaseByNumberCar' --header 'Content-Type: text/plain' --data-raw '{"number_car":"Т934ВН50"}' -u "admin:admin"  