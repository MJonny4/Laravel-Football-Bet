El professor de M07, necessita un sobre sou que el vol aconseguir a través de premis a les quinieles.
Us demana que implementeu una web on els internautes puguin opinar sobre els resultats dels partits, tot
valorant en 1, X o 2 cada un dels partits d’una determinada jornada.

# Un usuari per poder indicar la seva opinió haurà de estar prèviament registrat i haurà obligatòriament de
completar tots els partits de la jornada introduïda.

# Diferenciarem 3 rols:
- Administrador, que serà únic.
  La principal funcionalitat serà el de definir els partits de la jornada. Les jornades tenen números consecutius i
  cada una consta de 15 partits, caldrà que l&#39;administrador pugi un XML o un JSON amb un nombre variable de
  jornades però amb la totalitat dels partits de la jornades introduïts. No acceptarem cap jornada que tingui més
  o menys de 15 partits correctament definits, això vol dir amb un enfrontament entre dos equips.
  Seria interessant que l’administrador podés veure les jornades introduïdes. En el cas d’introduir una jornada
  prèviament introduïda, procediu com vulgueu (via error o update)

# Usuari de sistema.
Els usuaris de sistema es podran registrar a través de correu. Post login podran localitzar una jornada i per
cadascun dels partits indicar els resultats 1 (si juga a casa) x (empat) 2 (juga fora)
Si accedeixen a una jornada que ja havien valorat els resultats seran visualitzables i editables.

# Perfil públic
Els usuaris no registrats podran localitzar una jornada i per cada partit observaran el nombre de vots que cada
resultat (partit) ha obtingut segons apostes.

# Consideracions:
- Definiu un o varis layouts per realitzar l&#39;aplicació
- Creeu les taules de la base de dades a través de migrate i l&#39;administrador (de credencials admin:admin)
amb el corresponen seed)
- Comproveu l’existència de login amb un middleware
- Confirmeu l&#39;autoregistre a través de mail.
- Els usuaris públics han de poder exportar els resultats d&#39;una jornada a pdf.

# users => nom, email, password, rol, actiu, token
# equips = id, nom_equip
# jornada => id, numero
# partits = id, id_jornada, equip_local, equip_visitant
# apostes => id, id_usuari, id_partit, resultat (1, X, 2)

php artisan db:seed
