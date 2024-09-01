package com.example.ApiCliente.modelo;

import javax.persistence.*;

@Entity
@Table(name = "users")
public class UsersModelo {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", length = 11, unique = true, nullable = false)
    private Long id;

    @Column(name = "usuario",unique = true, nullable = false)
    private String usuario;

    @Column(name = "clave", nullable = false)
    private String clave;

    @Column(name = "tipo")
    private Integer tipo;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getClave() {
        return clave;
    }

    public void setClave(String clave) {
        this.clave = clave;
    }

    public Integer getTipo() {
        return tipo;
    }

    public void setTipo(Integer tipo) {
        this.tipo = tipo;
    }
}
