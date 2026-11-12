package es.decroly.videoteca.service;

import es.decroly.videoteca.exception.BadRequestException;
import es.decroly.videoteca.exception.ConflictException;
import es.decroly.videoteca.exception.NotFoundException;
import es.decroly.videoteca.model.Categoria;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import java.util.concurrent.atomic.AtomicLong;

@Service
public class CategoriaServiceMemoria implements CategoriaService {
    private final List<Categoria> categorias = new ArrayList<>();
    private final AtomicLong secuencia = new AtomicLong(3);

    public CategoriaServiceMemoria() {
        categorias.add(new Categoria(1L, "Acción", "Películas de acción"));
        categorias.add(new Categoria(2L, "Comedia", "Películas de comedia"));
        categorias.add(new Categoria(3L, "Ciencia ficción", "Películas de ciencia ficción"));
    }

    @Override
    public List<Categoria> listar() { return categorias; }

    @Override
    public Categoria buscarPorId(Long id) {
        return categorias.stream().filter(c -> c.getId().equals(id)).findFirst()
                .orElseThrow(() -> new NotFoundException("Categoría no encontrada: " + id));
    }

    @Override
    public Categoria crear(Categoria categoria) {
        validar(categoria, null);
        Categoria nueva = new Categoria(secuencia.incrementAndGet(), categoria.getNombre().trim(), categoria.getDescripcion());
        categorias.add(nueva);
        return nueva;
    }

    @Override
    public Categoria modificar(Long id, Categoria categoria) {
        Categoria actual = buscarPorId(id);
        validar(categoria, id);
        actual.setNombre(categoria.getNombre().trim());
        actual.setDescripcion(categoria.getDescripcion());
        return actual;
    }

    @Override
    public void eliminar(Long id) {
        Categoria categoria = buscarPorId(id);
        categorias.remove(categoria);
    }

    private void validar(Categoria categoria, Long idExcluido) {
        if (categoria == null || categoria.getNombre() == null || categoria.getNombre().isBlank()) {
            throw new BadRequestException("El nombre de la categoría es obligatorio");
        }
        String nombre = categoria.getNombre().trim();
        if (nombre.length() > 50) {
            throw new BadRequestException("El nombre no puede superar 50 caracteres");
        }
        boolean repetida = categorias.stream().anyMatch(c ->
                !Objects.equals(c.getId(), idExcluido) && c.getNombre().equalsIgnoreCase(nombre));
        if (repetida) throw new ConflictException("Ya existe una categoría con ese nombre");
    }
}
