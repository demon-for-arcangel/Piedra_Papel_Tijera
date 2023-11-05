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
  - Ejemplo de respuesta JSON.
  ```json
    [
        {
            "id": 1,
            "nombre": "Jugador1",
            "partidasJugadas": 10,
            "partidasGanadas": 5,
            "rol": "jugador"
        },
        {
            "id": 2,
            "nombre": "Jugador2",
            "partidasJugadas": 8,
            "partidasGanadas": 3,
            "rol": "jugador"
        }
    ]
  ```

- **Obtener Jugador por ID**
  - Método: GET
  - Ruta: `/api/jugadores/{id}`
  - Descripción: Obtiene información detallada de un jugador específico según su ID.
  - Ejemplo de respuesta JSON.
  ```json
    {
        "id": 1,
        "nombre": "Jugador1",
        "partidasJugadas": 10,
        "partidasGanadas": 5,
        "rol": "jugador"
    }
  ```

- **Registrar Nuevo Jugador**
  - Método: POST
  - Ruta: `/api/jugadores`
  - Descripción: Registra un nuevo jugador en la base de datos.
  - Ejemplo de respuesta JSON.
  ```json
    {
        "nombre": "NuevoJugador",
        "partidasJugadas": 0,
        "partidasGanadas": 0,
        "rol": "jugador"
    }
  ```

- **Eliminar Jugador**
  - Método: DELETE
  - Ruta: `/api/jugadores/{id}`
  - Descripción: Elimina un jugador según su ID.
  - No se requiere un cuerpo de solicitud JSON para esta acción.

## Juegos

- **Iniciar Juego**
  - Método: POST
  - Ruta: `/api/juegos`
  - Descripción: Inicia un nuevo juego.
  - Ejemplo de respuesta JSON.
  ```json
    {
        "id": 1,
        "jugador1_id": 1,
        "jugador2_id": 2,
        "ganador_id": null,
        "created_at": "2023-11-05T12:34:56.000000Z",
        "updated_at": "2023-11-05T12:34:56.000000Z"
    }
  ```

- **Hacer Movimiento**
  - Método: POST
  - Ruta: `/api/juegos/{id}/movimientos`
  - Descripción: Realiza un movimiento (piedra, papel o tijera) en un juego existente.
  - Ejemplo de cuerpo de la solicitud JSON.
  ```json
    {
        "jugador_id": 1,
        "movimiento": "papel"
    }
  ```
  - Ejemplo de respuesta JSON.
  ```json
    {
        "id": 1,
        "juego_id": 1,
        "jugador_id": 1,
        "movimiento": "papel",
        "created_at": "2023-11-05T13:45:12.000000Z",
        "updated_at": "2023-11-05T13:45:12.000000Z"
    }
  ```

- **Determinar Ganador**
  - Método: GET
  - Ruta: `/api/juegos/{id}/ganador`
  - Descripción: Determina el ganador de un juego específico según los movimientos realizados.
    - Ejemplo de respuesta JSON cuando el juego aun no tiene ganador.
  ```json
    {
        "mensaje": "El juego aún no tiene un ganador"
    }
  ```
  - Ejemplo de respuesta JSON cuando hay un ganador.
  ```json
    {
        "ganador_id": 1,
        "mensaje": "El Jugador 1 ha ganado el juego"
    }
  ```

## Movimientos

- **Listar Movimientos**
  - Método: GET
  - Ruta: `/api/movimientos`
  - Descripción: Obtiene una lista de todos los movimientos disponibles (piedra, papel o tijera).
  - Ejemplo de respuesta JSON.
  ```json
    [
        {
            "id": 1,
            "nombre": "piedra"
        },
        {
            "id": 2,
            "nombre": "papel"
        },
        {
            "id": 3,
            "nombre": "tijera"
        }
    ]
```