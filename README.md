
# Prueba Zalvadora – Backend SaaS (Laravel DDD)

## 🚀 Requisitos

- Docker y Docker Compose
- (Opcional) Node y npm si usas Frontend
- (Opcional) Make si usas Makefile

## ⚡ Levantar el proyecto

```bash
# 1. Clona el repositorio
git clone https://github.com/tu-usuario/prueba-zalvadora.git
cd prueba-zalvadora

# 2. Levanta el stack de Docker (app y base de datos)
docker compose up -d
```

## ⚙️ Instalación de dependencias

```bash
# 3. Entra al contenedor de Laravel
docker exec -it laravel_app bash

# 4. Instala dependencias PHP
composer install
```

## 🗄️ Migraciones y Seeders

```bash
php artisan migrate:fresh --seed
```

## 🔑 Generar clave de aplicación

```bash
php artisan key:generate
```

## 🧪 Ejecutar tests

```bash
php artisan test
```

## 📚 Documentación Swagger (OpenAPI)

1. Genera la documentación:
    ```bash
    php artisan l5-swagger:generate
    ```
2. Accede desde tu navegador:
    ```
    http://localhost:8000/api/documentation
    ```

## 🔐 Autenticación

- El proyecto usa **Laravel Sanctum** para autenticación por token.
- Regístrate en `/api/register` y haz login en `/api/login` para obtener un token.
- Usa el token en el header:  
  `Authorization: Bearer <token>`

## 🏛️ Arquitectura

- **DDD**: Dominios en `/app/Domains`
- **Request Validation**: FormRequest en `App/Http/Requests`
- **Policies**: Autorización en `App/Policies`
- **API Resource**: Respuestas limpias
- **Tests**: PHPUnit
- **Swagger**: Documentación interactiva

## 🎯 Buenas prácticas

- SRP, DRY, SOLID
- Versionado de API (`/api/v1/...`)
- Service Providers y Services para lógica de negocio
- Modularidad y extensibilidad

## 🗃️ Modelado de Base de Datos

- Usuarios vinculados a compañías
- Compañías con planes y suscripciones
- Validaciones robustas y políticas de acceso

## 🔒 Seguridad

- Validación de datos vía FormRequest
- Autorización por policies
- Tokens con Sanctum

## 🧰 Troubleshooting

- Si tienes errores en migraciones:
    ```bash
    php artisan migrate:fresh --seed
    ```
- Si no aparece la documentación Swagger:
    - Revisa las anotaciones y vuelve a generar

## 🤝 Contribuciones

Pull requests y sugerencias son bienvenidas.

---

## 📬 Colección de Postman

Puedes importar la colección de pruebas de la API en Postman para facilitar tus pruebas manuales.

- [Descargar colección Postman (postman.json)](./postman.json)

### Cómo usarlo

1. Descarga el archivo anterior o cópialo a tu proyecto.
2. Abre Postman.
3. Haz clic en “Import” > “Archivo” y selecciona `postman_collection.json`.
4. ¡Listo! Ahora puedes probar todos los endpoints de la API ya configurados.

> **Tip:** Si usas tokens o autenticación, revisa el apartado de login primero y copia tu token para usarlo en las siguientes peticiones.