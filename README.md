## Solución taller SOLID

En primer lugar se implemento la seguridad para las diferentes API's, usando el modulo sanctum de Laravel y usando datos por defecto de la clase User y generando registros fake para dichat tabla.

Lo que me permitió entones crear un controlador LoginController con un método login, que me genera un token para autenticar mis apis.

```
{
    "user": [
        {
            "id": 2,
            "name": "Gwendolyn Wiegand Jr.",
            "email": "pansy07@example.net",
            "email_verified_at": "2023-06-04T08:05:41.000000Z",
            "created_at": "2023-06-04T08:05:41.000000Z",
            "updated_at": "2023-06-04T08:05:41.000000Z"
        }
    ],
    "token": "24|zVHTNCRhfbPl3aECPoWr4EJQKGfzrVvlnREnsZD6",
    "message": "Success"
}
```

Estructuré mi código en una carpeta Repository, donde cree una interface con los métodos del CRUD e implemente esta en una clase que me permitira extender el ORM de Laravel y efectuar allí las determinadas consultas del CRUD.

Este clase Repository\AppRepository usa a su vez un trait que permite estructurar las respuestas, dicho trait estan la carpeta Response.

De esta forma los modelos de mi App, tanto Models\Office y Models\Currency no dependeran del ORM por defecto de Laravel, si no que la clase Repository de la que extiendan determinará el ORM de acceso a datos.

En la carpeta Controllers tengo los dos controladores de OfficeController y CurrencyController, que mediante inyección de dependencias obtengo el modelo a usar y realizo el respectivo uso de las funciones que estan el la clase AppRepository.
