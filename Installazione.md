# INSTALLAZIONE GUIDATA <br>
[SQL-SERVER](#SQL-SERVER)<br> 
[XAMPP](#xampp-)<br> 
## SQL SERVER 
In questa guida seguiremo l’installazione SQL per la versione gratuita **SQL Server 2017 Express**.

Per iniziare dobbiamo scaricare il sorgente da questo link SQL  https://go.microsoft.com/fwlink/?linkid=853017.

Altermine del download eseguiamo il file SQLServer2017-SSEI-Expr.exe


![a](/Immagini/Installazione/1.jpg) <br>

Accettiamo le condizioni di licenza e confermiamo l’installazione nel percorso predefinito.

![a](/Immagini//Installazione/img2.gif) <br>

A questo punto il programma di installazione procederà a scaricare da internet tutti i file necessari e, alla fine del download, inizierà l'installazione vera e propria. 
La procedura durerà quindi parecchi minuti a seconda della velocità della linea internet e delle prestazioni del computer. <br>

![a](/Immagini//Installazione/img3.jpg) <br>

alla fine dell'installazione verrà mostrata questa finestra <br>

![a](/Immagini//Installazione/img4.jpg) <br>


alla fine dell'installazione verrà mostrata questa finestra <br>

Verifichiamo che il server sia funzionante facendo click sul pulsante Connetti. Se l'installazione è andata a buon fine si aprirà questa finestra che mostra la versione di SQL Server installata. <br>
 ![a](/Immagini//Installazione/img5.jpg) <br> </p>

 


## XAMPP <BR>
 
 Per l’ultima release di XAMPP utilizzare il link https://www.apachefriends.org/it/index.html <br>
 ![a](/Immagini//Installazione/xampp.PNG) <br>
 Una volta entrati nella pagina scarichiamo la versione interessata, quindi effettuiamo l’installazione.
Al momento dell’installazione è possibile selezionare solo i servizi necessari per usare meno spazio su disco, in particolare è essenziale installare
Apache, PHP, MYSQL (MariaDB). È inoltre molto utile installare anche phpMyAdmin. Una volta effettuata l’installazione, per accedere al pannello di controllo bisogna mandare in esecuzione l’applicazione xampp_control presente nella cartella di installazione (default C:\xampp).
 <br>
 ![a](/Immagini//Installazione/XAMPP1.PNG) <br>
 Una volta aperto xampp, premendo i pulsanti Start accanto ad Apache e MYSQL saranno attivati i
moduli relativi <br>
 ![a](/Immagini//Installazione/XAMPP2.PNG) <br>
 A questo punto XAMPP è attivo. Per utilizzarlo è necessario aprire un browser e digitare il link http://localhost/nome_fle, dove nome_fle è ilnome del fle che si vuole eseguire con l’estensione (.php o .html). <br>
 Tutti i documenti www e i fle PHP che si vogliono creare vanno inseriti nella cartella \xampp\htdocs. Quindi per ultimare l'installazione della nostra applicazione dovremmo spostare nella cartella \xampp\htdocs il file 
html (se il server Apache è in esecuzione)
 


