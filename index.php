<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUMP MYSQL</title>

    <!--Bootstrap Import-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>
    <!--NavBar-->
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="img/mysql-official.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            MySql Backup
        </a>
    </nav>

    <!--Form-->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <?php
                    if(isset($_GET['erro']) && !empty($_GET['erro'])) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Atenção!</strong> <?php echo $_GET['erro']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div> <?php 
                    } elseif(isset($_GET['success']) && !empty($_GET['success'])) {
                        ?> 
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> <?php echo $_GET['success']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                <form action="process.php" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="bd_url">Url do Banco de Dados</label>
                            <input type="text" class="form-control" id="bd_url" name="bd_url" placeholder="127.0.0.1">
                        </div>
                        <div class="col-sm-6">
                            <label for="file_tables">Arquivo das tabelas (Caminho)</label>
                            <input type="text" class="form-control" name="file_tables" id="file_tables" placeholder="C:\Users\tables.txt">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="bd_user">Usuário</label>
                            <input type="text" class="form-control" id="bd_user" name="bd_user" placeholder="root">
                        </div>
                        <div class="col-sm-6">
                            <label for="path_save">Caminho Para Salvar o Backup</label>
                            <input type="text" class="form-control" name="path_save" id="path_save" placeholder="C:\Users\dump\">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="bd_password">Senha</label>
                            <input type="password" class="form-control" name="bd_password" id="bd_password" placeholder="******">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="bd_name">Nome do Banco de Dados</label>
                            <input type="text" class="form-control" name="bd_name" id="bd_name" placeholder="teste">
                        </div>
                        <div class="col-sm-3">
                            <label for="bd_port">Porta</label>
                            <input type="text" class="form-control" name="bd_port" id="bd_port" placeholder="3306">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 float-right">Gerar Backup</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>