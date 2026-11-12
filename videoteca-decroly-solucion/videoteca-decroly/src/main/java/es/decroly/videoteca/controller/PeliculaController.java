package es.decroly.videoteca.controller;

import es.decroly.videoteca.dto.PeliculaPeticionDto;
import es.decroly.videoteca.model.Pelicula;
import es.decroly.videoteca.service.PeliculaService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.responses.ApiResponses;
import io.swagger.v3.oas.annotations.tags.Tag;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import java.util.List;

@RestController
@RequestMapping("/api/peliculas")
@Tag(name = "Películas", description = "Gestión de las películas de la videoteca")
public class PeliculaController {
    private final PeliculaService peliculaService;

    public PeliculaController(PeliculaService peliculaService) { this.peliculaService = peliculaService; }

    @Operation(summary = "Listar películas", description = "Se puede filtrar por director usando ?director=")
    @ApiResponse(responseCode = "200", description = "Lista devuelta")
    @GetMapping
    public ResponseEntity<List<Pelicula>> listar(@RequestParam(required = false) String director) { return ResponseEntity.ok(peliculaService.listar(director)); }

    @Operation(summary = "Listar películas disponibles")
    @ApiResponse(responseCode = "200", description = "Lista de películas con copias disponibles")
    @GetMapping("/disponibles")
    public ResponseEntity<List<Pelicula>> disponibles() { return ResponseEntity.ok(peliculaService.listarDisponibles()); }

    @Operation(summary = "Buscar película por ID")
    @ApiResponses({@ApiResponse(responseCode = "200", description = "Encontrada"), @ApiResponse(responseCode = "404", description = "No encontrada")})
    @GetMapping("/{id}")
    public ResponseEntity<Pelicula> buscar(@PathVariable Long id) { return ResponseEntity.ok(peliculaService.buscarPorId(id)); }

    @Operation(summary = "Crear película")
    @ApiResponses({@ApiResponse(responseCode = "201", description = "Creada"), @ApiResponse(responseCode = "400", description = "Datos no válidos"), @ApiResponse(responseCode = "409", description = "Título duplicado")})
    @PostMapping
    public ResponseEntity<Pelicula> crear(@RequestBody PeliculaPeticionDto dto) { return ResponseEntity.status(HttpStatus.CREATED).body(peliculaService.crear(dto)); }

    @Operation(summary = "Modificar película")
    @ApiResponses({@ApiResponse(responseCode = "200", description = "Modificada"), @ApiResponse(responseCode = "400", description = "Datos no válidos"), @ApiResponse(responseCode = "404", description = "No encontrada"), @ApiResponse(responseCode = "409", description = "Título duplicado")})
    @PutMapping("/{id}")
    public ResponseEntity<Pelicula> modificar(@PathVariable Long id, @RequestBody PeliculaPeticionDto dto) { return ResponseEntity.ok(peliculaService.modificar(id, dto)); }

    @Operation(summary = "Eliminar película")
    @ApiResponses({@ApiResponse(responseCode = "204", description = "Eliminada"), @ApiResponse(responseCode = "404", description = "No encontrada")})
    @DeleteMapping("/{id}")
    public ResponseEntity<Void> eliminar(@PathVariable Long id) { peliculaService.eliminar(id); return ResponseEntity.noContent().build(); }
}
