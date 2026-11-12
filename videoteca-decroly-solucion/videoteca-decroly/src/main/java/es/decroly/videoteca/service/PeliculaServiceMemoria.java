package es.decroly.videoteca.service;

import es.decroly.videoteca.dto.PeliculaPeticionDto;
import es.decroly.videoteca.exception.BadRequestException;
import es.decroly.videoteca.exception.NotFoundException;
import es.decroly.videoteca.model.Pelicula;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.atomic.AtomicLong;

@Service
public class PeliculaServiceMemoria implements PeliculaService {
    private final List<Pelicula> peliculas = new ArrayList<>();
    private final AtomicLong secuencia = new AtomicLong(3);
    private final CategoriaService categoriaService;

    public PeliculaServiceMemoria(CategoriaService categoriaService) {
        this.categoriaService = categoriaService;
        peliculas.add(new Pelicula(1L, "Avatar", "James Cameron", 2009, 5, 5, 3L));
        peliculas.add(new Pelicula(2L, "Gladiator", "Ridley Scott", 2000, 3, 3, 1L));
        peliculas.add(new Pelicula(3L, "Superbad", "Greg Mottola", 2007, 4, 4, 2L));
    }

    @Override
    public List<Pelicula> listar(String director) {
        if (director == null || director.isBlank()) return peliculas;
        return peliculas.stream()
                .filter(p -> p.getDirector().toLowerCase().contains(director.trim().toLowerCase()))
                .toList();
    }

    @Override
    public List<Pelicula> listarDisponibles() {
        return peliculas.stream().filter(p -> p.getDisponibles() > 0).toList();
    }

    @Override
    public Pelicula buscarPorId(Long id) {
        return peliculas.stream().filter(p -> p.getId().equals(id)).findFirst()
                .orElseThrow(() -> new NotFoundException("Película no encontrada: " + id));
    }

    @Override
    public Pelicula crear(PeliculaPeticionDto dto) {
        validar(dto, null);
        Pelicula nueva = new Pelicula(secuencia.incrementAndGet(), dto.getTitulo().trim(),
                dto.getDirector().trim(), dto.getAnio(), dto.getCopias(), dto.getCopias(), dto.getCategoriaId());
        peliculas.add(nueva);
        return nueva;
    }

    @Override
    public Pelicula modificar(Long id, PeliculaPeticionDto dto) {
        Pelicula actual = buscarPorId(id);
        validar(dto, id);
        actual.setTitulo(dto.getTitulo().trim());
        actual.setDirector(dto.getDirector().trim());
        actual.setAnio(dto.getAnio());
        actual.setCopias(dto.getCopias());
        actual.setDisponibles(dto.getCopias());
        actual.setCategoriaId(dto.getCategoriaId());
        return actual;
    }

    @Override
    public void eliminar(Long id) {
        Pelicula pelicula = buscarPorId(id);
        peliculas.remove(pelicula);
    }

    private void validar(PeliculaPeticionDto dto, Long idExcluido) {
        if (dto == null || dto.getTitulo() == null || dto.getTitulo().isBlank())
            throw new BadRequestException("El título es obligatorio");
        if (dto.getDirector() == null || dto.getDirector().isBlank())
            throw new BadRequestException("El director es obligatorio");
        if (dto.getCopias() < 1)
            throw new BadRequestException("Las copias deben ser como mínimo 1");
        if (dto.getCategoriaId() == null)
            throw new BadRequestException("La categoría es obligatoria");
        categoriaService.buscarPorId(dto.getCategoriaId());
    }
}
