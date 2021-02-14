# BACKUP MYSQL COM PHP


## Antes de Executar

  - Instale o xampp ou o mysql em seu computador (Sistema feito com base no xampp)
  - Instale o xampp no disco local C
  - Ainda não testado com a instalção do mysql sem o xampp
  - Para gerar o backup e necessário ter um arquivo txt com o nome das tabelas seprando por virgula e sem espaçamento e quebra de linha entre elas.
  - Informe corretamente os caminhos do arquivo de tabelas e da pasta onde serão salvos os backups
  - Por padrão sera gerado a cada backup um pasta com o nome no format d-m-Y-manha ou d-m-Y-tarde. 

**Atenção** caso tenha instalado o xampp em outro disco mude o caminho na variavel **$dir_mysql** no arquivo **process.php**.

### Executando

Apenas acesse o projeto através do localhost, preencha as informações.