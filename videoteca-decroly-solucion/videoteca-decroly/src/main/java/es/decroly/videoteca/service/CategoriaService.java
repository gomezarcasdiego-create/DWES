package es.decroly.videoteca.service;

import es.decroly.videoteca.model.Categoria;
import java.util.List;

public interface CategoriaService {
    List<Categoria> listar();
    Categoria buscarPorId(Long id);
    Categoria crear(Categoria categoria);
    Categoria modificar(Long id, Categoria categoria);
    void eliminar(Long id);
}
