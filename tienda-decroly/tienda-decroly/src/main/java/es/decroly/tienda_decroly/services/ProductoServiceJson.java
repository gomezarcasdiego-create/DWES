package es.decroly.tienda_decroly.services;

import es.decroly.tienda_decroly.domain.Producto;
import org.springframework.boot.autoconfigure.condition.ConditionalOnProperties;
import org.springframework.context.annotation.Conditional;
import org.springframework.core.io.ClassPathResource;
import org.springframework.stereotype.Service;
import tools.jackson.databind.ObjectMapper;

import java.io.IOException;
import java.io.InputStream;
import java.util.List;

@Service
@ConditionalOnProperties(name = "tienda.productos.origen",
    havingValue = "memoria", matchIfMissing = true)
public class ProductoServiceJson extends ProductoServiceBase {

    public ProductoServiceJson(ObjectMapper mapper) {
        super(cargar(mapper));


    }
    private static List<Producto> cargar(ObjectMapper mapper) {
        ClassPathResource fichero = new ClassPathResource("productos.json");
        try(InputStream entrada = fichero.getInputStream()){
            return List.of(mapper.readValue(entrada,Producto[].class));
        } catch (IOException e) {
            throw new RuntimeException(e);
        }
    }
}
