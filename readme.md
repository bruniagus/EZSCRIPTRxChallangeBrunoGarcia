Proyecto credo con Docker , Php 8.2 Y Laravel 10 
Para iniciar se debe inicializar con 
```
docker-compose up
```
Instalamos composer en el proyecto

```
docker-compose exec app composer install
```

Se tiene que correr las migraciones y los seeders , como lo tengo inicializado en l maqiona de ubuntu yo pongo el siguiente comando para que docker sepa que estoy en ese imagen

```
docker-compose exec app php artisan migrate
```
```
docker-compose exec app php artisan  db:seed
```

inicializamos el server con el siguietne comando


```
docker-compose exec app php artisan serve --host 0.0.0.0 --port 8000
```
