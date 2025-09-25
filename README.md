# API Pokedex
API Pokedex es una API REST desarrollada con Laravel y organizada siguiendo los principios de Clean Architecture y SOLID. Permite gestionar una Pokédex digital, con funcionalidades para listar, crear y obtener detalles de Pokémon, asegurando un código mantenible y escalable.

## 📋 Características

- Lista todos los Pokémon registrados
- Obtiene detalles de un Pokémon específico
- Crea nuevos Pokémon
- Validación de datos
- Pruebas unitarias y de integración

## 🛠 Requisitos

- PHP 8.1 o superior
- Composer
- SQLite

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/yoshua9/pokedex.git
   cd pokedex
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

5. **Ejecutar seeders**
   ```bash
   php artisan db:seed
   ```

6. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

## Ejecutar pruebas

```bash
php artisan test
```

##  Estructura del Proyecto

```
app/
├── Application/              # Casos de uso
│   ├── UseCases/
│   │   ├── Pokemon/          # Casos de uso específicos de Pokémon
│   │   │   ├── DTOs/         # Data Transfer Objects
│   │   │   ├── Services/     # Servicios de aplicación (casos de uso)
│   │   │   └── Mappers/      # Mapeadores entre DTOs y entidades de dominio
├── Domain/                   # Entidades y interfaces de dominio
│   ├── Pokemon/              # Dominio específico de Pokémon
│   │   └── Entities/         # Entidades de dominio
│   │   └── Repositories/     # Interfaces (puertos) para persistencia
├── Infrastructure/           # Controlleradores y request
│   ├── Http/
│   │   ├── Controllers/      # Controladores HTTP
│   │   └── Requests/         # Validaciones de request
│   ├── Persistence/
│   │   ├── Eloquent/
│   │   │   ├── Models/       # Modelos Eloquent
│   │   │   └── Repositories/ # Implementaciones de repositorios (adaptadores)
├── Providers/                # Proveedores de servicios
└── Http/
    └── Routes/
        └── API/              # Rutas API
            └── V1/           # Version 1 de la API
database/
├── migrations/                # Migraciones de base de datos
├── seeders/                   # Seeders para datos de ejemplo
└── factories/                 # Fábricas para generación de datos

routes/
└── api.php                    # Rutas API (Laravel fallback)

tests/                        # Pruebas automatizadas
```

##  Postman

Puedes importar la colección de Postman desde el fichero `Pokedex.postman_collection.json` para probar los endpoints de la API.
