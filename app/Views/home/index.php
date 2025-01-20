<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Igredientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <h2><?= $titulo ?></h2>   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIngrediente">Novo</button>
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
                    <td class="name"><?= $value->name ?></td>
                    <td class="obs"><?= $value->obs ?? '' ?></td>
                    <td>
                    <button type="button" id="<?= $value->id ?>" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalIngrediente">Editar</button>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('receita/del/' . $value->id) ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="modal fade" id="modalIngrediente" tabindex="-1" role="dialog" aria-labelledby="modalIngredienteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalIngredienteTitle">Cadastro de Ingrediente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('receita/add') ?>" method="post">
                    <div class="modal-body">                
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="obs">Observação</label>
                                <textarea class="form-control" id="obs" name="obs"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#modalIngrediente').on('show.bs.modal', function (event) {
                var button  = $(event.relatedTarget);
                var id      = button.attr('id');
                var modal   = $(this);
                var urlAdd  = '<?= base_url('receita/add') ?>';
                var urlEdit = '<?= base_url('receita/') ?>' + id;

                if(id === undefined) {
                    modal.find('.modal-title').text('Cadastro de Ingrediente');
                    modal.find('.modal-body #name').val('');
                    modal.find('.modal-body #obs').val('');
                    modal.find('form').attr('action', urlAdd);
                } else {
                    modal.find('.modal-title').text('Editar Ingrediente');
                    modal.find('.modal-body #name').val(button.parent().parent().find('.name').text());
                    modal.find('.modal-body #obs').val(button.parent().parent().find('.obs').text());                    
                    modal.find('form').attr('action', urlEdit);
                }
            });
        });
    </script>    
</body>
</html>