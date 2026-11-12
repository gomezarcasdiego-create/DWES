# Videoteca Decroly

API REST desarrollada con Spring Boot para gestionar categorías y películas. Los datos se guardan en memoria, por lo que se reinician al apagar la aplicación.

## Requisitos
- Java 21 o superior.
- Maven.

## Arrancar
Desde la carpeta del proyecto:

```bash
mvn spring-boot:run
```

Swagger UI: `http://localhost:8080/swagger-ui/index.html`

Documentación OpenAPI JSON: `http://localhost:8080/v3/api-docs`

Para guardar el JSON en `docs/openapi.json`, abre `/v3/api-docs` en el navegador y guarda la respuesta en ese archivo.

## Endpoints

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/categorias` | Listar categorías |
| GET | `/api/categorias/{id}` | Buscar categoría |
| POST | `/api/categorias` | Crear categoría |
| PUT | `/api/categorias/{id}` | Modificar categoría |
| DELETE | `/api/categorias/{id}` | Eliminar categoría |
| GET | `/api/peliculas` | Listar películas; admite `?director=` |
| GET | `/api/peliculas/disponibles` | Películas con copias disponibles |
| GET | `/api/peliculas/{id}` | Buscar película |
| POST | `/api/peliculas` | Crear película |
| PUT | `/api/peliculas/{id}` | Modificar película |
| DELETE | `/api/peliculas/{id}` | Eliminar película |
| GET | `/api/videoteca/info` | Información configurada de la videoteca |

## Ejemplo de JSON para crear una película

```json
{
  "titulo": "Interstellar",
  "director": "Christopher Nolan",
  "anio": 2014,
  "copias": 5,
  "categoriaId": 3
}
```

Los errores de negocio se devuelven como `ProblemDetail` con códigos 400, 404 o 409.
