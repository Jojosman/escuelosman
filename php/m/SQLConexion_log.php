<?php
class SQLConexion{
	//propiedades
	public $conexion;

	private $server='localhost';
    private $usuario='root';
    private $clave='';
    private $bd='utnc_universidad';


    //Conectarse a la BD
	public function conectar(){
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Intentando conectar con el servidor},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Conexion},estado{secondary}"]<';

		$this->conexion=@new mysqli($this->server,$this->usuario,$this->clave,$this->bd);
        if ($this->conexion->connect_error){
			$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Conexion con el servidor fallida},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Conexion},estado{danger}"]<';
			file_put_contents($fichero, $actual);
          die('Error de Conexion :(');
			}
        else{
        	$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Conexion exitosa},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Conexion},estado{success}"]<';
			file_put_contents($fichero, $actual);
            $this->conexion->set_charset("utf8mb4");
		}
    }

    //desconectarse a la DB
    public function desconectar(){
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Desconectando del servidor},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Conexion},estado{secondary}"]<';
		file_put_contents($fichero, $actual);
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

		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Seleccionando datos del servidor ('.$QueryString.')},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Procedimiento},estado{success}"]<';
		file_put_contents($fichero, $actual);

		$this->desconectar();
		return $Datos;
	}

	//Para obtener el resultado de ejecutar un query que no devuelve datos, como Insert,Delete,Update.
	//Resultado retorna TRUE si el query se ejecuto correctamente.
	public function obtenerResultadoSimple($QueryString){
		$this->conectar();
			$Resultado=$this->conexion->query($QueryString);
			$this->desconectar();
			$fichero = '../php_log.html';
			$actual = file_get_contents($fichero);
			$now = DateTime::createFromFormat('U.u', microtime(true));
			$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Actualizando datos del servidor ('.$QueryString.')},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Procedimiento},estado{success}"]<';
			file_put_contents($fichero, $actual);
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
		$fichero = '../php_log.html';
		$actual = file_get_contents($fichero);
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$actual .= '["fecha{'.$now->format('l jS \of F Y h:i:s:v A e').'},data{Trayendo datos del servidor ('.$QueryString1.')},directorio{'.__FILE__.'},direccion_ip{'.$_SERVER['REMOTE_ADDR'].'},tipo{Procedimiento},estado{success}"]<';
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
