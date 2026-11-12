package es.decroly.videoteca.dto;

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@Schema(description = "Datos para crear o modificar una película")
public class PeliculaPeticionDto {
    @Schema(description = "Título obligatorio", example = "Interstellar")
    private String titulo;
    @Schema(description = "Director obligatorio", example = "Christopher Nolan")
    private String director;
    @Schema(description = "Año de estreno", example = "2014")
    private Integer anio;
    @Schema(description = "Número total de copias, como mínimo 1", example = "5")
    private int copias;
    @Schema(description = "ID de una categoría existente", example = "3")
    private Long categoriaId;
}
