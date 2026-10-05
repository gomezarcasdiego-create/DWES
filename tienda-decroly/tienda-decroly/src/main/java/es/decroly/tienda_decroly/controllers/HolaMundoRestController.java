package es.decroly.tienda_decroly.controllers;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HolaMundoRestController {

    @GetMapping("/saludo")
    public String saludo(){
        return "Hola Mundo desde la Tienda Decroly";
    }
    // Variable de ruta: http://localhost:8080/hola/Ana

    @GetMapping("/saludo/{nombre}")
    public String saludoPersonalizado(@PathVariable String nombre) {
        return "hola" + nombre + ", Bienvenido/a la Tienda Decroly";
    }


    @GetMapping("/buscar")
    public String buscar (@RequestParam(defaultValue = "todo") String texto) {
        return "Buscando producto que contengan: " + texto;
    }


}
