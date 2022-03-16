# proyecto challenge
* contiene dos carpetas, backend y frontend, cada una con sus imagenes docker si requieren implementarlo en el contenedor.

* descargar/clonar proyectos de git

## backend
* [laravel]: Version 8.83.4
* [php]: Version 7.4.7
* [mysql]: Version 10.4.13

### instalacion
* crear la base de datos challenge_db

* instalar dependencias del proyecto
  - composer install

* crear archivo .env

* generar key
  - php artisan key:generate

* ejecutar migraciones (se crearán las tablas usuario y blog)
  - php artisan migrate
  
* ejecutar seeders
  - php artisan db:seed

### prueba de endpoints api
* tabla usuario
  - /api/usuario
  - /api/usuario/{id}

* tabla blog
  - /api/blog
  - /api/blog/{id}

## frontend
* [vue]: Version 2.6.14
* [vite]: Version 2.8.0
* [vue-router]: Version 3.5.3
* [vuex]: Version 3.6.2
* [BootstrapVue]: Version 2.21.2

### instalacion
* instalar dependencias
  - npm install
* levantar proyecto con vite
  - npm run dev