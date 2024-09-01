<?php //modelo

class UsuarioBD
{

    private $aliados;




    //____________Consultar Solicitudes_________________
    public function getSolicitudes()
    {
        require_once('conectarbdD.php');
        $consulta = conectarbdD::conexion()->query("SELECT * FROM aliados");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->aliados[] = $fila;
        }
        return $this->aliados;
    }

    public function getEstado0()
    {
        require_once('conectarbdD.php');
        $consulta = conectarbdD::conexion()->query("SELECT * FROM aliados WHERE estado = '0'");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->aliados[] = $fila;
        }
        return $this->aliados;
    }
    
    public function getEstado1()
    {
        require_once('conectarbdD.php');
        $consulta = conectarbdD::conexion()->query("SELECT * FROM aliados WHERE estado = '1'");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->aliados[] = $fila;
        }
        return $this->aliados;
    }
    
    
    public function getSolicitudPorID($id)
    {
        require_once('conectarbdD.php');
        $conexion = conectarbdD::conexion();
        $stmt = $conexion->prepare("SELECT * FROM aliados WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
