package com.example.ApiCliente.modelo;

import org.hibernate.annotations.OnDelete;
import org.hibernate.annotations.OnDeleteAction;

import javax.persistence.*;

@Entity
@Table(name = "respuestas")
public class RespuestasModelo {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", length = 11, unique = true, nullable = false)
    private Long id;

    @Column(name = "nota", nullable = false)
    private String nota;

    @org.hibernate.annotations.Index(name = "aliado_id")
    @ManyToOne
    @JoinColumn(name = "aliado_id", referencedColumnName = "id", foreignKey = @ForeignKey(name = "respuestas_ibfk_1", foreignKeyDefinition = "FOREIGN KEY (aliado_id) REFERENCES aliados(id) ON UPDATE CASCADE"), nullable = false)
    @OnDelete(action = OnDeleteAction.CASCADE)
    private AliadosModelo aliado_id;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNota() {
        return nota;
    }

    public void setNota(String nota) {
        this.nota = nota;
    }

}
