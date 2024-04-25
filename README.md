# Documentação do Projeto de Ranking de Movimentos

Visão Geral

O projeto de Ranking de Movimentos é uma aplicação web desenvolvida com o framework Laravel que fornece um endpoint REST para obter o ranking de usuários com base em seus recordes pessoais em determinados movimentos de academia. Ele utiliza um banco de dados para armazenar informações sobre usuários, movimentos e recordes pessoais.


Instalação:

Requisitos
* PHP >= 8.2
* Composer
* MySQL ou outro sistema de gerenciamento de banco de dados suportado pelo Laravel

Passos de Instalação
1. Clone o repositório do projeto do GitHub:
git clone https://github.com/gabrieldzuman/ranking-app.git

2. Acesse o diretório do projeto:
cd ranking-app

3. Instale as dependências do Composer:
composer install

4. Copie o arquivo de ambiente de exemplo e configure suas variáveis de ambiente:
cp .env.example .env

5. Gere a chave de aplicativo:php artisan key:generate.
6. Configure as credenciais do banco de dados no arquivo .env.
7. Execute as migrações do banco de dados para criar as tabelas necessárias:
php artisan migrate

8. (Opcional) Se desejar, você pode popular o banco de dados com dados de exemplo executando as sementes:
php artisan db:seed


Como Usar

Obtendo o Ranking de um Movimento

Para obter o ranking de um movimento específico, você pode enviar uma solicitação GET para o endpoint /api/ranking/{movement}. Substitua {movement} pelo nome do movimento desejado (por exemplo, deadlift, back-squat, bench-press).
Você também pode especificar parâmetros opcionais page e perPage para controle de paginação. Por padrão, page é 1 e perPage é 10.

Exemplo de solicitação usando cURL:
curl http://localhost:8000/api/ranking/deadlift

Exemplo de resposta:
[
     {
        "position": 1,
        "user": "Joao",
        "personal_record": 180,
        "date": "2021-01-02 00:00:00"
    },
    {
        "position": 2,
        "user": "Jose",
        "personal_record": 140,
        "date": "2021-01-05 00:00:00"
    },
    {
        "position": 3,
        "user": "Paulo",
        "personal_record": 130,
        "date": "2021-01-03 00:00:00"
    },
]


Conclusão

O projeto de Ranking de Movimentos fornece uma maneira simples e eficaz de visualizar o desempenho dos usuários em diferentes movimentos de academia. Com uma instalação rápida e fácil, você pode começar a usar este serviço para acompanhar e comparar os recordes pessoais dos usuários em diversos movimentos.
