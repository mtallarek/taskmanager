# Design Entscheidungen

## PATCH/PUT
Jetzt, wo ein Task auch mehrere Attribute hat die unabhängig voneinander editierbar sein könnten
(deadline, user Zuweisung), macht es sinn PATCH zu verwenden. Daher die bevorzugte methode geändert.

## Routen / Controller
Zum bearbeiten der deadline setze ich auf die allgmeine Patch Route des Tasks. Zum jetzigen Zeitpunkt ergibt sich mir
aus den Anforderungen keine Notwenigkeit dafür eine separate Route und Store Klasse einzurichten.

Bei den einzelnen Filtern (nach User, Projekt und Deadline) war ich mir nicht 100%ig sicher was
als technische Leistung erwartet wird. Daher habe ich hier 2 varianten implementiert. Für User und Projektfilter
relativ wortgetreu mit extra Routen und einmal mit Filterparametern auf der Index Methode, was flexibler ist
und was ich im realen Projekt favorisieren würde.

Je nach Größe des Projektes würde man auch die Routen über User und Projekte anbieten (/api/users/tasks und
/api/projects/tasks), aber da User und Projekte hier sonst keine Relevanz haben macht das nicht so viel Sinn
wenn man nicht auch andere API methoden dafür anbietet.

Das wäre für mich auch ein klassiches Thema für ein Teamgespräch. Wie designen wir die Routen? ist alles von beiden
Seiten zugänglich? Filtern über Parameter? Einzelne Parameter oder ein filter Parameter als array? Laravel Boardmittel
oder Library? (z.B. Laravel JSON:API)
