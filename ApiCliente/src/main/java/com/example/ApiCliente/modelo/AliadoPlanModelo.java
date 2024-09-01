package com.example.ApiCliente.modelo;
import org.hibernate.annotations.OnDelete;
import org.hibernate.annotations.OnDeleteAction;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "aliado_plan")
public class AliadoPlanModelo {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", length = 11, unique = true, nullable = true)
    private Long id;

    //@Column(name = "aliado_id", length = 11, nullable = false)
    @org.hibernate.annotations.Index(name = "aliado_id")
    @ManyToOne
    @JoinColumn(name = "aliado_id", referencedColumnName = "id", foreignKey = @ForeignKey(name = "aliado_plan_ibfk_1", foreignKeyDefinition = "FOREIGN KEY (aliado_id) REFERENCES aliados(id) ON UPDATE CASCADE"), nullable = false)
    @OnDelete(action = OnDeleteAction.CASCADE)
    private AliadosModelo aliado_id;

    @org.hibernate.annotations.Index(name = "plan_id")
    @ManyToOne
    @JoinColumn(name = "plan_id", referencedColumnName = "id", foreignKey = @ForeignKey(name = "aliado_plan_ibfk_2" , foreignKeyDefinition = "FOREIGN KEY (plan_id) REFERENCES planes(id) ON UPDATE CASCADE"), nullable = false)
    @OnDelete(action = OnDeleteAction.CASCADE)
    private  PlanesModelo plan_id;

    @Column(name = "estado")
    private boolean estado;

    @Column(name = "fecha_inicio", nullable = false)
    private LocalDate fecha_inicio;

    @Column(name = "fecha_final", nullable = false)
    private  LocalDate fecha_final;


    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public boolean isEstado() {
        return estado;
    }

    public void setEstado(boolean estado) {
        this.estado = estado;
    }

    public LocalDate getFecha_inicio() {
        return fecha_inicio;
    }

    public void setFecha_inicio(LocalDate fecha_inicio) {
        this.fecha_inicio = fecha_inicio;
    }

    public LocalDate getFecha_final() {
        return fecha_final;
    }

    public void setFecha_final(LocalDate fecha_final) {
        this.fecha_final = fecha_final;
    }
}
