<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de preço</title>
    <!-- Bootstrap and css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css\style.css">
</head>

<body>

    <!-- Modal do bootstap-->



    <div id="JanelaModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form id="my-form" class="form-horizontal" method="post" action="">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>
                                <div class="col-md-8">
                                    <input id="Nome" name="Nome" placeholder="Nome" class="form-control input-md" required="" type="text">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>
                                <div class="col-md-8">
                                    <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                </div>

                                <label class="col-md-1 control-label" for="Nome">Data de Nascimento<h11>*</h11></label>
                                <div class="col-md-8">
                                    <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                                <!-- Multiple Radios (inline) -->

                                <label class="col-md-1 control-label" for="radios">Sexo<h11>*</h11></label>
                                <div class="col-md-4">
                                    <label required="" class="radio-inline" for="radios-0">
                                        <input name="sexo" id="sexo" value="feminino" type="radio" required>
                                        Feminino
                                    </label>
                                    <label class="radio-inline" for="radios-1">
                                        <input name="sexo" id="sexo" value="masculino" type="radio">
                                        Masculino
                                    </label>
                                </div>
                            </div>

                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="prependedtext">Telefone <h11>*</h11></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                                    </div>
                                </div>
                            </div>

                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input id="prependedtext" name="prependedtext" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                </div>

                                <label class="col-md-1 control-label" for="profissao">Profissão<h11>*</h11></label>
                                <div class="col-md-8">
                                    <input id="profissao" name="profissao" type="text" placeholder="profissao" class="form-control input-md" required="">

                                </div>
                            </div>


                        </fieldset>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit" onclick="adduser()" form="my-form">Cadastrar</button>
                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- arquivo html/css com tabela mostrando dados de clientes com mais de vinte anos -->

    <main class="table">
        <section class="table_header">
            <h1>CLIENTES FEMININAS COM MAIS DE 20 ANOS</h1>
            <button class="btn btn-info noselect " type="button" data-bs-toggle="modal" data-bs-target="#JanelaModal">Adicionar Novo</button>
        </section>
        <section class="table_body">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Sexo</th>
                    <th>Data de nascimento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Profissão</th>
                </tr>
        </section>
    </main>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"></script>

    <!-- Javascript -->
    <script>

    </script>

    <?php
    // incluindo arquivo de conexão com o banco de dados
    include 'conexao.php';

    // criando a query de consulta
    $sql = "SELECT 
    pessoas.nome, sexo,cpf,nascimento,
    email,celular, profissoes.nome profissao
FROM
    pessoas 
LEFT OUTER JOIN 
        profissoes ON profissoes.id = pessoas.profissao_id
WHERE
        sexo = 'feminino' and nascimento < '2003-01-01'";

    // executando a query
    $result = mysqli_query($mysqli, $sql);

    // verificando se a query retornou algum resultado
    if (mysqli_num_rows($result) > 0) {
        // percorrendo os resultados
        while ($row = mysqli_fetch_assoc($result)) {
            // exibindo os resultados
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['sexo'] . "</td>";
            echo "<td>" . $row['nascimento'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['celular'] . "</td>";
            echo "<td>" . $row['profissao'] . "</td>";

            echo "</tr>";
        }
    } else {
        // caso não tenha resultados
        echo "<tr>";
        echo "<td colspan='5'>Nenhum resultado encontrado</td>";
        echo "</tr>";
    }
    ?>



</body>

</html>