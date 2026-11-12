package es.decroly.videoteca.config;

import io.swagger.v3.oas.annotations.OpenAPIDefinition;
import io.swagger.v3.oas.annotations.info.Contact;
import io.swagger.v3.oas.annotations.info.Info;
import org.springframework.context.annotation.Configuration;

@Configuration
@OpenAPIDefinition(info = @Info(
        title = "API Videoteca Decroly",
        version = "1.0.0",
        description = "API REST para gestionar las categorías y películas de la Videoteca Decroly",
        contact = @Contact(name = "Proyecto Videoteca Decroly")
))
public class OpenApiConfig {
}
