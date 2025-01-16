<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Igredientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h2><?= $titulo ?></h2>   
    <a class="btn btn-primary" href="<?= base_url('receita/new') ?>">Novo</a>  
    <br /><br />

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Observação</th>
                <th>Edit</th>
                <th>Del</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $value) : ?>
                <tr>
                    <td><?= $value->nome ?></td>
                    <td><?= $value->obs ?? '' ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="<?= base_url('receita/edit/' . $value->id) ?>">Editar</a>                        
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('receita/del/' . $value->id) ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>