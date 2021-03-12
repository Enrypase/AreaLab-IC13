# SYSTEM CALLS <br>
In questo file vengono specificate le http request e le http response che verranno effettuate dal programma in esecuzione grazie al protocollo http e alle richieste poste dall'utente gestore.

**HTTP REQUEST** :calling:<br>
[GET](#GET)<br> 
[POST](#POST)<br> 
[PUT](#PUT)<br> 
[DELETE](#DELETE)<br> 

**HTTP RESPONSE** :calling:<br>
[200](#RICHIESTA-PROCESSATA-CON-SUCCESSO)<br> 
[400](#RICHIESTA-MAL-EFFETTUATA)<br> 
[404](#LA-RICHIESTA-NON-HA-PORTATO-AD-ALCUN-RISULTATO)<br> 

## HTTP REQUEST :calling:

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
>body:
>
>     @id
>     altri attributi
> 

#### AGGIUNTA DI UN EVENTO
>     POST /eventi
>
>body:
>
>     @idEvento
>     altri attributi
>  

#### AGGIUNTA DI UN EVENTO AI DIPENDENTI
>     POST /eventi/@id/dipendenti
>
>body:
>
>     @id (dipendenti che hanno partecipato)
>     altri attributi
>     

### PUT
#### MODIFICARE DATI DI UN UTENTE
>     PUT /dipendenti/@id
>
>body:
>
>     attributi
>  

### DELETE
Questo servizio non viene implementato dal programma.
<hr>

## HTTP RESPONSE :calling:

### RICHIESTA PROCESSATA CON SUCCESSO
>     200 OK
>

### RICHIESTA MAL EFFETTUATA
>     400 BAD REQUEST
>

### LA RICHIESTA NON HA PORTATO AD ALCUN RISULTATO
>     404 NOT FOUND
>
