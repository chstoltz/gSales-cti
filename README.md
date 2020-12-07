# gSales-cti

Fügt einfache CTI Funktionen für gSales hinzu. Anrufer werden anhand der CLIP erkannt und der entsprechende Kunde im Browser aufgerufen. Bei unbekannten Anrufern gibt es die Möglichkeit den Neukundendialog aufzurufen um direkt Kundendaten aufnehmen zu können.

Geteste mit Mitel Dialer. Funktioniert aber mit jedem Tapi Treiber/Software, die eine URL aufrufen kann.

In den Einstellungen des Mitel Dialer unter Kundenbeziehung ein Event für eingehehnde, externe Anrufe mit folgendem Inhalt anlegen:

msedge.exe https://deinserver.de/pfad/cti.php?cid=%e164-number%

Für andere Anwendungen: Die Rufnummer muss im internationalen Format (+49...) übergeben werden.

In gSales Login Dialog einen Haken bei 'eingeloggt bleiben' setzen.
Unter Administration - API einen API Key erstellen.
