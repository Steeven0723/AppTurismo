package com.example.ApiCliente.modelo;

import javax.persistence.*;

@Entity
@Table(name = "tipo")
public class TipoModelo {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", length = 11, unique = true, nullable = false)
    private Long id;

    @Column(name = "nombre", length = 32, nullable = false)
    //@org.hibernate.annotations.Index(name = "nombre")
    private String nombre;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
}
