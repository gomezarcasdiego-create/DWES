package es.decroly.tienda_decroly.controllers;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class tiendaRestController {

    @GetMapping("/info")
    public String info() {
        return "Bienvenido a la tienda pepito <br> estamos " +
                "en la ciudad de nuevo mexico <br> estamos abiertos de 9-17:30";
    }

    @GetMapping("/descuento/{numero}")
    public String numero(@PathVariable double precio, @RequestParam(defaultValue = "10") double descuento) {
        double precioFinal = precio - (precio * descuento / 100);
        return "Precio Original: " + precio + "<br>" + "El descuento es " + descuento + "<br>" + precioFinal + "€";
    }
}
