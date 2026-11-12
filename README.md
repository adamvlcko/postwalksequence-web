# Post Walk Sequence

Adam Vlčko
5ZYI32

## Stručný opis projektu

Post Walk Sequence (postupnosť poštovej pochôdzky) je webová aplikácia pre doručovateľa pošty, ktorá digitalizuje jeho rajón. Rieši problém, kedy domy v uliciach poštového rajónu majú nemonotónne očíslovanie: čísla domov nerastú postupne s postupujúcou pochôdzkou, a doručovateľ preto musí pri triedení zaraďovať zásielku na správne miesto podľa naučeného (alebo papierového) indexu. 

Pochôdzky a ulice sa v tejto aplikácii uložia ako usporiadané postupnosti súpisných čísel domov presne v poradí, v akom ich doručovateľ prechádza. Pri rannom triedení zadá číslo domu a aplikácia hneď rozhodne o správnom zaradení listu: zobrazí sa adresný bod predchádzajúceho a nasledujúceho listu, takže doručovateľ vie, medzi ktoré dva ju vložiť.

Aplikácia je určená doručovateľom ako osobná pomôcka; každý používateľ si založí účet sám a vidí iba svoje dáta. 

## Role v projekte

| Rola | Oprávnenia a zodpovednosť |
|---|---|
| **Návštevník** (neprihlásený) | Smie iba otvoriť registráciu a prihlásenie a overiť dostupnosť prihlasovacieho mena. K žiadnym dátam nemá prístup. |
| **Doručovateľ** (prihlásený používateľ) | Spravuje svoje pochôdzky, ulice, čísla domov a denné poradia, zaraďuje zásielky. Vidí a mení iba záznamy, ktorých je vlastníkom. |


## Prípady použitia podľa rolí

**Návštevník**
- návštevník si založí účet (prihlasovacie meno s priebežnou kontrolou dostupnosti, heslo 2×) a je rovno prihlásený,
- návštevník sa prihlási menom a heslom.

**Doručovateľ — pochôdzky a ulice**
- doručovateľ vytvorí, zobrazí, premenuje a zmaže pochôdzku,
- doručovateľ vytvorí, zobrazí, premenuje a zmaže ulicu pochôdzky.

**Doručovateľ — čísla domov**
- doručovateľ hromadne zapíše čísla domov ulice v poradí obchôdzky, aj v tvare `súpisné/popisné`,
- doručovateľ presunie číslo domu tlačidlami ▲▼, obráti poradie celej ulice, opraví číslo a zmaže ho.

**Doručovateľ — denné poradia a zaraďovanie**
- doručovateľ založí denné poradie ulice (napr. „R listy“, verzie v1, v2 …), zapne valuáciu objemových bodov a zvolí predvolenú objemovú triedu zásielky,
- doručovateľ pri zakladaní ďalšej verzie prevezme adresné body z dnešnej predchádzajúcej verzie aj s objemom,
- doručovateľ zobrazí, premenuje a zmaže poradie,
- doručovateľ zadá číslo domu a zásielku zaradí; dozvie sa susedné listy, prvý/posledný list, miesto v kope (poradie, kvartil, percentil) a uvidí ilustráciu kopy,
- doručovateľ zmení objemovú triedu zásielky alebo zruší omylom pridanú ďalšiu zásielku,
- doručovateľ si prezrie poradie adresných bodov v odvodenom poradí pochôdzky.

**Doručovateľ — prenos pochôdzky**
- doručovateľ exportuje všetky alebo vybrané pochôdzky do súboru JSON,
- doručovateľ nahrá súbor, prezrie si náhľad importu a importuje ho v režime *Zlúčiť* alebo *Nahradiť všetko*.

## Plánované entity

| Entita (tabuľka) | Účel | Najdôležitejšie atribúty | Vzťahy |
|---|---|---|---|
| **Používateľ** | účet doručovateľa, vlastník dát | `username`, `password_hash` | 1:N k pochôdzkam |
| **Pochôdzka**  | rajón doručovateľa | `user_id`, `name`, `created_at` | patrí používateľovi, 1:N k uliciam |
| **Ulica** | ulica v rámci pochôdzky | `walk_id`, `name` | patrí pochôdzke, 1:N k číslam domov a 1:N k poradiam |
| **Číslo domu** | adresný bod ulice s pozíciou v poradí pochôdzky | `street_id`, `position`, `number` (súpisné číslo jedinečné v pochôdzke), `descriptive` (popisné číslo jedinečné v ulici, nepovinné) | patrí ulici |
| **Poradie** | denné poradie zaraďovania listov | `street_id`, `seq_date`, `version`, `volume_valuation` | patrí ulici, 1:N k adresným bodom |
| **Adresný bod** | konkrétna realizácia zaradenia domu do poradia so súčtom objemových bodov zásielok | `sequence_id`, `house_number_id` (jedinečná dvojica), `volume_points ≥ 1` | patrí poradiu a číslu domu |

Pozícia adresného bodu v poradí sa neukladá — odvodzuje sa z pozície domu v ulici. 

## Vzťahy medzi entitami

- **Používateľ 1:N Pochôdzka** — každá pochôdzka má práve jedného vlastníka; na tomto vzťahu stojí celá autorizácia.
- **Pochôdzka 1:N Ulica**, **Ulica 1:N Číslo domu** — ulica je usporiadaná n‑tica domov podľa pozície
- **Ulica 1:N Poradie** — ulica môže mať viac denných poradí v jeden deň (iné na R listy, iné na obyč. listy, iné na vyplácanie dávok, apod.)
- **Poradie 1:N Adresný bod** a **Číslo domu 1:N Adresný bod** — adresný bod je spojovacia entita, ktorá realizuje vzťah **M:N medzi poradiami a číslami domov**; jeden dom je v jednom poradí najviac raz.


## Hlavné stránky aplikácie

| ID | Stránka | Účel |
|---|---|---|
| S0 | Registrácia | založenie účtu so živou kontrolou dostupnosti mena  |
| S1 | Prihlásenie | prihlasovací formulár s odkazom na registráciu |
| S2 | Pochôdzky | zoznam vlastných pochôdzok (názov, dátum, počet ulíc); vytvorenie, premenovanie, zmazanie |
| S3 | Ulice pochôdzky | zoznam ulíc s počtom domov; správa ulíc, odkazy na editor a poradia |
| S4 | Editor ulice | hromadný zápis čísel domov, presun ▲▼, úprava, zmazanie, obrátenie smeru ulice |
| S5 | Poradia ulice | zoznam poradí s počtom adresných bodov a súčtom objemových bodov; založenie s ponukou prevzatia z predchádzajúcej verzie, premenovanie, zmazanie |
| S6 | Zaraďovanie | veľké políčko na číslo domu, farebný výsledok, susedné listy, miesto v kope listov, ilustrácia danej kopy, výber objemovej triedy |
| S7 | Poradie | adresné body v odvodenom poradí s poradovým číslom a objemovými bodmi |
| S8 | Prenos | export vybraných alebo všetkých pochôdzok, nahratie súboru na import a voľba režimu |
| S9 | Náhľad importu | plán importu (pribudne / prepíše sa / zanikne), upozornenie na zahodené údaje, prepnutie režimu, potvrdenie |

## Rozdelenie funkcionality

**Základné funkcie**
- samoobslužná registrácia a prihlásenie, heslá cez `password_hash`, prístup iba k vlastným dátam,
- plné CRUD nad pochôdzkami, ulicami, číslami domov a poradiami; adresné body vzniknú zaraďovaním,
- zápis čísel v tvare `súpisné/popisné`, ich presun, obrátenie ulice a verzie poradí v jednom dni,
- zaraďovanie zásielky s rozlíšením adresy (ulica / iná ulica / nenájdené) a so susedmi,
- zobrazenie poradia adresných bodov,
- kontrola vstupov na klientovi aj serveri

**Rozširujúce funkcie** 
1. valuácia objemových bodov: triedy objemu, zmena triedy a zrušenie ďalšej zásielky,
2. miesto v kope a ilustrácia kopy pri zaraďovaní,
3. prevzatie adresných bodov z predchádzajúcej verzie poradia,
4. export a import pochôdzok v JSON s náhľadom 
5. ďalšia rola - *vedúci pošty* - a prideľovanie rajónov doručovateľom,
6. aliasy domov, flagy a popis obyvateľov,
7. dopočet výdavkov pri prijímaní dobierok, colných poplatkov a inkasných platieb 

## Spustenie

Aplikácia je postavená na frameworku Vaííčko (PHP 8.3, MVC). Verejný koreň webu
je priečinok `public/`, dáta sú v databáze MariaDB.

V tejto fáze pracuje s databázou stránka *Pochôdzky*: zoznam pochôdzok, pridanie,
premenovanie a zmazanie. Ostatné stránky zobrazujú statický ukážkový obsah
(stránka *Ulice pochôdzky* už ukazuje názov pochôdzky z databázy). Prihlasovanie
zatiaľ nie je; pochôdzky patria ukážkovému používateľovi `novak`.

### Docker

Potrebný je Docker Desktop. Z koreňa projektu:

```bash
cd docker
docker compose up -d
```

Aplikácia beží na <http://localhost/>; úvodná adresa presmeruje na zoznam
pochôdzok. Zastavenie: `docker compose down`.

Pri prvom štarte vytvorí databáza tabuľky a ukážkové dáta zo skriptov
v `docker/sql/` (`01-schema.sql`, `02-seed.sql`); `docker compose up -d` počká,
kým je databáza pripravená, a až potom spustí web. Skripty sa spustia iba vtedy,
keď je zväzok s dátami databázy prázdny. Na obnovenie ukážkových dát, po zmene
skriptov alebo ak databáza vznikla bez nich (napr. zo staršej verzie
repozitára), treba zväzok zmazať a databázu spustiť znova:

```bash
docker compose down -v
docker compose up -d
```

Databázu si možno prezrieť v Admineri na <http://127.0.0.1:8080/> (server `db`,
používateľ, heslo a databáza podľa `docker/.env`).

### Zabudovaný server PHP

Potrebné je PHP 8.3. V koreni projektu:

```bash
php -S localhost:8000 -t public
```

a v prehliadači <http://localhost:8000/>. Databáza beží iba v Dockeri pod menom
servera `db`, preto stránky *Pochôdzky* a *Ulice pochôdzky* takto nefungujú;
ostatné stránky áno.

### Stránky

| Stránka | Adresa |
|---|---|
| Registrácia | `/?c=auth&a=register` |
| Prihlásenie | `/?c=auth&a=login` |
| Pochôdzky | `/?c=walk` |
| Premenovanie pochôdzky (dočasné do integrácie JS) | `/?c=walk&a=edit&id=1` | 
| Ulice pochôdzky | `/?c=walk&a=show&id=1` |
| Editor ulice | `/?c=street&a=edit&id=1` |
| Poradia ulice | `/?c=sequence&streetId=1` |
| Zaraďovanie | `/?c=sequence&a=sort&id=2` |
| Poradie | `/?c=sequence&a=show&id=2` |
| Prenos | `/?c=transfer` |
| Náhľad importu | `/?c=transfer&a=preview` |