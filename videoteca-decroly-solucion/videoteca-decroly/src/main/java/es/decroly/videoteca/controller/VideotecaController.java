package es.decroly.videoteca.controller;

import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.tags.Tag;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.Map;

@RestController
@RequestMapping("/api/videoteca")
@Tag(name = "Videoteca", description = "Información general de la videoteca")
public class VideotecaController {
    @Value("${videoteca.nombre}")
    private String nombre;
    @Value("${videoteca.max-prestamos}")
    private int maxPrestamos;
    @Value("${videoteca.dias-prestamo}")
    private int diasPrestamo;

    @Operation(summary = "Consultar información de la videoteca")
    @ApiResponse(responseCode = "200", description = "Información devuelta")
    @GetMapping("/info")
    public ResponseEntity<Map<String, Object>> info() {
        Map<String, Object> datos = Map.of("nombre", nombre, "maxPrestamos", maxPrestamos, "diasPrestamo", diasPrestamo);
        return ResponseEntity.ok(datos);
    }
}
