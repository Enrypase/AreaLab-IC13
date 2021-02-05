# Descrizione progetto architetturale di gestione corsi di sicurezza, primo soccorso e antincendio <br>

Il progetto è volto a risolvere e semplificare la gestione dei corsi di sicurezza, primo soccorso
e antincendio o tutti quei corsi di aggiornamento e formazione del personale lavoratore.<br>
Il progetto basa le sue funzionalità sull'esistenza di un database posto nella rete locale
del contesto lavorativo e su un'applicazione web.
Il database verrà creato dagli sviluppatori, con la possibilità di installarlo partendo da uno stato
della situazione di gestione già avanzato.
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
Una volta eseguito l'accesso, l'utente [GESTORE](#GESTORE) visualizzerà una pagina [HOME PAGE](#HOME-PAGE).<br>
Dalla Home Page si visualizzeranno delle frasi prioritarie e o urgenti. Dalla Home Page, inoltre, si potranno scegliere
i quattro comandi principali per la gestione del sistema: 
[AGGIORNAMENTO CORSI](#AGGIORNAMENTO-CORSI) <br>
[AGGIORNAMENTO ANAGRAFICA](#AGGIORNAMENTO-ANAGRAFICA) <br>
[CONSULTAZIONE](#CONSULTAZIONE) <br>
[Ottieni backup](#Ottieni-backup) <br>

<hr>

## LOGIN<br>
Il login, neccesario, consente l'accesso all'interno dell'applicazione.<br>
Utente e password per l'accesso sono memorizzate in una tabella apposita chiave-valore, modificabile solamente 
da root.

<hr>

## GESTORE<br>
:warning: Il gestore è colui che accede, aggiorna o revisiona la situazione dei corsi di sicurezza,
primo soccorso, anticendio, ecc. svolti o meno dai lavoratori.<br>
Il gestore può modificare, eliminare, aggiungere i record direttamente tramite applicazione.
:clipboard: Il gestore sarà in grado di inserire i dati in modo semplice.

<hr>

## AGGIORNAMENTO CORSI <br>
Cliccando sul relativo bottone si aprirà un'ulteriore pagina nella quale saranno visualizzati i diversi corsi.
Cliccando sul relativo corso si visualizzeranno tutti i lavoratori presenti nel sistema; i partecipanti saranno 
evidenziati opportunamente.
Sarà possibile modificare la partecipazione dei lavoratori, le ore di presenza e le ore mancanti.

<hr>

## AGGIORNAMENTO ANAGRAFICA <br>
Cliccando sul relativo bottone si aprirà un'ulteriore pagina nella quale saranno visualizzati i dati anagrafici
dei lavoratori: nome, cognome, codice fiscale. Sarà possibile modificare opportunamente i dati anagrafici dei lavoratori,
aggiungendone quando necessario.

<hr>

## CONSULTAZIONE <br>
Cliccando sul relativo bottone si aprirà un'ulteriore pagina nella quale sarà possibile ordinare una tabella per 
persona, per corso o per ricerca selettiva tramite l'inserimento di una o più parole chiave.

<hr>

## OTTIENI BACKUP <br>
Cliccando sul relativo bottone si otterrà un file di backup del database .sql.

<hr>
