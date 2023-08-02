## Introdução - Teste para Backend Laravel - Fácil Consulta

### Conhecimentos aplicados
- Laravel Sail
- Autenticação JWT
- Resources e Collections
- SoftDelete
- Validators
- Factories e Seeders
- Response HTTP
- Request
- Middleware
- Relacionamentos: ['Um para muitos', 'Muitos para Muitos']

## Instalação
Para instalar corretamente, siga os passos a seguir em uma máquina linux e com docker rodando:
- git clone https://github.com/marcosmessias-src/test-facil-consulta.git
- cd test-facil-consulta
- docker run --rm --interactive --tty -v $(pwd):/app composer install
- cp .env.example .env
- alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
- sail up -d
- sail artisan key:generate
- sail artisan migrate
- sail artisan db:seed

Após isso, acesse a URL: https://localhost

Para fazer login, já estará cadastrado o seguinte usuário e senha:
Email: krishnaferreira@facilconsulta.com
Senha: Sou+FacilConsulta

