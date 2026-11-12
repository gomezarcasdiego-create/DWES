package es.decroly.videoteca.controller;

import es.decroly.videoteca.model.Categoria;
import es.decroly.videoteca.service.CategoriaService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.responses.ApiResponses;
import io.swagger.v3.oas.annotations.tags.Tag;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import java.util.List;

@RestController
@RequestMapping("/api/categorias")
@Tag(name = "Categorías", description = "Gestión de las categorías de películas")
public class CategoriaController {
    private final CategoriaService categoriaService;

    public CategoriaController(CategoriaService categoriaService) { this.categoriaService = categoriaService; }

    @Operation(summary = "Listar categorías")
    @ApiResponse(responseCode = "200", description = "Lista devuelta")
    @GetMapping
    public ResponseEntity<List<Categoria>> listar() { return ResponseEntity.ok(categoriaService.listar()); }

    @Operation(summary = "Buscar categoría por ID")
    @ApiResponses({@ApiResponse(responseCode = "200", description = "Categoría encontrada"), @ApiResponse(responseCode = "404", description = "No encontrada")})
    @GetMapping("/{id}")
    public ResponseEntity<Categoria> buscar(@PathVariable Long id) { return ResponseEntity.ok(categoriaService.buscarPorId(id)); }

    @Operation(summary = "Crear categoría")
    @ApiResponses({@ApiResponse(responseCode = "201", description = "Creada"), @ApiResponse(responseCode = "400", description = "Datos no válidos"), @ApiResponse(responseCode = "409", description = "Nombre duplicado")})
    @PostMapping
    public ResponseEntity<Categoria> crear(@RequestBody Categoria categoria) { return ResponseEntity.status(HttpStatus.CREATED).body(categoriaService.crear(categoria)); }

    @Operation(summary = "Modificar categoría")
    @ApiResponses({@ApiResponse(responseCode = "200", description = "Modificada"), @ApiResponse(responseCode = "400", description = "Datos no válidos"), @ApiResponse(responseCode = "404", description = "No encontrada"), @ApiResponse(responseCode = "409", description = "Nombre duplicado")})
    @PutMapping("/{id}")
    public ResponseEntity<Categoria> modificar(@PathVariable Long id, @RequestBody Categoria categoria) { return ResponseEntity.ok(categoriaService.modificar(id, categoria)); }

    @Operation(summary = "Eliminar categoría")
    @ApiResponses({@ApiResponse(responseCode = "204", description = "Eliminada"), @ApiResponse(responseCode = "404", description = "No encontrada")})
    @DeleteMapping("/{id}")
    public ResponseEntity<Void> eliminar(@PathVariable Long id) { categoriaService.eliminar(id); return ResponseEntity.noContent().build(); }
}
