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

## CORSI
Questa tabella conterrà le informazioni relative ai corsi.

## FREQUENTAZIONI
Questa tabella conterrà le informazioni sulle frequentazioni del personale nei relativi
corsi. Ogni lavoratore potrà essere collegato a più corsi.

## UTENTI
Questa tabella conterrà le informazioni di accesso o recupero degli utenti gestori
del sistema.

## LOG
Questa tabella conterrà le informazioni dei log degli utenti. Ogni volta che l'utente che effettuerà l'accesso
sarà memorizzato su questa tabella il relativo username, la data e l'ora dell'accesso e le azioni che ha svolto.

<br>
<hr>
<br>

# PRIVILEGI UTENTI
Gli utenti gestori del sistema disporranno **SOLAMENTE** dei seguenti privilegi:
* DELETE (cancellare record)
* INSERT (inserire record)
* SELECT (selezionare record)
* UPDATE (aggiornare record)
