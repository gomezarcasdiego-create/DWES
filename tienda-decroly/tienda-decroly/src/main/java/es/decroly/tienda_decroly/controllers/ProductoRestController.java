package es.decroly.tienda_decroly.controllers;

import es.decroly.tienda_decroly.domain.Producto;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.concurrent.atomic.AtomicLong;

@RestController
public class ProductoRestController {

    private final List<Producto> productos = new ArrayList<>();
    private final AtomicLong secuencia = new AtomicLong();

    public ProductoRestController() {
        anadir("teclado mécanico", 49.9, 15);
        anadir("raton inalambrico", 19.95, 40);
        anadir("Monitor 24 pulgadas", 139.0, 8);
    }

    private void anadir(String nombre, double precio, int stock){
        Long id= secuencia.incrementAndGet();
        productos.add(new Producto(id, nombre, precio, stock));
    }

    private Producto nuevo(Producto producto){
        Long id = secuencia.incrementAndGet();
        productos.add(new Producto(id, producto.getNombre(), producto.getPrecio(), producto.getStock()));

        return producto;
    }

    private Producto actualizar(Producto producto){producto.setNombre(producto.getNombre());
    }

    @GetMapping("/api/prodcutos")
    public List<Producto> listar(){
        return productos;
    }

    @GetMapping("api/productos/{id}")
    public Producto buscarPorId(@PathVariable Long id) {
        return productos.stream()
                .filter(p ->p.getId().equals(id))
                .findFirst()
                .orElse(null);
    }

    @PostMapping ("/api/productos")
    public Producto crear(@RequestBody Producto producto){
        return nuevo(producto);

    }

    @PutMapping("/{id}")
    public Producto updateProducto (@PathVariable Long id, @RequestBody Producto producto){
        for (Producto p: productos){
            if(p.getId().equals(id))
                return actualizar(producto);
        }
        return producto;
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<void> borrar(@PathVariable Long id) {
        Iterator<Producto> it = productos.iterator();

    }



}
