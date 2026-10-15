package es.decroly.tienda_decroly.config;


import io.swagger.v3.oas.annotations.OpenAPIDefinition;
import io.swagger.v3.oas.annotations.info.Info;
import org.springframework.context.annotation.Configuration;

@Configuration
@OpenAPIDefinition(info = @Info(
        title = "API de la tienda decroly",
        version = "1.0",
        description = "catalogos de productos y familias de la tienda"))

public class OpenApiConfig {
}
