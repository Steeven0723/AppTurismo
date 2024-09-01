package com.example.ApiCliente.repositorio;

import java.util.ArrayList;

import com.example.ApiCliente.modelo.AliadosModelo;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.example.ApiCliente.modelo.AliadosModelo;

@Repository
public interface ClienteRepositorio extends CrudRepository<AliadosModelo,Long>{
    ArrayList<AliadosModelo> findByNombre(String nombre);
    
}
