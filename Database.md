# STRUTTURA DEL DATABASE

La struttura del database prevederà 4 tabelle:
* [PERSONALE](#PERSONALE)
* [CORSI](#CORSI)
* [FREQUENTAZIONI](#FREQUENTAZIONI)
* [UTENTI](#UTENTI)

![ ](https://github.com/Enrypase/AreaLab/blob/main/Immagini/Database/db.JPG)

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

<br>
<hr>
<br>

# PRIVILEGI UTENTI
Gli utenti gestori del sistema disporranno **SOLAMENTE** dei seguenti privilegi:
* DELETE (cancellare record)
* INSERT (inserire record)
* SELECT (selezionare record)
* UPDATE (aggiornare record)

