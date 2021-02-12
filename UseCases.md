
## **CASI D'USO**<br>
In questo documento seguira la descrizione relativa ai possibili usi da parte di un utente dell'applicazione.
L'applicazione si occupa della gestione di tutti gli eventi riguardanti la formazione di docenti di varie scuole.
L'applicazione è di tipo User-friendly, quindi si presenta all'utente con una [grafica](Grafica.md), che permette l'interazione in modo semplice e dinamico, adatta appunto alle esigenze del consumatore.


## **UTENTE**:bust_in_silhouette: :closed_lock_with_key:<br>
L'utente tramite login si identifica e accede all'applicazione, in caso di login errato, l'accesso non sara consentito ed apparira un messaggio di errore, questa oerazion risulta essere necessaria in quanto i dati trattati sono personali e per politiche di privcy non possono essere diffusi.
`Login errato, riprova`

Il fruitore che interagisce è un dirigente scolastico, ed ha la visibilità completa dei dati relativa alla propri scuola.
il dirigente scolastico potra cosi visionare, e controllare i vari dipendenti e il loro stato in funzione dei corsi (svolti, da rinnovare a breve...).

## ***FUNZIONALITA'*** :mag:<br>
All'avvio dell'applicazione sara visibile la pagina di login, dove bisogna eseguire l'operazioe di login, l'utente dovra inserire `user name:       ` e `password:    ` nei riquadri appositi, se questi risulteranno essere corretti, e non si verifichera nessun messaggio di errore allora si avra accesso alla Home page.<br>
L'home pagina è strutturata cosi, nell'hader della pagina son visibili diversi messagi prioritari che servono per visualizzare eventuali dipendenti (docenti/collaboratori) scolastici che raggruppati per tipologia di corso, che devono a breve rinnovare la presenza.<br>
Nel body della pagina sono presenti dei bottoni `AGGIORNA CORSI` `CONSULTA` `AGGIORNA ANAGRAFICA`<br>
In basso alla pagina c'è un bottone centrale `OTTIENI BACKUP` .<br>

**Le diverse operazioni, che l'utente può svolgere durante l'utilizzo della applicazione sono principalmente:**<br>
:small_orange_diamond:[CONSULTAZIONE](#**CONSULTAZIONE**):book:<br>
:small_orange_diamond:[AGGIORNAMENTO ANAGRAFICO](#**AGGIORNAMENTO-ANAGRAFICO**) :calendar:<br>
:small_orange_diamond:[AGGIORNAMENTO CORSI](#**AGGIORNAMENTO-CORSI**):arrows_clockwise:<br>
:small_orange_diamond:[OTTIENI FOGLI FIRMA](#**OTTIENI-FOGLI-FIRMA**):page_facing_up:<br>
:small_orange_diamond:[BACKUP](#**BACKUP**):floppy_disk:<br>

## **CONSULTAZIONE**:book:
La consultazione in modo immediato avviene tramite i messaggi prioritari posizionati nella fascia superiore dell'applicazione.
L'operazione di consultazione dei dati, viene eseguita in modo approfondito qundo si schiaccia sull'apposito bottone `CONSULTA`, ciò che apparirà saranno diversi bottoni
`ORDINA PER PERSONA` `ORDINA PER CORSO` `CERCA`.<br>
* `ORDINA PER PERSONA` bottone con cui in base al cognomi del personale, messi in ordine alfabetico, si visualizzano le tabelle dei corsi persenti.<br>
* `ORDINA PER CORSO` bottone con cui in base al nome dei corsi, messi in ordine alfabetico, si visualizzano le tabelle dei corsi persenti. <br>
* `CERCA` tramite questo bottone si pùo eseguire la ricerca nelle tabelle sottostanti precedentemente caricate, (avendo cliccato sui pulsanti superiori), e ordinate in base a corso o personale. <br>

## **AGGIORNAMENTO ANAGRAFICA**:calendar: 
la funzionalità aggiornamento anagrafico permette all'utente di aggiungere o modificare i dati anagrafici tramite l'applicazione.<br>
Per aggiornare l'anagrafica all'utente non bastera far altro che cliccare sul pulsante apposito `AGGIORNAMENTO ANAGRAFICA`, si carichera nella page i pulsanti `AGGIUNGI PERSONA` `MODIFICA PERSONA` ed una tabella con i reltivi dati anagrafii del personale.<br>
* `AGGIUNGI PERSONA` permette l'inserimento dei dati di un persona che lavorerà nell istituto. <br>
* `MODIFICA PERSONA` modifica dello stato della persona, ovvero in caso di periodi di aspettativa, cambio scuola... <br>

## **AGGIORNAMENTO CORSI**:arrows_clockwise:
Dopo aver cliccato sul pulsante `AGGIORNAMENTO CORSI` Nella paggina dove sono presenti i bottoni;`AGGIUNGI CORSO` `RIMUOVI CORSO` `MODIFICA CORSO` ed una tabella con i reltivi dati dei corsi, nome e descrizione e codice identificativo.<br>
* `AGGIUNGI CORSO` l'azione che consente di svolgere questo bottone è creare un nuovo corso che verra aggiunto agli altri. <br>
* `MODIFICA CORSO` la modifica del corso fa si che l'utente possa cambiare la descrizione, l'id associato e il nome; ed in caso uno dei corsi sia ritenuto obsoleto viene disabilitato. <br>
* `RICERCA CORSO` bottone con cui nella tabella dei corsi è possibbile effettuare la rcerca di uno specifico corso, in base al nome o all'id. <br>
* `VISUALIZZA CORSI` bottone che permette di visualizzare tutti i corsi persenti aggiornati all'ultima modifica effettuata.<br>

## **OTTIENI FOGLI FIRMA**:page_facing_up:
Questo pulsante permette al gestore di ottenere uno o più fogli di carta fisici stampati formati da un titolo "nome del corso" e 
da una tabella composta dalle informazioni del personale, il codice del corso e lo spazio nel quale apporre la firma di presenza.
Dopo aver cliccato sul pulsante `OTTIENI FOGLI FIRMA` si chiederà di inserire il nome del corso. Una volta inserito il nome del corso
si otterrà una schermata stampabile formata da: 
* titolo del corso
* tabella con: 
    - nome della persona;
    - cognome della persona;
    - codice del corso;
    - spazio per la firma.

## **BACKUP**:floppy_disk:
Il pulsante di backup consente appunto di eseguire l'opreazione di backup, ovvero di ottenere una copia in un file sql dei dati relativi al database, che verrà salvata dove l'utente preferira.<br>
Ad esempio importazione su chiavetta in un file sql le informazioni personale.
<br>


----------------------------------------------------------------------------------
* visualizzare eventuali dipendenti (docenti/collaboratori) scolastici che devono a breve rinnovare la presenza a corsi
* corsi correlati allo stato del personale 
* inserimento di un docente
* rimozione di un docente
* aggiornamenti
* modifica
* informazione
* background
* importare le informazioni personale

garantisce la sorveglianza per quanto riguarda gli insegnanti ed  i corsi da essi svolti (formazione base/specifica).
