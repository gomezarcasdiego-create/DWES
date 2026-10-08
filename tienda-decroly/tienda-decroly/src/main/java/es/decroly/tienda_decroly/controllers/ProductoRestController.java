package es.decroly.tienda_decroly.controllers;

import es.decroly.tienda_decroly.domain.Producto;
import es.decroly.tienda_decroly.exceptions.BadRequestException;
import es.decroly.tienda_decroly.exceptions.NotFoundException;
import org.apache.coyote.Response;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.net.URI;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.Optional;
import java.util.concurrent.atomic.AtomicLong;

@RestController
@RequestMapping("/api/productos")
public class ProductoRestController {

    private final ArrayList<Producto> productos = new ArrayList<>();
    private final AtomicLong secuencia = new AtomicLong();

    public ProductoRestController() {
        anadir(5, 49.9, "teclado");
        anadir(5, 49.9, "raton");
        anadir(5, 49.9, "abuela");

    }


    @GetMapping()
    public List getProductos() {
        return productos.stream().toList();
    }

    @GetMapping("/{id}")
    public Producto busccarporId(@PathVariable Long id) {

// for( Producto p: productos){
// if(p.getId().equals(id)){
// return ResponseEntity.ok(p);
// }
// }
        return findById(id);

    }

    @GetMapping()
    public ResponseEntity

        ProductoRestController() {
        return ResponseEntity.ok(productos);
    }

// @GetMapping("/{id}")
// public Producto getProducto(@PathVariable Long id) {
// return productos.stream()
// .filter(p -> p.getId().equals(id))
// .findFirst()
// .get();
// }


    @PutMapping("/{id}")
    public Producto updateProducto(@PathVariable Long id, @RequestBody Producto producto) {

        for (Producto p : productos) {
            if (p.getId().equals(id)) {
                return actuazizar(producto);
            }
        }
        return producto;
    }

    @PutMapping("/actualizar/{id}")
    public ResponseEntity actualizarProducto(@PathVariable Long id, @RequestBody Producto producto) {

        for (Producto p : productos) {
            if (p.getId().equals(id)) {
                return ResponseEntity.ok(actuazizar(producto));
            }
        }
        return ResponseEntity.notFound().build();

    }

    @PutMapping("/actualizar/a/{id}")
    public ResponseEntity actualizarProductoA(@PathVariable Long id, @RequestBody Producto producto) {

        Producto p = findById(id);
        p.setNombre(producto.getNombre());
        p.setPrecio(producto.getPrecio());
        p.setStock(producto.getStock());
        return ResponseEntity.ok(p);

    }


    @PostMapping
    public Producto createProducto(@RequestBody Producto producto) {
        return nuevo(producto);
    }

    @PostMapping
    public ResponseEntity addProducto(@RequestBody Producto producto) {
        Long id = secuencia.incrementAndGet();
        Producto nuevo = new Producto(id, producto.getNombre(), producto.getPrecio(), producto.getStock());
        productos.add(nuevo);
        URI direccion = URI.create("/api/productos/" + id);
        return ResponseEntity.created(direccion).body(nuevo);
    }

    @PostMapping
    public ResponseEntity addnewP(@RequestBody Producto producto) {
        Producto nuevoProduct = validate(producto);
        Producto nuevop = actuazizar(nuevoProduct);
        return ResponseEntity.ok(nuevop);
    }

// @DeleteMapping("/{id}")
// public void deleteProducto(@PathVariable Long id) {
// Iterator iterator = productos.iterator();
//
// while (iterator.hasNext()) {
// Producto producto = iterator.next();
// if (producto.getId().equals(id)) {
// iterator.remove();
// break;
// }
// }
// }


    @DeleteMapping("/{id}")
    @ResponseStatus(HttpStatus.NO_CONTENT)
    public void RemoveProducto(@PathVariable Long id) {

        Producto p = findById(id);
        productos.remove(p);

    }

// @DeleteMapping("/{id}")
// public ResponseEntity RemoveProducto(@PathVariable Long id) {
//
// Iterator iterator = productos.iterator();
// while (iterator.hasNext()) {
// Producto producto = iterator.next();
// if (producto.getId().equals(id)) {
// iterator.remove();
// return ResponseEntity.noContent().build();
//
// }
// }
// return ResponseEntity.ok().build();
//
// }


    private Producto nuevo(Producto producto) {
        Long id = secuencia.incrementAndGet();
        productos.add(new Producto(id, producto.getNombre(), producto.getPrecio(), producto.getStock()));
        return producto;
    }

    private void anadir(int stock, double precio, String nombre) {
        Long id = secuencia.incrementAndGet();
        productos.add(new Producto(id, nombre, precio, stock));


    }

    private Producto actuazizar(Producto producto) {
        producto.getId();
        producto.setNombre(producto.getNombre());
        producto.setStock(producto.getStock());
        producto.setPrecio(producto.getPrecio());

        productos.add(producto);
        return producto;
    }

    private Producto findById(Long id) {
        for (Producto p : productos) {
            if (p.getId().equals(id)) {
                return p;
            }
        }
        throw new NotFoundException("no existe este usuario" + id);
    }

    private Producto validate(Producto p) {

        if (p.getNombre().length() < 3) {
            throw new BadRequestException("El nombre del producto");
        } else if (p.getStock() < 0) {
            throw new BadRequestException("El stock del producto");
        } else if (p.getPrecio() < 0) {
            throw new BadRequestException("El precio del producto");
        }

        return p;

    }
}