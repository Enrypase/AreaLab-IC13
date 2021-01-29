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
Il prodotto è garantito dagli sviluppatori nella sua versione portable. L'esecuzione dell'applicazione
avverrà inserendo una semplice chiavetta USB (o supporto esterno) all'interno di un computer connesso
in rete.<br>
Al momento dell'esecuzione dell'applicazione verrà creato in automatico nel supporto esterno un backup 
totale del database, che verrà, quindi, sovrascritto ad ogni esecuzione all'interno della chiavetta
USB e, simultaneamente, verrà creato o sovrascritto un file CSV con tutti i dati aggiornati direttamente
da database e che potrà essere utilizzato per inserire temporaneamente i dati.<br>

## LOGIN<br>
Il login, neccesario, consente l'accesso all'interno dell'applicazione.<br>
Utente e password per l'accesso sono memorizzate in una tabella apposita chiave-valore, modificabile solamente 
da root.
[GESTORE](#GESTORE)<br>
Una volta svolto l'accesso saranno visibili dei messaggi che evidenzieranno le 
informazioni prioritare come:<br>
* "Il lavoratore X deve svolgere il corso Z entro il dd-mm-YYYY"
* "Il tempo di aggiornamento per il corso Z del lavoratore X è scaduto"
* ecc...

## GESTORE<br>
:warning: Il gestore è colui che accede e accede, aggiorna o revisiona la situazione dei corsi di sicurezza,
primo soccorso, anticendio, ecc. svolti o meno dai lavoratori.<br>

:clipboard: Il gestore sarà in grado di inserire i dati semplicemente. Il gestore potrà scegliere un comando alla volta
tra tutti quelli presenti in base al comando scelto visualizzerà una schermata relativa. 
