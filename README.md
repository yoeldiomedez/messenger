# Messenger
Chat en tiempo real con Laravel + Pusher + Vuex -> [Live Demo](https://platica.herokuapp.com)

## Requerimiento para Despliegue

- PHP 7
- MySQL

``` bash

# Instale las Depencencias via composer y npm 
  composer install & npm install
  
# Configure las siguientes Variables de Entorno del archivo .env
  DB_DATABASE=yourdatabasename
  DB_USERNAME=yourusername
  DB_PASSWORD=yoursecretpassword
  BROADCAST_DRIVER=pusher
  PUSHER_APP_ID=yourpusherappid
  PUSHER_APP_KEY=yourpusherappkey
  PUSHER_APP_SECRET=yourpusherappsecret
  PUSHER_APP_CLUSTER=yourpusherappcluster

# Migre la Base de Datos y realice el seed
  php artisan migrate --seed

# Levante el Servidor y Navegue en localhost:8000
  php artisan serve

```
