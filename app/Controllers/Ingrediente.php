<?php

namespace App\Controllers;

use App\Models\Ingredientes as IngredienteModel;

class Ingrediente extends BaseController
{
    // get list users
    public function index(): string
    {
        $model = new IngredienteModel();

        $data = [
            'lista'  => $model->findAll(),
            'titulo' => 'Lista de Ingredientes'
        ];

        return view('home/index', $data);
    }

    // delet user
    public function del(int $id)
    {
        $model = new IngredienteModel();

        $model->delete($id);

        return redirect()->to(base_url('receita'));
    }

    // add new uitems in the list
    public function add()
    {
        $name = $this->request->getPost('name', FILTER_SANITIZE_STRING);
        $obs  = $this->request->getPost('obs', FILTER_SANITIZE_STRING);

        if(empty($name)) 
        {
            throw new Exception("O Nome do ingrediente é obrigatório", 400);            
        }

        $model  = new IngredienteModel();
        $result = $model->save([
            'name' => $name,
            'obs'  => $obs
        ]);

        if($result === false)
        {
            throw new Exception("Erro ao tentar salvar o ingrediente", 400);
        }

        return redirect()->to(base_url('receita'));
    }

    // edite itens in the list
    public function edit(int $id)
    {
        $model = new IngredienteModel();
        if(!$model->find($id))
        {
            throw new Exception("Ingrediente {$id} não encontrado", 400);
        }

        $name = $this->request->getPost('name', FILTER_SANITIZE_STRING);
        $obs  = $this->request->getPost('obs',  FILTER_SANITIZE_STRING);

        if(empty($name)) 
        {
            throw new Exception("O Nome do ingrediente é obrigatório", 400);            
        }

        $result = $model->save([
            'id'   => $id,
            'name' => $name,
            'obs'  => $obs
        ]);

        if($result === false)
        {
            throw new Exception("Erro ao tentar salvar o ingrediente", 400);
        }

        return redirect()->to(base_url('receita'));
    }
}
