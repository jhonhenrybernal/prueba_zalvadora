# 🚀 Prueba Zalvadora – API SaaS (Laravel + DDD)

API RESTful para gestión SaaS, desarrollada con **Laravel 12**, arquitectura **DDD**, autenticación **Sanctum** y documentación **Swagger**.

---

## Tabla de Contenido

- [Características](#características)
- [Instalación](#instalación)
- [Uso de la API](#uso-de-la-api)
- [Autenticación y Seguridad](#autenticación-y-seguridad)
- [Testing](#testing)
- [Documentación Swagger](#documentación-swagger)
- [Arquitectura y Buenas Prácticas](#arquitectura-y-buenas-prácticas)
- [Notas](#notas)

---

## Características

- Arquitectura limpia **DDD** (Domain Driven Design)
- CRUD Companies, Plans, Subscriptions, Users
- **Sanctum** para autenticación por token
- **FormRequests** para validaciones robustas
- **Policies** para autorización de recursos
- **API Resources** para respuestas limpias
- **Tests** automatizados (PHPUnit)
- **Swagger/OpenAPI** para documentación interactiva
- Preparado para Docker y despliegue sencillo

---

## Instalación

1. **Clona el repositorio**
    ```bash
    git clone https://github.com/tuusuario/prueba-zalvadora.git
    cd prueba-zalvadora
    ```

2. **Instala dependencias**
    ```bash
    composer install
    ```

3. **Configura tu entorno**
    ```bash
    cp .env.example .env
    php artisan key:generate
    # Configura tu DB en .env
    ```

4. **Migraciones y seeders**
    ```bash
    php artisan migrate --seed
    ```

5. **(Opcional) Docker**
    ```bash
    docker compose up -d
    ```

---

## Uso de la API

### Autenticación (Sanctum)

- **Registrar usuario**
    ```
    POST /api/register
    {
        "name": "Jane Doe",
        "email": "jane@example.com",
        "password": "secret",
        "company_id": 1
    }
    ```

- **Login**
    ```
    POST /api/login
    {
        "email": "jane@example.com",
        "password": "secret"
    }
    ```
    Respuesta: `{ "token": "..." }`  
    Usa ese token como **Bearer Token** en el header `Authorization` para las siguientes rutas.

### Endpoints principales (CRUD)

| Método | Ruta                    | Descripción                    |
|--------|-------------------------|--------------------------------|
| GET    | /api/companies          | Listar empresas                |
| POST   | /api/companies          | Crear empresa                  |
| GET    | /api/plans              | Listar planes                  |
| POST   | /api/plans              | Crear plan                     |
| GET    | /api/subscriptions      | Listar suscripciones           |
| POST   | /api/subscriptions      | Crear suscripción              |
| GET    | /api/users              | Listar usuarios                |
| POST   | /api/users              | Crear usuario                  |

> **Nota:** Todos los endpoints requieren token excepto `/api/register` y `/api/login`.

---

## Testing

Lanza todos los tests automatizados:
```bash
php artisan test
