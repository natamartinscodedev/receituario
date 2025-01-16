<?php

namespace App\Controllers;

use App\Models\Ingredientes as IngredienteModel;

class Ingrediente extends BaseController
{
    public function index(): string
    {
        $model = new IngredienteModel();

        $data = [
            'lista'  => $model->findAll(),
            'titulo' => 'Lista de Ingredientes'
        ];

        return view('home/index', $data);
    }

    public function del(int $id)
    {
        $model = new IngredienteModel();

        $model->delete($id);

        return redirect()->to(base_url('receita'));
    }
}
