#Požičovňa kníh

Vašou úlohou je vytvoriť webovú aplikáciu, ktorá umožní majiteľovi požičovne viesť databázu kníh a ich autorov. Aplikácia používateľovi umožní základné akcie pre knihy aj autorov:
* Zobraziť zoznam kníh/autorov
* Pridať novú knihu/autora
* Upraviť knihu/autora
* Zmazať knihu/autora

Zmena stavu knihy "požičaná/nepožičaná" bude možná aj zo zoznamu kníh.

Zoznam autorov bude obsahovať informáciu o počte kníh, ktoré sú uložené pod daným autorom. 

Jedna kniha má jedného autora, jeden autor má viacero kníh.

### Databáza bude obsahovať nasledovné entity a ich atribúty:
#### books
* author_id
* title
* is_borrowed

#### authors
* name
* surname

### Pri programovaní, prosím, dbajte na prehľadnosť kódu, dodržujte základné programovacie konvencie a postupy!
#### MUST HAVE:
* Laravel 6+
* MySQL
* Bootstrap
* Databázové migrácie

#### NICE TO HAVE:
* Vue.js
* Filtrovanie zoznamu kníh (autor, názov, stav požičania)
* Filtrovanie zoznamu autorov (meno, priezvisko)

#### + ostatné nevyhnutné technológie podľa potreby
