<?php

include_once("db.php");

class Resource
{

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    public function __construct()
    {
       DB::createConnection(); 
    }

    /**
     * Comprueba si un email y una password pertenecen a algún usuario de la base  de datos.
     * @param String $email El email del usuario que se quiere comprobar
     * @param String $pass La contraseña del usuario que se quiere comprobar
     * @return User $usuario Si el usuario existe, devuelve un array con todos los campos del usuario en su interior. Si no, devuelve un objeto null
     */
    public function queryAll() {
       $result = DB::dataQuery("SELECT * FROM resource");
       if (count($result) > 0)
            return $result;
        else
            return null;
    }

    public function deleteId($idResource) {
        // Variable info para mandar el resultado
        $info = '';

        // Se busca el nombre del archivo antes de delete la fila en la DB
        $consulta = DB::dataQuery("SELECT img FROM resource WHERE id = '$idResource'");

        // Se comprueba que existe el id
        if (count($consulta) > 0) {
            $img_name = $consulta[0]['img'];
            $url_upload = 'C:\xampp\htdocs\DWES\Gestor-de-Reservas\assets\images\resources';
            $file_uploaded = $url_upload . '\\' . $img_name;

            // Se ejecuta el borrado de la fila con el id indicado
            $delete = DB::dataManipulation("DELETE FROM resource WHERE id = '$idResource'");
            
            // Si la eliminación de la fila ha funcionado se elimina la imagen
            if ($delete != 0) {
                // Si se ha eliminado la fotografía se manda una variable indicado que ha funcionado
                if (unlink($file_uploaded)) {
                    $info = 'ok_d';
                } else {
                    $info = 'errorFile';
                }
            } else {
                $info = 'errorRow';
            }
        }
        
        return $info;
    }

    public function modifyResource($data) {
        // Variable info para mandar el resultado
        $info = '';

        // Se busca el nombre del archivo antes de delete la fila en la DB
        $consulta = DB::dataQuery("SELECT img FROM resource WHERE id = '$data[0]'");

        // Se comprueba que existe el id
        if (count($consulta) > 0) {
            $img_name_old = $consulta[0]['img'];
            $img_name_new = '';
            
            if ($data[4] != null) {
                $img_name_new = str_replace(' ', '_', strtolower($data[1]) . '.jpg');
            } else {
                $img_name_new = "";
            }
            
            $url_upload = 'C:\xampp\htdocs\DWES\Gestor-de-Reservas\assets\images\resources';
            $file_uploaded_old = $url_upload . '\\' . $img_name_old;
            $file_uploaded_new = $url_upload . '\\' . $img_name_new;

            $modify = null;
            if ($img_name_new == "") {
                // Se ejecuta el modificado de la fila sin fotografía con el id indicado
                $modify = DB::dataManipulation("UPDATE resource SET
                                            name = '$data[1]',
                                            description = '$data[2]',
                                            location = '$data[3]'
                                            WHERE id = '$data[0]'");
            } else {
                // Se ejecuta el modificado de la fila con fotografía con el id indicado
                $modify = DB::dataManipulation("UPDATE resource SET
                                            name = '$data[1]',
                                            description = '$data[2]',
                                            location = '$data[3]',
                                            img = '$img_name_new'
                                            WHERE id = '$data[0]'");
            }
            
            // Si la modificación de la fila ha funcionado se elimina la imagen
            if ($modify != 0 && $img_name_new != "") {
                // Si se ha eliminado la fotografía se añade la nueva imagen
                $delete = unlink($file_uploaded_old);
                if ($delete && $img_name_old != $img_name_new) {
                    // Si las dos fotografias tienen nombres diferentes se sube el nuevo
                    if (move_uploaded_file($data[4], $file_uploaded_new)) {
                        $info = 'ok_m';
                    } else {
                        $info = 'errorFile';
                    }
                } else {
                    $info = 'errorFile';
                }
            } else if ($modify != 0 && $img_name_new == "") {
                $info = 'ok_m';
            } else {
                $info = 'errorRow';
            }
        }
        return $info;
    }

    public function queryResource($idResource) {
       $result = DB::dataQuery("SELECT * FROM resource WHERE id = '$idResource'");
       if (count($result) > 0)
            return $result;
        else
            return null;
    }

    public function createResource($data)
    {
        // Variable info para mandar el resultado
        $info='';

        $img_name = str_replace(' ', '_', strtolower($data[0]) . '.jpg');
        $url_upload = 'C:\xampp\htdocs\DWES\Gestor-de-Reservas\assets\images\resources';
        $file_uploaded = $url_upload . '\\' . $img_name;


        $consulta = DB::dataManipulation("INSERT INTO resource(name, description, location, img) VALUES ('$data[0]', '$data[1]', '$data[2]', '$img_name');");

        if ($consulta != 0) {
            if (move_uploaded_file($data[3], $file_uploaded)) {
                $info = 'ok_c';
            } else {
                $info = 'errorFile';
            }
        } else {
            $info = 'errorRow';
        }

        return $info;
    }
}
