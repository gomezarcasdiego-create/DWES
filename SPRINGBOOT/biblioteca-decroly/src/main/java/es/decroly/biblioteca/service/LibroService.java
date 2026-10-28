package es.decroly.biblioteca.service;

import es.decroly.biblioteca.model.Categoria;
import es.decroly.biblioteca.model.Libro;

import java.util.List;

public interface LibroService {

    Libro listarLibro(Long Id);
    Libro listarLibro(String titulo);
    Libro crearLibro(Libro libro);
    Libro actualizarLibro(Libro libro);





}
