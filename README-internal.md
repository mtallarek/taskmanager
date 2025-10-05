# Design Entscheidungen

Hier einige Begründungen warum Dinge umgesetzt wurden wie sie nun eben sind.

## Auth per Laravel Sanctum
Das ist inzwischen der de facto Standard für Laravel und ich würde keine eigene Middleware mehr für die
Authentifizierung schreiben. Ansonsten habe ich möglichst vermeiden Librariers zu verwenden.

## Status
Status war nicht vorgegeben. Da in der Realität kaum ein Freitextfeld verwendet werden würde habe ich mich für ein
Status Model entschieden. Man würde irgendwann auch sicher mal darauf filtern wollen.

## Länge der Strings
Ich habe immer gerne maximale Längen für Strings wenn klar ist dass dort keine Romane stehen sollten. Dass das immer
Zweierpotenzen sind ist nur eine Marotte

## PATCH/PUT
Bei den APIs die ich kenne ist es üblich Patch oder Put zu verwenden, nicht beides. Ich habe mich hier für PUT
entschieden da ein Task nur 3 editierbare Felder hat; da ist es zumutbar die auch alle anzugeben.\
Das erlaubt auch sowohl das Anlegen als auch das Updaten in nur einer request Klasse abzuhandeln die sich in beiden
Fällen gleich verhällt. Ist hier einfach eine pragmatische Entscheidung.

