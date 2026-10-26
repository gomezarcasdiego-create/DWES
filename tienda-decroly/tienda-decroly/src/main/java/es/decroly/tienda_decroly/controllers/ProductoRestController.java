package es.decroly.tienda_decroly.controllers;

import es.decroly.tienda_decroly.domain.Producto;
import es.decroly.tienda_decroly.exceptions.BadRequestException;
import es.decroly.tienda_decroly.exceptions.NotFoundException;
import es.decroly.tienda_decroly.services.ProductoService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.media.Content;
import io.swagger.v3.oas.annotations.media.Schema;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.tags.Tag;
import lombok.RequiredArgsConstructor;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.context.properties.ConfigurationPropertiesScan;
import org.springframework.http.HttpStatus;
import org.springframework.http.ProblemDetail;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.net.URI;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.atomic.AtomicLong;

@Tag(name = "Productos", description = "Catalogo de productos")
@RequiredArgsConstructor
@RestController
@RequestMapping("/api/productos")
public class ProductoRestController {

    private final ProductoService productoService;

    @PostMapping()
    public Producto crear(@RequestBody Producto producto) {
        return productoService.crear(producto);
    }

    @GetMapping()
    public List<Producto> listar() {
        return productoService.listar();
    }

    @Operation(summary = "Consultar un producto por su id")
    @ApiResponse(responseCode = "200", description = "producto encontrado")
    @ApiResponse(responseCode = "400", description = "no existe el producto",
        content = @Content(
                schema = @Schema(implementation = ProblemDetail.class)))

    @GetMapping("/{id}")
    public Producto buscarPorId(@PathVariable Long id) {
       return productoService.buscarPorId(id);
    }


    @PutMapping("/{id}")
    public Producto modificar(@PathVariable Long id,
                                              @RequestBody Producto datos) {
        return productoService.modificar(id, datos);
    }

    @DeleteMapping("/{id}")
    public void borrar(@PathVariable Long id) {
        productoService.borrar(id);
    }


}