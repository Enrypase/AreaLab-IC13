# Architettura

## :clipboard: Descrizione
Per sviluppare questa applicazione, la quale descrizione è presente [qui](DescrizioneProgetto.md), sono presenti più possibilità. <br>
Quella pensata dal nostro gruppo adotta due aspetti principali: un database dove salvare tutti i dati, e un web server ospitante il sito.
I linguaggi di programmazione utilizzati sono java a livello back-end e css per il front-end. <br>
L'utilizzo del server web è stato pensato per poter accedere all'applicazione da più dispositivi contemporaneamente senza necessariamente dover installare l'applicazione su ognuno di essi ma, solamente, sulla macchina che svolgerà la funzione del server.

## :gear: Features
Nel progetto sono richieste le seguenti features:
- Meccanismo di autenticazione: per eseguire l'accesso al programma;
- Connessione a un database: Dal quale il programma seleziona o inserisce dei particolari dati;
- Meccanismo di log: in modo tale da tenere traccia delle attività degli utenti;

## :busts_in_silhouette: Entità
- Scuole: Ogni scuola è un'entità essendo che il programma e pensato per soddisfare le esigenze di più scuole; (personalizzabile nelle impostazioni?);
- Plessi: Ogni scuola è composta da uno (ex. Marconi) o più plessi (ex: IT13);
- Professori: Persona che lavora in un determinato plesso (molti a molti oppure uno a molti??);
- Corso: Seguito da un professore (trovare tutte le variabili che potrebbe contenere!);

## :book: Tabelle
- Scuole: IDScuola, denominazioneScuola
- Plessi: IDScuola, IDPlesso, denominazionePlesso, indirizzoPlesso
- Lavori: IDScuola, IDProfessore
- Professori: IDProfessore, nome, cognome, dataNascita
- Corso: IDProfessore, tipologia, durata, dataCorso, note

## :pushpin: Nello specifico
- Per quanto riguarda il database si prevede l'utilizzo di MySql, software reperibile gratuitamente.
- Per quanto riguarda il lato backend verranno utilizzate servlet, (JSP?).
- Per il lato frontend, invece, html e css. (ReactJS?)
