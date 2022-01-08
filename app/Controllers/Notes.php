<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Notes extends ResourceController //ResourceController esta mas "adecuado" para trabar APIS a diferencia del clasico BaseController
{
    protected $modelName = 'App\Models\Notes'; //especifica el modelo que utilizara en esta variable protegida
    protected $format = 'json'; //tipo de formato que va a regresar

    public function index(){
        return $this->respond($this->model->findAll()); //trae todos los datos de la tabla y los retorna
    }

    public function create(){
        $form = $this->request->getJSON(true); //recoge los datos y convierte en array

        if(!$id= $this->model->insert($form)){ //hace intento de insertar pero pasara por las validaciones del modelo
            return $this->failValidationErrors($this->model->errors()); //recupera errores si existieorn cuando intento insertar y lo retorna
        }

        $note = $this->model->find($id); //buscamos ese nuevo regustro que se inserto
        return $this->respondCreated(['message'=> 'Registro creado correctamente', 'data'=> $note]);
    }

    public function update($id=null){
        $form = $this->request->getJSON(true); //recoge los datos y convierte en array

        if(empty($form)){
            return $this->failValidationErrors('Nada que actualizar');
        }

        if(!$this->model->find($id)){
            return $this->failNotFound(); //regres si es que no encontro ese id en la db
        }

        if(!$this->model->update($id, $form)){ //update pide primero el id, despues la info que se quiere editar
            return $this->failValidationErrors($this->model->errors()); //regresa error si flla la validacion del form en el modelo
        }

        return $this->respondUpdated(["message"=> "Registro actualizado con exito", "data"=> $this->model->find($id)]); //regresa esto si paso los filtros anteriores
    }

    public function delete($id=null){
        if(!$this->model->find($id)){
            return $this->failNotFound();
        }

        $this->model->where('id', $id)->delete();

        return $this->respondDeleted(["message"=> "Registro ${id} fue eliminado con exito"]); // ${} sirve para mandar el valor de una variable algo asi como el template string de js
    }
}
