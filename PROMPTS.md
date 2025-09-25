## Generar datos de ejemplo para un seeder
Crea un seeder con 30 datos de ejemplo, basándote en este modelo:
{
"id": 1,
"name": "Pikachu",
"type": "Electric",
"hp": 35,
"status": "captured"
}

Ten en cuenta lo siguiente:

* id es auto-incremental.
* hp debe ser un valor entre 1 y 100.
* status puede ser wild o captured.

## Generar clase PHP Pokemon
Crea la clase PHP Pokemon con los campos privados: id (int/nullable), name (string), type (string), hp (int), status (string). Incluye un constructor y getters para cada campo
