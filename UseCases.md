 

## **CASI D'USO**<br> 

In questo documento seguirà la descrizione relativa ai possibili usi da parte di un utente dell'applicazione. 
L'applicazione si occupa della gestione di tutti gli eventi riguardanti la formazione di docenti di varie scuole. 
L'applicazione è di tipo User-friendly, quindi si presenta all'utente con una [grafica](Grafica.md), che permette l'interazione in modo semplice e dinamico, adatta appunto alle esigenze del consumatore. 

  

## **UTENTE**:bust_in_silhouette: :closed_lock_with_key:<br> 

L'utente tramite login si identifica e accede all'applicazione, in caso di login errato, l'accesso non sarà consentito ed apparirà un messaggio di errore, questa operazione risulta essere necessaria in quanto i dati trattati sono personali e per politiche di privacy non possono essere diffusi. 
`Login errato, riprova` 

 
Il fruitore o gestore che interagisce è chiunque sia in possesso di utente e password per il Login ed ha la visibilità completa dei dati relativa alla propri scuola. 
L'utente potrà così visionare, e controllare i vari dipendenti e il loro stato in funzione dei corsi (svolti, da rinnovare a breve...). 

  

## *FUNZIONALITA'* :mag:<br> 

All'avvio dell'applicazione sarà visibile la pagina di login, dove bisogna eseguire l'operazione di login, l'utente dovrà inserire `user name:       ` e `password:    ` nei riquadri appositi, se questi risulteranno essere corretti, e non si verificherà nessun messaggio di errore allora si avrà accesso alla Home page.<br> 
L'home pagina è strutturata cosi, nell'header della pagina son visibili diversi messaggi prioritari che servono per visualizzare eventuali dipendenti (docenti/collaboratori) scolastici che raggruppati per tipologia di corso, che devono a breve rinnovare la presenza.<br> 
Nel body della pagina sono presenti dei bottoni `AGGIORNA CORSI` `CONSULTA` `AGGIORNA ANAGRAFICA`<br> 
In basso alla pagina c'è un bottone centrale `OTTIENI BACKUP` .<br> 

  

**Le diverse operazioni, che l'utente può svolgere durante l'utilizzo della applicazione sono principalmente:**<br> 

[:small_orange_diamond:CONSULTAZIONE:book:](#CONSULTAZIONE-:book:)<br> 
[:small_orange_diamond:AGGIORNAMENTO ANAGRAFICO :calendar:](#AGGIORNAMENTO-ANAGRAFICO) <br> 
[:small_orange_diamond:AGGIORNAMENTO CORSI:arrows_clockwise:](#AGGIORNAMENTO-CORSI)<br> 
[:small_orange_diamond: OTTIENI FOGLO FIRMA :page_facing_up::fountain_pen:](#OTTIENI-FOGLI-FIRMA)<br> 
[:small_orange_diamond: BACKUP:floppy_disk:](#BACKUP)<br> 


  

## CONSULTAZIONE 
La consultazione in modo immediato avviene tramite i messaggi prioritari posizionati nella fascia superiore dell'applicazione. 
L'operazione di consultazione dei dati, viene eseguita in modo approfondito quando si schiaccia sull'apposito bottone `CONSULTA`, ciò che apparirà saranno diversi bottoni 
`ORDINA PER PERSONA` `ORDINA PER CORSO` `CERCA`.<br> 
* `ORDINA PER PERSONA` bottone con cui in base al cognome del personale, messi in ordine alfabetico, si visualizzano le tabelle dei corsi presenti.<br> 
* `ORDINA PER CORSO` bottone con cui in base al nome dei corsi, messi in ordine alfabetico, si visualizzano le tabelle dei corsi presenti. <br> 
* `CERCA` tramite questo bottone si può eseguire la ricerca nelle tabelle sottostanti precedentemente caricate, (avendo cliccato sui pulsanti superiori), e ordinate in base a corso o personale. <br> 

  

## AGGIORNAMENTO ANAGRAFICA 
:calendar:  

la funzionalità aggiornamento anagrafico permette all'utente di aggiungere o modificare i dati anagrafici tramite l'applicazione.<br> 
Per aggiornare l'anagrafica all'utente non basterà far altro che cliccare sul pulsante apposito `AGGIORNAMENTO ANAGRAFICA`, si caricherà nella page i pulsanti `AGGIUNGI PERSONA` `MODIFICA PERSONA` ed una tabella con i relativi dati anagrafici del personale.<br> 
* `AGGIUNGI PERSONA` permette l'inserimento dei dati di una persona che lavorerà nell'istituto. <br> 
* `MODIFICA PERSONA` modifica dello stato della persona, ovvero in caso di periodi di aspettativa, cambio scuola... <br> 

  

## AGGIORNAMENTO CORSI 
:arrows_clockwise: 

Dopo aver cliccato sul pulsante `AGGIORNAMENTO CORSI` Nella pagina dove sono presenti i bottoni;`AGGIUNGI CORSO` `RICERCA CORSO` `MODIFICA CORSO` `VISUALIZZA CORSI` ed una tabella con i relativi dati dei corsi, nome e descrizione e codice identificativo.<br> 
* `AGGIUNGI CORSO` l'azione che consente di svolgere questo bottone è creare un nuovo corso che verrà aggiunto agli altri. <br> 
* `MODIFICA CORSO` la modifica del corso fa si che l'utente possa cambiare la descrizione, l'id associato e il nome; ed in caso uno dei corsi sia ritenuto obsoleto viene disabilitato. <br> 
* `RICERCA CORSO` bottone con cui nella tabella dei corsi è possibile effettuare la ricerca di uno specifico corso, in base al nome o all'id. <br> 
* `VISUALIZZA CORSI` bottone che permette di visualizzare tutti i corsi presenti aggiornati all'ultima modifica effettuata.<br> 

  

## OTTIENI FOGLI FIRMA 

Questo pulsante permette al gestore di ottenere la stampa su carta di uno o più fogli per le firme relative ad un determinato corso, specificato precedentemente dall'utente, nel momento in cui 'applicazione lo chiederà.<br>  I fogli sono costituiti da un titolo "nome del corso" e da una tabella dove sono presenti alcune informazioni del personale, il codice del corso e lo spazio nel quale apporre la firma di presenza.<br> 
Dopo aver cliccato sul pulsante `OTTIENI FOGLI FIRMA` verrà chiesto di inserire il nome del corso. Una volta inserito il nome del corso ciò che si otterrà sarà una schermata stampabile formata da: 


                                                   titolo del corso 

               nome della persona  |  cognome della persona   |  codice del corso  |  spazio per la firma  <br> 
               



Prima intestazione | Seconda intestazione
------------ | -------------
Contenuta della cella 1 | Contenuta della cellal 2
Contenuto prima colonna | Contenuto seconda colonna




Ad esempio:<br> 

                                                   Corso antincendio
                                                   
                Mario            |   Rossi                   |     1234             |    __________________  <br> 

I fogli firma vengono utilizzati solitamente quando durante lo svolgimento di un corso, c'è bisogna di registrare la presenze dei dipendenti. 

## BACKUP 

Il pulsante di backup consente appunto di eseguire l'operazione di backup, ovvero di ottenere una copia in un file sql dei dati relativi al database, che verrà salvata dove l'utente preferirà.<br> 
Ad esempio importazione su chiavetta in un file sql le informazioni personale. 
<br> 

 

 
