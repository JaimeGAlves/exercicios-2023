# Exercícios de PHP

Olá! Este repositório contém dois exercícios, ambos devem ser executados para o teste da vaga de Desenvolvedor Web na Chuva.

## War

O primeiro exercício é uma variação do jogo "War".

### Regras do jogo

* O jogo ocorre em um mapa onde há vários países, alguns deles compartilhando uma fronteira entre si.
* Cada jogador controla um país.
* Cada jogador começa com 3 tropas.
* O jogo se dá em rodadas, com os jogadores jogando uma ordem fixa.
* A cada rodada, o jogador pode decidir atacar, ou não, um (apenas um), país vizinho. O ataque é feito com todas as suas tropas MENOS UMA, sempre. (uma tropa deve sempre ficar em casa, para que o país não saia derrotado)
* Cada jogador roda um dado (1-6) para cada tropa que tem. Os maiores valores de um são comparados com os maiores valores do outro. Em cada par, quem tiver o menor valor, perde. Em caso de empate, o atacado ganha. Exemplo:
  * _Mordor_ com 5 tropas ataca _Gondor_, que tem 3 tropas.
  * _Mordor_ tira `2-5-5-4-3`. _Gondor_ tira `5-6-3`.
  * Ordenando, temos: _Mordor_ com a sequência `5-5-4-3-2` e _Gondor_ tira `6-5-3`.
  * O primeiro par é `5` de _Mordor_ versus o `6` de _Gondor_. _Gondor_ ganha.
  * O segundo par é o segundo `5` de _Mordor_ versus o `5` de _Gondor_. _Gondor_ ganha.
  * O terceiro par é o `4` de _Mordor_ versus o `3` de _Gondor_. _Mordor_ ganha.
  * Assim, _Mordor_ perde duas tropas, ficando com 3 no total, e _Gondor_ perde uma tropa ficando com 2 tropas.
* Quando um país ficar com `0` tropas, ele é "anexado" pelo país atacante. Isso significa que os países vizinhos do país derrotado passam a ser vizinhos do país vencedor. Exemplo:
  * Existem três jogadores. _Fangorn_ faz fronteira com _Rohan_. _Rohan_ faz fronteira com _Gondor_. _Fangorn_ não faz fronteira com _Gondor_.
  * _Fangorn_ derrota e anexa _Rohan_.
  * Agora existem dois jogadores. _Fangorn_ e _Gondor_, que fazem fronteira entre si.
* A cada rodada, cada país ainda no jogo ganha 3 tropas, e um extra de 1 tropa para cada país conquistado.
* O jogo acaba quando sobrar apenas um país.

### O exercício

Neste repositório você vai encontrar o esqueleto do código para o jogo. Existe uma arquitetura a ser seguida, existem Interfaces PHP e você deverá criar classes implementando essas Interfaces.

Existe também uma interface de usuário pronta. O jogo é jogado por linha de comando, você _não_ deve implementar uma interface web para o jogo. O jogo contém apenas jogadores de máquina, não existem jogadores humanos.

O objetivo do exercício é: faça o código necessário para o jogo funcionar, de acordo com todas as regras acima.

### Como rodar

Dependências:

* PHP - linha de comando
* [Composer](https://getcomposer.org/)

Para rodar o jogo, você deve rodar o seguinte comando:

```
composer war
```

Ao rodar o comando pela primeira vez, você vai receber um erro fatal:

```
PHP Fatal error:  Class Galoa\ExerciciosPhp2022\War\GamePlay\Battlefield contains 2 abstract
methods and must therefore be declared abstract or implement the remaining methods (Galoa\ExerciciosPhp2022\War\GamePlay\BattlefieldInterface::rollDice,
Galoa\ExerciciosPhp2022\War\GamePlay\BattlefieldInterface::computeBattle) in
/home/ze/git/experimentos/exercicios-php-2022/src/War/GamePlay/Battlefield.php on line 10
```

Isso vai ocorrer porque você não implementou o jogo ainda. Quando o exercício estiver pronto, você vai ver a progressão do jogo.

## Web Scrapping

Neste segundo exercício você deve capturar os dados de uma página HTML e converter em uma planilha. O arquivo a ser lido é `webscrapping/origin.html`, ele é uma página (com algumas adaptações) de um Proceedings do Galoá. O seu objetivo é extrair as informações sobre trabalhos e montar uma planilha similar a `webscrapping/model.xlsx`.

Para a resolução do exercício, você pode alterar qualquer arquivo dentro da pasta `src/WebScrapping`.

### Como rodar

Dependências:

* PHP - linha de comando
* Extensões do PHP: ZIP, DOM, XML
* [Composer](https://getcomposer.org/)

Rode o seguinte comando para instalar o ambiente:

```
composer install
```

Para rodar o scrapping, rode o seguinte comando:

```
composer webscrapping
```

### Dicas de resolução

Duas ferramentas vão ser especialmente úteis para você resolver este exercício.

* DOM, para ler o HTML - https://www.php.net/manual/pt_BR/class.domdocument.php
* Spout, para escrever a planilha - https://opensource.box.com/spout/

## Como entregar os exercícios

Para entregar os exercícios:

1. Crie um fork deste repositório.
2. Programe o código de cada exercício.
3. Commite suas mudanças e suba para o repositório.
4. Deixe o repositório público e nos envie o link.