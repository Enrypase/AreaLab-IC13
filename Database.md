# STRUTTURA DEL DATABASE

La struttura del database prevederà 4 tabelle:
* [PERSONALE](#PERSONALE)
* [CORSI](#CORSI)
* [FREQUENTAZIONI](#FREQUENTAZIONI)
* [UTENTI](#UTENTI)
* [LOG](#LOG)

![ ](https://github.com/Enrypase/AreaLab/blob/main/Immagini/Database/Database.JPG)

## PERSONALE
Questa tabella conterrà le informazioni sul personale lavoratore.
E' composto da: CodFiscPersona text PK,nomePersona text, cognmePersona text, ruoloPersona text, dataNascitaPersona text, servizio text, mailPersona text.

## CORSI
Questa tabella conterrà le informazioni relative ai corsi.
E' composto da: idCorso text PK, nomeCorso text PK, descrizioneCorso text, durataOreCorso text.


## FREQUENTAZIONI
Questa tabella conterrà le informazioni sulle frequentazioni del personale nei relativi
corsi. Ogni lavoratore potrà essere collegato a più corsi.
E' composto da: idCorso text PK e Foreing Key, CodFiscPersona text PK e Foreing Key, data text PK, oreEffettuate text.

## UTENTI
Questa tabella conterrà le informazioni di accesso o recupero degli utenti gestori
del sistema.
E' composto da: username text PK, password text , mailUtenti text.


## LOG
Questa tabella conterrà le informazioni dei log degli utenti. Ogni volta che l'utente effettuerà l'accesso,
sarà memorizzato su questa tabella il relativo username, la data e l'ora dell'accesso e le azioni che ha svolto.
E' composto da: username text PK, dataOra text , azioni text.

<br>
<hr>
<br>

# PRIVILEGI UTENTI
Gli utenti gestori del sistema disporranno **SOLAMENTE** dei seguenti privilegi:
* DELETE (cancellare record)
* INSERT (inserire record)
* SELECT (selezionare record)
* UPDATE (aggiornare record)
