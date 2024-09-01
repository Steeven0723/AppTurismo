package com.example.ApiCliente.modelo;

import org.hibernate.annotations.OnDelete;
import org.hibernate.annotations.OnDeleteAction;
import org.w3c.dom.Text;

import javax.persistence.*;

@Entity
@Table (name = "planes")
public class PlanesModelo {

    @Id
    @GeneratedValue (strategy = GenerationType.IDENTITY)
    @Column(name = "id", length = 11, unique = true, nullable = false)
    private Long id;

    @ManyToOne
    @JoinColumn(name = "plan_id", referencedColumnName = "id", foreignKey = @ForeignKey(name = "planes_ibfk_1", foreignKeyDefinition = "FOREIGN KEY (id) REFERENCES aliados(plan_id) ON UPDATE CASCADE"))
    @OnDelete(action = OnDeleteAction.CASCADE)
    private AliadosModelo plan_id;

    @Column(name = "nombre", length = 32, nullable = false)
    private String nombre;

    @Column(name = "descripcion", nullable = false)
    private String descripcion;

    @Column(name = "valor", length = 11, nullable = false)
    private  Long valor;

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

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Long getValor() {
        return valor;
    }

    public void setValor(Long valor) {
        this.valor = valor;
    }
}
