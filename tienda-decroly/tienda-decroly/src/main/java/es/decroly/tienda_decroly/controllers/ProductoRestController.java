package es.decroly.tienda_decroly.controllers;

import es.decroly.tienda_decroly.domain.Producto;
import es.decroly.tienda_decroly.exceptions.BadRequestException;
import es.decroly.tienda_decroly.exceptions.NotFoundException;
import es.decroly.tienda_decroly.services.ProductoService;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.net.URI;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.atomic.AtomicLong;

@RestController
@RequestMapping("/api/productos")
public class ProductoRestController {

    private final ProductoService productoService;

    public ProductoRestController(/*@Qualifier("productoServiceMemoria") Con Qualifier definimos la implementacion del servicio a utilizar
     */ ProductoService productoService) {
        this.productoService = productoService;
    }

    @PostMapping()
    public Producto crear(@RequestBody Producto producto) {
        return productoService.crear(producto);
    }

    @GetMapping()
    public List<Producto> listar() {
        return productoService.listar();
    }

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