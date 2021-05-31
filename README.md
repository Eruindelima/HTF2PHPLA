# hotfood_pi1

<img src="https://i.ibb.co/ccYdvLj/logo.jpg" width="300">



Projeto integrador do curso de análise e desenvolvimento de sistemas

# Hot_food

### 1. APRESENTAÇÃO
Este é um projeto de apoio didático composto por um conjunto de atividades práticas relacionadas a temas da disciplina de Projeto integrador, tais como: análise e programação orientada a objetos, padrões de projeto, modelagem visual com UML.
Como experimento prático ele está contextualizado na construção de um sistema baseado em uma aplicação web, o intuito do projeto visa a manutenção do estoque com base no mínimo desperdício visando a  comunicação com determinadas fazendas de regiões próximas que usarão esses alimentos fora de padrão para consumo que serão para a alimentação de animais ou o uso desses alimentos para adubação de solo podendo também ser uma fonte troca de itens.  
Que tem como fundamento a distribuição de alimentos que não servem para serem comercializados em feiras livres mas servem como adubo de solo onde serão produzidos alimentos ou para serem utilizados como alimentos para animais e ou dependendo do estado se estiverem em condições de consumo porém não visivelmente bonitos podem virar um sopão ou laranjas amassadas elas podem ser usadas para suco de frutas pois amassada ela esta porém poderá ser usada desta forma. 

### 2. EQUIPE
|Nome|Papel|Gituser|LinkedIn|
|--|--|--|--|
|Eruin De lima Silva|Dev| Eruindelimasilva| https://www.linkedin.com/in/eruin-de-lima/|
|José Tarcisio Gois Santos|Dev|tarcisiopsa| https://www.linkedin.com/in/tarcisio-santos-3285359b/ |
|Eliandro Araújo Gomes |Dev|EliandroAG| https://www.linkedin.com/in/eliandro-a-gomes-1b97458a/ |
|Caique Rossetto |produto|CaiqueRossetto| https://www.linkedin.com/in/caique-rossetto-897978190/ |
|Miflny Moreira Rocha|produto|Miflny| https://www.linkedin.com/in/miflny-moreira-44b1a01a1/ |

### 2. ESPECIFICAÇÃO

>Banco de dados Modelo Lógico

<img src="https://i.ibb.co/bmRYQCg/banco-imagem.jpg" width="700"> 

#### 2.1 -ATORES 
-Comerciantes </br>
-Instituição que receberá o alimento

#### 2.2 -FUNCIONAL
- [X] Cadastro de alimentos
- [X] Exclusão de alimentos
- [X] edição de alimentos cadastrados por parte do doador
- [x] Painel de alimentos 
- [x] Informações sobre os alimentos a serem doados 
- [X] Cadastro de usuário 
- [X] Edição do cadastro do usuário
- [x] Notificação em alimentos que estão com tempo para serem doados
- [x] Notificações em tempo real para que o doador receba informações de quem quer o alimeto
- [x] Notificação inversa onde o donatário recebe em tempo real informações e situação de estado do pedido feito

>Use Case

<img src="https://i.ibb.co/1LdGDBr/caso-de-uso-hotfood.jpg">


### 3.1 - Apresentação do Sistema 

<img src="https://i.ibb.co/x1B1cdv/login-hotfood.jpg">

> Tela de login 

<img src="https://i.ibb.co/St6MVB6/index-hotfood.jpg" width="3000">

> Tela inicial da Aplicação 

#### 4 - Tecnologias envolvidas

- [PHP](https://https://www.php.net//)
- [Laravel](https://laravel.com/)


#### 5 - Como rodar o projeto em sua maquina ?

- Para rodar esta projeto em sua maquina você precisará instalar:
- [PHP] maior que 7.4 (https://https://www.php.net//)
- [Laravel] (https://laravel.com/)
- [Composer] (https://getcomposer.org/) 
- Logo após isso quando você clonar o projeto em sua maquina modifique o .envexemple para . envi e faça as configurações em sua maquina.
#### - Configurações:
- 1.composer install && npm install
- 2.php artisan key:generate
- 3.php artisan storage:link
- 4.Editar as configurações doo banco para as configurações da máquina 
- 5.composer dump-autoload && php artisan optimize:clear
- 6.npm run dev 
- 7.php artisan serve
