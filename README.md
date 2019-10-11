# P21 Sistemas

- Instalação: 

Primeiro passo após ser clonado, o projeto deve seguir o segundo passo a passo

1 - composer install

2 - criar um arquivo .env com as configurações do banco de dados 

3 - php artisam migrate --seed

4 - php artisan serve


A solução proposta no projeto foi resolver de forma simples e objetiva o problema de importação dos dados da planilha xml
por parte da secretária. assim automatizando o processo e gerando menos trabalho e mais produtividade.

- Foi criada uma funcionalidade de cadastro de clientes, onde a secretária ou qualquer pessoa logado no sistema pode acessar,
preencher o formulário e inserir o cliente no banco de dados

- Foi criado uma funcionalidade de importação de clientes, onde é feito o upload do arquivo xml e os dados são salvos no banco
de dados juntamente com os outros clientes já cadastrados.

- Foi criao uma funcionalidade de funcionários, onde é feito o cadastro de funcionários do sitema.

- Foi criado uma funcionalidade de meus dados, onde o usuário logado pode alterar seus dados cadastrais.

- Foi criado uma funcionalidade de email, onde é feito o cadastro dos emails que são disparados aos clientes, podendo ser salvos
e enviados e reenviados quando necessário.


 Observações: 

- tive problema ao implementar o javascript dentro do adminlte, como deixei por ultimo por ser uma coisa simpples
acabei que não implementei nada em javascript, porem fiz as mascadas e estão dentro da public/js/script.js. 

- tive problema com o disparo de email para multiplos usuários. usei o mailtrap.io e o google mas mesmo assim da um erro
quando há disparo multiples 

- Cidades e Estados no cadastro de clientes, ia fazer uma regra onde quando fosse importar o cliente vindo do xml, ele 
verificaria se já tinha uma cidade e estados cadastrados no banco, se já tivesse pegaria os ids referentes aos campos e 
salvaria no banco de dados assim mantendo a integridade dos dados futuramente.

- Exportar dados e arquivos, deixei por ultimo mas tive problema com as biblitecas e não terminei de implementar, a 
ideia era exportar os dados dos usuários cadastrados em xml e csv. fiz a funcionalidade de importação onde ele mostra meio
que um histórico do que foi importado, ele guarda o arquivo que foi importado no storage, a ideia era poder deixar baixar
esse arquivo, mas como tive alguns problemas no final pra não comprometer não terminei de implementar.
