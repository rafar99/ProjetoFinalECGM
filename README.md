# ProjetoFinalECGM
Projeto no âmbito da cadeira de Projeto Final do curso ECGM que pertence à Escola Superior de Tecnologia e Gestão do Instituto Politécnico de Viana do Castelo

Para o Projeto funcionar em qualquer computador é necessário ter a atenção a várias coisas, que são:

 - Verificar se Node, Npm e composer estão instalados através destes comandos, respetivamente: *node -v* | *npm -v* | *composer -v*

 - Caso não estejam instalados basta pesquisar por "node" no seu browser e seguir os passos para a instalação, no fim volte a verificar através dos comandos anteriores. 

 - Instalar dependencias do frontend: entrar na pasta do projeto > *npm install*
 
 - Colocar a pasta vendor no projeto: entrar na pasta do projeto > *composer update*

 - Alteração do .env: alterar o nome do ficheiro ".env.exemaple" so para ".env" alterar nome da base dados para: solarenergy 
 
 - Criar base dados phpmyAdmin nome: solarenergy

 - Depois de criar a BD correr os comandos: *php artisan migrate* e *php artisan key:generate*
