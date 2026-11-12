package org.example.tiendavideojuegos.model;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class Pelicula {
    private Long id;
    private String titulo;
    private String director;
    private int anio;
    private int copias;
    private int disponibles;
    private Long categoriaId;
}
