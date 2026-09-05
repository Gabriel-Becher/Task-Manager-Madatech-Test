# Teste de Desenvolvimento CodeIgniter 4 - Madatech

## Requisitos

- Banco de dados MySQL
- PHP 8.2+
- Composer

### Extensões do PHP

- mysqli
- intl
- mbstring

## Como executar(Em Windows apenas)

### 1 - Instalar as dependências

```bash
composer install
```

### 2 - Copie env para .env e configure a conexão com o banco de dados:

```env
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = nome_banco
database.default.username = username
database.default.password = password
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

### 3 - Caso seu banco não exista, crie com este comando no cli do MySQL

```SQL
CREATE DATABASE task_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 4 - Execute a migration e inicie a aplicação:

```bash
php spark migrate
php spark serve
```

### 5 - Acesse http://localhost:8080/tasks

## API REST

### URL base: http://localhost:8080/api/tasks

| Método | Rota            | Descrição              |
| ------ | --------------- | ---------------------- |
| GET    | /api/tasks      | Lista todas as tarefas |
| GET    | /api/tasks/{id} | Retorna uma tarefa     |
| POST   | /api/tasks      | Cria uma tarefa        |
| PUT    | /api/tasks/{id} | Atualiza uma tarefa    |
| DELETE | /api/tasks/{id} | Exclui uma tarefa      |

Ao criar ou atualizar uma tarefa utilize

```
Content-Type: application/json
```

Payload

```JSON
{
    "title": "Aprender PHP",
    "description": "Entregar no prazo",
    "status": "pendente"
}
```

Descrição é opcional.
Status permitidos: "pendente", "em andamento" e "concluída"
