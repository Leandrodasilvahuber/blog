# Blog — index.log

Blog de Leandro Hüber: redação jornalística sobre tecnologia orquestrada por IA, com curadoria e revisão humana. O site público consome um feed de posts via API; a publicação é feita por um painel administrativo (Laravel) ou por uma API autenticada por token, usada por automações externas.

## Stack

- Laravel 12 (PHP 8.2)
- Blade + JS puro (sem framework de frontend) para o painel admin e a home pública
- Sanctum para autenticação por token da API de publicação
- SQLite/MySQL (configurável via `.env`)

## Como rodar localmente

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # se estiver usando sqlite
php artisan migrate
php artisan db:seed --class="Database\Seeders\AdminUserSeeder"
php artisan serve
```

O seeder `AdminUserSeeder` cria/atualiza o usuário admin usando `ADMIN_EMAIL`/`ADMIN_PASSWORD` do `.env`. Se `ADMIN_PASSWORD` não for definida, uma senha aleatória é gerada e impressa no console — defina essas variáveis antes de rodar em produção.

## Estrutura principal

- `routes/web.php` — home pública (`/`) e painel admin (`/adm`, autenticado por sessão)
- `routes/api.php` — feed público paginado (`GET /api/posts`) e API de publicação autenticada por token Sanctum (`POST/DELETE /api/adm/posts`)
- `app/Http/Controllers/Concerns/ValidatesPostData.php` — validação compartilhada entre os controllers web e API (incluindo upload de capa via arquivo ou base64)
- `public/js/feed.js` — busca e renderiza o feed na home a partir de `/api/posts`

## Testes

```bash
# Testes de unidade e feature (sqlite em memória)
php artisan test

# Testes end-to-end no navegador (Dusk)
php artisan serve                 # em um terminal, deixe rodando
php artisan dusk                  # em outro terminal
```

Os testes Dusk usam `.env.dusk.local` (não versionado) e um banco sqlite dedicado (`database/database.dusk.sqlite`) para não afetar o banco de desenvolvimento. Se `.env.dusk.local` não existir, copie o `.env` e ajuste `APP_ENV=testing`, `APP_URL=http://127.0.0.1:8000` e `DB_DATABASE` para um arquivo sqlite próprio.

## Qualidade e CI

O workflow `.github/workflows/lint.yml` roda em cada push/PR para `master`:

- **Pint** — formatação (`composer lint:test`)
- **Larastan** (PHPStan nível 8) — análise estática (`composer analyse`)
- **Rector** — checagem de modernização pendente (`composer rector:test`)
- **PHP Insights** — qualidade geral (`composer insights`)
- **`composer audit`** — dependências com vulnerabilidades conhecidas
- **`tests`** — testes de unidade e feature (`composer test`)
- **`dusk`** — testes end-to-end no navegador (`composer test:dusk`)

O deploy para produção (branch `producao`) é feito por `.github/workflows/deploy.yml` via SSH/rsync para a instância EC2.
