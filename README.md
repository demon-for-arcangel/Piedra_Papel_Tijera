# Proyecto de Piedra, Papel o Tijera con Laravel

## Introducción

Este proyecto consiste en una API desarrollada en PHP utilizando el framework Laravel para el juego de Piedra, Papel o Tijera. La API proporciona endpoints para realizar diversas acciones, como registrar jugadores, iniciar juegos, realizar movimientos y determinar ganadores.

## Tecnologías Utilizadas

- PHP 7.4
- Laravel 8
- Composer (para la gestión de dependencias)

## Estructura de la Base de Datos

El proyecto utiliza una base de datos MySQL con las siguientes tablas:

- `jugadores`: Almacena la información de los jugadores, incluyendo su nombre, puntuación y otros detalles.
- `juegos`: Registra la información de cada juego, incluyendo los jugadores involucrados y el resultado.
- `movimientos`: Contiene los tipos de movimientos posibles en el juego (piedra, papel o tijera).

## Funcionalidades Implementadas

El proyecto incluye las siguientes características:

- Inicio de Juegos
- Realización de Movimientos
- Determinación de Ganadores
- Listado de Jugadores
- Listado de Movimientos
- Eliminación de Jugadores

## Cómo Ejecutar el Proyecto

1. Clona el repositorio: `git clone https://github.com/demon-for-arcangel/Piedra_papel_tijera.git`
2. Instala las dependencias: `composer install`
3. Actualizar el proyecto para tener todos los archivos necesarios: `composer update`
4. Copia el archivo de configuración de entorno: `cp .env.example .env`
5. Configura tu base de datos en el archivo `.env`
6. Ejecuta las migraciones: `php artisan migrate`
7. Inicia el servidor: `php artisan serve`

# Uso de la API

## Jugadores

- **Listar Jugadores**
  - Método: GET
  - Ruta: `/api/jugadores`
  - Descripción: Obtiene una lista de todos los jugadores registrados.

- **Obtener Jugador por ID**
  - Método: GET
  - Ruta: `/api/jugadores/{id}`
  - Descripción: Obtiene información detallada de un jugador específico según su ID.

- **Registrar Nuevo Jugador**
  - Método: POST
  - Ruta: `/api/jugadores`
  - Descripción: Registra un nuevo jugador en la base de datos.

- **Eliminar Jugador**
  - Método: DELETE
  - Ruta: `/api/jugadores/{id}`
  - Descripción: Elimina un jugador según su ID.

## Juegos

- **Iniciar Juego**
  - Método: POST
  - Ruta: `/api/juegos`
  - Descripción: Inicia un nuevo juego.

- **Hacer Movimiento**
  - Método: POST
  - Ruta: `/api/juegos/{id}/movimientos`
  - Descripción: Realiza un movimiento (piedra, papel o tijera) en un juego existente.

- **Determinar Ganador**
  - Método: GET
  - Ruta: `/api/juegos/{id}/ganador`
  - Descripción: Determina el ganador de un juego específico según los movimientos realizados.

## Movimientos

- **Listar Movimientos**
  - Método: GET
  - Ruta: `/api/movimientos`
  - Descripción: Obtiene una lista de todos los movimientos disponibles (piedra, papel o tijera).

### Contribuciones

Si encuentras algún problema o quieres contribuir, siéntete libre de abrir un issue o enviar un pull request.

### Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.
