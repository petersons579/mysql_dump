<?php

//BD info
$BD_HOST = $_POST['bd_url'] ?? '';
$BD_PORT = $_POST['bd_port'] ?? '3306';
$BD_USER = $_POST['bd_user'] ?? '';
$BD_NAME = $_POST['bd_name'] ?? '';
$BD_PASS = $_POST['bd_password'] ?? '';

$path_file = $_POST['file_tables'] ?? '';
$dir_mysql = 'C:\xampp\mysql\bin';
$dir_to_dump = $_POST['path_save'] ?? '';
$comand = 'cd ' . $dir_mysql . ' && mysqldump --no-create-info --compact -P ' . $BD_PORT . ' -h ' . $BD_HOST . ' --password=' . $BD_PASS . ' -u ' . $BD_USER . ' ' . $BD_NAME . ' ';
$exec_string = '';
$folder_name = '';

if (empty($BD_HOST)) {
    header("location: index.php?erro=Informe a url do banco de dados.");
} elseif (empty($BD_NAME)) {
    header("location: index.php?erro=Informe o nome do banco de dados.");
} elseif (empty($BD_USER)) {
    header("location: index.php?erro=Informe o usuário do banco de dados.");
} elseif (empty($BD_NAME)) {
    header("location: index.php?erro=Informe o nome do banco de dados.");
} elseif (empty($BD_PORT)) {
    header("location: index.php?erro=Informe a porta do banco de dados.");
} elseif (empty($path_file)) {
    header("location: index.php?erro=Informe o caminho do arquivo com as tabelas.");
} elseif (empty($dir_to_dump)) {
    header("location: index.php?erro=Informe o caminho para salvar os arquivos de backup.");
} else {

    $arquivo = fopen($path_file,'r');
    $tables = array();
    $array_aux = array();

    while (!feof($arquivo)) {
        $tables[] = explode(',', trim(fgets($arquivo)));
    }

    $today = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    //echo $today->format('d-m-Y H:i');

    $hour = $today->format('H');
    if ($hour < 12) {
        $folder_name = $dir_to_dump . '\\' . $today->format('d-m-Y') . '-manha';
    } else {
        $folder_name = $dir_to_dump . '\\' . $today->format('d-m-Y') . '-tarde';
    }

    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }

    foreach($tables as $table) {
        if (count($table) > 1) {
            $tbl = trim($table[0]);

            $exec_string = $comand . $tbl . ' > "' . $folder_name . '\\' . $tbl . '.sql"';
            shell_exec($exec_string);
        } elseif (count($table) == 1) {
            $tbl = trim($table[0]);

            $exec_string = $comand . $tbl . ' > "' . $folder_name . '\\' . $tbl . '.sql"';
            shell_exec($exec_string);
        }
    };

    header("location: index.php?success=Backup gerado com sucesso.");
}