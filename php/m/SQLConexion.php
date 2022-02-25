<?php
date_default_timezone_set('America/Monterrey');
class SQLConexion{
	//propiedades
	public $conexion;
	/*
	private $server='localhost';
    private $usuario='root';
    private $clave='';
    private $bd='utnc_universidad';
	*/
    private $server='localhost';
    private $usuario='root';
    private $clave='MySQL#mgmt';
    private $bd='utnc_universidad';    
	
	
    //Conectarse a la BD
	public function conectar(){
		$this->conexion=@new mysqli($this->server,$this->usuario,$this->clave,$this->bd);
        if ($this->conexion->connect_error)
            die('Error de Conexion :(');
 
    }    
    
    //desconectarse a la DB
    public function desconectar(){
		$this->conexion->close();
    }
	
      
	//Ejecuta un query y retorna el resultado en un Array
	//Solo utilizar cuando el resultado del Query provenga de un Select
	//Ya sea un Select Directo o dentro de un SP
	public function obtenerResultado($QueryString){
		$this->conectar();
		$Resultado=$this->conexion->query($QueryString); //Ejecucion del Query
		$Datos=array(); //Declaracion Array donde almacenaremos nuestros datos
		$i=0;
		
		while($fila=$Resultado->fetch_array()){
			$Datos[$i]=$fila;
			$i++;
		}

		//Tratamiento de logs
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= 'Fecha: '.$now->format('l jS \of F Y h:i A').',Accion: obteniendo desde el servidor ('.$QueryString.'),IP: '.$_SERVER['REMOTE_ADDR'].'estado: success <br>';
		file_put_contents($fichero, $actual);

		$this->desconectar();	
		return $Datos;	
	}
	
	//Para obtener el resultado de ejecutar un query que no devuelve datos, como Insert,Delete,Update.
	//Resultado retorna TRUE si el query se ejecuto correctamente.
	public function obtenerResultadoSimple($QueryString){
		$this->conectar();
			$Resultado=$this->conexion->query($QueryString);
			//Tratamiento de logs
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= 'Fecha: '.$now->format('l jS \of F Y h:i A').',Accion: obteniendo desde el servidor ('.$QueryString.'),IP: '.$_SERVER['REMOTE_ADDR'].'estado: success <br>';
		file_put_contents($fichero, $actual);
			$this->desconectar();
		Return $Resultado;
	}
	
	public function obtenerResultadoID($QueryString1){
		$this->conectar();
		$Resultado1=$this->conexion->query($QueryString1);
		$Resultado2=$this->conexion->query("SELECT @_ID as _ID;"); //Ejecucion del Query
		$Datos=array(); //Declaracion Array donde almacenaremos nuestros datos
		$i=0;
		while($fila=$Resultado2->fetch_array()){
			$Datos[$i]=$fila;
			$i++;
		}
		//Tratamiento de logs
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= 'Fecha: '.$now->format('l jS \of F Y h:i A').',Accion: obteniendo desde el servidor ('.$QueryString.'),IP: '.$_SERVER['REMOTE_ADDR'].'estado: success <br>';
		file_put_contents($fichero, $actual);
		$this->desconectar();	
		return $Datos;				
	}
	//Escapa caracteres especiales en un string. Ayuda a prevenir inyecciones SQL
	public function escapar($string){
		$this->conectar();

		//Evalua si el argumento que se le pasa es un arreglo
		if(is_array($string)){
			$funcion = array($this->conexion,"real_escape_string"); // Si lo es, guarda en un arreglo el contexto y el nombre de la funci贸n real_escape_string
			$escapedArray = array_map($funcion,$string); // Le aplica dicha funci贸n a todo el arreglo
			return $escapedArray; // Retorna el arreglo ya escapado y sale de la funci贸n
		}
		// Si no es un arreglo, escapa el string y lo retorna
		$escapedString = $this->conexion->real_escape_string($string);
		$this->desconectar();
		return $escapedString;
	}
}
?>