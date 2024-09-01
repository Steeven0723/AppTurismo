package com.example.ApiCliente.servicio;

import java.util.ArrayList;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import com.example.ApiCliente.modelo.AliadosModelo;
import com.example.ApiCliente.repositorio.ClienteRepositorio;

@Service
public class ClienteServicio {

    @Autowired
    ClienteRepositorio repositorio;

    //Guardar Aliados
    public AliadosModelo guardaAliados(AliadosModelo aliados){
        return repositorio.save(aliados);
    }

    //Ver todos los clientes
    public ArrayList<AliadosModelo> consultaAliados(){
        return (ArrayList<AliadosModelo>) repositorio.findAll();
    }

    //Eliminar cliente
    public boolean eliminaAliados(Long id){
        
        if (repositorio.existsById(id)){
            repositorio.deleteById(id);
            return true;
        }
        else{
            return false;
        }
        

    }
    
    //buscar un cliente por id
    public Optional<AliadosModelo> consultaPorId(Long id){
        return repositorio.findById(id);      
    }

    //buscar un cliente por nombre
    public ArrayList<AliadosModelo> buscarPorNombre(String nombre){
        return repositorio.findByNombre(nombre);
    }
   
}
