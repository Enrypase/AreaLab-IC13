# Descrizione progetto architetturale di gestione corsi di sicurezza, primo soccorso e antincendio <br>

Il progetto è volto a risolvere e semplificare la gestione dei corsi di sicurezza, primo soccorso
e antincendio o tutti quei corsi di aggiornamento e formazione del personale lavoratore.<br>
Il progetto basa le sue funzionalità sull'esistenza di un database posto nella rete locale
del contesto lavorativo.
Il database verrà creato dagli sviluppatori e potrà anche essere aggiornato da un file CSV.
<br>
:point_right:[Architettura](https://github.com/Enrypase/AreaLab/blob/main/Architettura.md)
<br>
<br>
:warning: L'installazione di software e componenti aggiuntivi è a carico degli sviluppatori tramite
intervento diretto sul luogo d'installazione o tramite un file dettagliato per l'installazione 
corretta, sicura e semplice di tutto il necessario.<br>
:point_right:[File d'installazione](https://github.com/Enrypase/AreaLab/blob/main/Installazione.md)
<br>
<br>
Al momento dell'esecuzione dell'applicazione verrà richiesto il [LOGIN](#LOGIN) tramite username e password.<br>
Una volta eseguito l'accesso, l'utente [GESTORE](#GESTORE) visualizzerà una pagina dove saranno evidenziati i messaggi prioritari e due bottoni
che permetteranno di svolgere l'aggiornamento dei dati tramite due procedimenti diversi:
* tramite [FOGLIO CSV](#FOGLIO-CVS) e relativo backup periodico nel database 
* tramite l'[APPLICAZIONE](#APPLICAZIONE) diretta. 

## LOGIN<br>
Il login, neccesario, consente l'accesso all'interno dell'applicazione.<br>
Utente e password per l'accesso sono memorizzate in una tabella apposita chiave-valore, modificabile solamente 
da root.<br>
Una volta svolto l'accesso saranno visibili dei messaggi che evidenzieranno le 
informazioni prioritare come:<br>
* "Il lavoratore X deve svolgere il corso Z entro il dd-mm-YYYY"
* "Il tempo di aggiornamento per il corso Z del lavoratore X è scaduto"
* ecc...

## GESTORE<br>
:warning: Il gestore è colui che accede, aggiorna o revisiona la situazione dei corsi di sicurezza,
primo soccorso, anticendio, ecc. svolti o meno dai lavoratori.<br>
Il gestore può modificare, eliminare, aggiungere i record direttamente tramite applicazione o tramite
foglio CSV.
:clipboard: Il gestore sarà in grado di inserire i dati in modo semplice. 

## FOGLIO CSV<br>
Se l'aggiornamento dei dati viene svolto tramite foglio CSV sarà allora neccessario aggiornare periodicamente il database.
L'operazione di aggiornamento del database potrà essere 

## APPLICAZIONE<br>

