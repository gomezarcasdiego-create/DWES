package es.decroly.videoteca.service;

import es.decroly.videoteca.dto.PeliculaPeticionDto;
import es.decroly.videoteca.model.Pelicula;
import java.util.List;

public interface PeliculaService {
    List<Pelicula> listar(String director);
    List<Pelicula> listarDisponibles();
    Pelicula buscarPorId(Long id);
    Pelicula crear(PeliculaPeticionDto dto);
    Pelicula modificar(Long id, PeliculaPeticionDto dto);
    void eliminar(Long id);
}
