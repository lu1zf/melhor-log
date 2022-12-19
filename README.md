# Melhor Log

## Objetivo
O objetivo desta aplicação é, a partir de um arquivo de logs, salvar os dados na base de dados e
disponibilizar essas informações em relatórios no formato CSV. O usuário deverá conseguir baixar logs
de:
- [x] Requisições por consumidor
- [x] Requisições por serviço
- [x] Tempo médio de request, proxy e gateway por serviço

## Tecnologias
O projeto foi construído utilizando Laravel, Docker e MySQL;

## Como executar
### Pré-requisitos
O projeto é estruturado utilizando o Sail, do Laravel, que tem como pré requisito o Docker instalado no sistema 
operacional no qual o projeto será executado. Caso você esteja utilizando windows, você precisará e [habilitar o WSL 2](https://docs.microsoft.com/en-us/windows/wsl/install-win10) e
[configurar o docker desktop para usar o backend do WSL 2](https://docs.docker.com/docker-for-windows/wsl/). Além disso,
recomendo também utilizar o [git cli](https://git-scm.com/), que utilizaremos para clonar o projeto.

### Clonando o projeto
Para baixar o projeto na sua máquina, abra um terminal na pasta em que deseja baixá-lo e execute:
```code
git clone https://github.com/lu1zf/melhor-log
```
### Executando a aplicação
Após clonar o projeto, para executá-lo, entre na pasta recém-baixada com o comando:
```code
cd melhor-log
```
Antes de inicializarmos a aplicação, é necessário baixar as dependências do composer:
```code
./vendor/bin/sail composer install
```
Após baixar as dependências, renomeie o arquivo `.env.example` para `.env` e substitua as seguintes linhas:
```code
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=melhor_log
DB_USERNAME=sail
DB_PASSWORD=password
```
Em seguida, utilize o comando 
```code
./vendor/bin/sail artisan key:generate
```
para gerar a chave da aplicação.

Por fim, precisamos popular o banco de dados com as tabelas e os logs fornecidos previamente. Isso fará com que tenhamos
a estrutura necessária para que o código funcione corretamente. 
```code
./vendor/bin/sail artisan migrate
```
Após finalizar as migrações, podemos iniciar com o seguinte comando:
```code
./vendor/bin/sail up -d
```
Isso fará com que a aplicação fique disponível em `http://localhost/` através do seu navegador. A flag `-d` no comando 
acima apenas faz com que a execução do projeto aconteça em segundo plano.
Para parar a execução, utilize o comando
```code
./vendor/bin/sail stop
```
