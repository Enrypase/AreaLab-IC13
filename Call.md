# SYSTEM CALL <br>

## HTTP REQUEST

### GET
#### SELEZIONE CON RICERCA DALLA TABELLA DIPENDENTI
Si vuole ricercare un dipendente con ID specifico:<br>
>     GET /research.html/dipendenti/@id
>

#### SELEZIONE DEGLI EVENTI ASSOCIATI AD UN DIPENDENTE SPECIFICO
>     GET /research.html/dipendenti/@id/eventi
>

#### SELEZIONE DEGLI EVENTI
>     GET /research.html/eventi
>

### POST
#### AGGIUNTA DI UN DIPENDENTE
>     POST /dipendenti
>

#### AGGIUNTA DI UN EVENTO
>     POST /eventi
>

#### AGGIUNTA DI UN EVENTO AI DIPENDENTI
>     POST /eventi/@id/dipendenti
>body: 
>     @id (dipendenti che hanno partecipato)
>     altri attributi
>     

<hr>

## HTTP RESPONSE

### RICHIESTA PROCESSATA CON SUCCESSO
>     200 OK
>

### RICHIESTA EFFETTUATA MALE
>     400 BAD REQUEST
>

### LA RICHIESTA NON HA PORTATO AD ALCUN RISULTATO
>     404 NOT FOUND
>
