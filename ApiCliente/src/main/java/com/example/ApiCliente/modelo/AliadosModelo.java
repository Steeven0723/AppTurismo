package com.example.ApiCliente.modelo;

import org.hibernate.annotations.OnDelete;
import org.hibernate.annotations.OnDeleteAction;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name="aliados")
public class AliadosModelo {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "id",length = 11, unique = true,nullable = true)
    private Long id;

    @Column(name = "documento", length = 11, nullable = false)
    private String documento;
    @Column(name = "nombre", length = 32, nullable = false)
    @org.hibernate.annotations.Index(name = "nombre")
    private String nombre;
    @Column(name = "telefono", length = 10, nullable = false)
    private String telefono;
    @Column(name = "comercio", length = 50, nullable = false)
    private String comercio;
    @Column(name = "correo", nullable = false)
    private String correo;

    @org.hibernate.annotations.Index(name = "tipo_id")
    @ManyToOne
    @JoinColumn(name = "tipo_id", referencedColumnName = "id", foreignKey = @ForeignKey(name = "aliados_ibfk_1", foreignKeyDefinition = "FOREIGN KEY (tipo_id) REFERENCES tipo(id) ON UPDATE CASCADE"), nullable = false)
    @OnDelete(action = OnDeleteAction.CASCADE)
    private TipoModelo tipo_id;
    @Column(name = "estado")
    private  boolean estado;
    @Column(name = "latitud")
    private String latitud;
    @Column(name = "longitud")
    private String longitud;
    @Column(name = "plan_id", nullable = false)
    @org.hibernate.annotations.Index(name = "plan_id")
    private Long plan_id;

    public Long getId() {
        return id;
    }
    public void setId(Long id) {
        this.id = id;
    }
    public String getDocumento() {
        return documento;
    }
    public void setDocumento(String documento) {
        this.documento = documento;
    }
    public String getNombre() {
        return nombre;
    }
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    public String getTelefono() {
        return telefono;
    }
    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }
    public String getComercio() {
        return comercio;
    }
    public void setComercio(String comercio) {
        this.comercio = comercio;
    }
    public String getCorreo() {
        return correo;
    }
    public void setCorreo(String correo) {
        this.correo = correo;
    }
    public boolean isEstado() {
        return estado;
    }
    public void setEstado(boolean estado) {
        this.estado = estado;
    }
    public String getLatitud() {
        return latitud;
    }
    public void setLatitud(String latitud) {
        this.latitud = latitud;
    }
    public String getLongitud() {
        return longitud;
    }
    public void setLongitud(String longitud) {
        this.longitud = longitud;
    }
    public Long getPlan_id() {
        return plan_id;
    }
    public void setPlan_id(Long plan_id) {
        this.plan_id = plan_id;
    }
}

