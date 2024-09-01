package com.example.ApiCliente.controlador;

import java.util.ArrayList;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.example.ApiCliente.modelo.AliadosModelo;
import com.example.ApiCliente.servicio.ClienteServicio;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;


@RestController
@RequestMapping("/cliente")
@CrossOrigin(origins = "*", methods = {RequestMethod.GET,RequestMethod.POST,RequestMethod.DELETE})
public class ClienteControl {

    @Autowired
    ClienteServicio servicio;

    @PostMapping("/guardar")
    public AliadosModelo guardarCliente(@RequestBody AliadosModelo aliados){
        return servicio.guardaAliados(aliados);
    }

    @GetMapping("/vertodos")
    public ArrayList<AliadosModelo> consultaClientes(){
        return servicio.consultaAliados();
    }

    @DeleteMapping("/eliminar/{id}")
    public boolean eliminaCliente(@PathVariable("id") Long id){
        return servicio.eliminaAliados(id);
    }
    
    @GetMapping("/consulta/{id}")
    public Optional<AliadosModelo> consultarPorId(@PathVariable("id") Long id){
        return servicio.consultaPorId(id);
    }

    @GetMapping("/busqueda/{nombre}")
    public ArrayList<AliadosModelo> buscarPorNombre(@PathVariable("nombre") String nombre){
        return servicio.buscarPorNombre(nombre);
    }
    
    
}
