package es.decroly.biblioteca.service;

import es.decroly.biblioteca.model.Libro;

import java.util.List;

public abstract class LibroServiceImpl implements LibroService {


    public LibroServiceImpl() {
    }

    public LibroServiceImpl(List<Libro> elPrincipito, Libro libro, Libro libro1, Libro libro2, Libro juegoDeTronos) {
    }

    @Override
    public Libro listarLibro(Long Id) {
        return null;
    }

    @Override
    public Libro listarLibro(String titulo) {
        return null;
    }

    @Override
    public Libro crearLibro(Libro libro) {
        return null;
    }

    @Override
    public Libro actualizarLibro(Libro libro) {
        return null;
    }
}
