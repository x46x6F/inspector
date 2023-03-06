# ***1nspect0r***

**Table of contents :**
- [Team](#team)
- [MERISE :](#merise)
    - MCD
    - MLD

---
## **Team**

- [Florian Girault](https://gitlab.com/FLO-G)
- [Florian Manzone](https://gitlab.com/manzoneflorianpro)
- [Lisa Chalabi](https://gitlab.com/lisamina)

---
## **MERISE**

### *MCD :*
> Made with MoCoDo
```
acl: à_définir
:
:
:
:
:
:

associate, 00 acl, 00 roles
:
:
sites: adress
:
:
:

roles: name
:
:
belongs1, 11 campaigns, 1N sites
:
:
:

have1, 1N roles, 11 users
users: login, password
create, 0N users, 11 campaigns
campaigns: name, start_date, end_date, status
contains, 11 materials, 1N campaigns
types: name, domain
:

:
:
à_définir1, 00 campaigns, 00 audits
à_définir0, 00 materials, 00 audits
materials: creation_year, has_electro, status
have0, 0N types, 11 modeles
:

:
:
audits: à_definir
constitutes, 11 pieces, 1N materials
characterizes1, 11 materials, 1N modeles
modeles: name, date_mm, status, domain
compatible, 1N modeles, 1N modeles

:
:
à_définir, 00 pieces, 00 audits
pieces: creation_year, has_electro, status
characterizes0, 11 pieces, 1N modeles
belongs0, 1N constructors, 11 modeles
constructors: name
```
> **Pensez à écrire pourquoi on représente les données de cette manière !!**  

**Demander indicateurs pour les stats: 4. D-Analyse de résultats, la forme: décimal, voir calcul** 
 
**Access Control List (ACL)**  
**A voir: Gate & policies, spatie**

```
:
:
:
:
:
constructors: name
:

:
:
:
:
characterize0, 11 pieces, 1N modeles
belong0, 1N constructors, 11 modeles
types: name, domain

associate, 00 acl, 00 roles
roles: name
:
pieces: creation_year, has_electro, status
characterize1, 11 materials, 1N modeles
modeles: name, date_mm, status
have0, 1N types, 11 modeles

acl: à_définir
have1, 0N roles, 11 users
:
constitute, 11 pieces, 1N materials
materials: creation_year, status
compatible, 1N modeles, 1N modeles
:

:
users: login, password
participate, 0N users, 11 campaigns
sites: adress
belong, 11 materials, 1N sites
:
:

:
create, 0N users, 11 campaigns
campaigns: name, start_date, end_date, status
audit, 1N sites, 11 campaigns
:
:
:
```

![MCD 1nspect0r](MERISE/1nspect0rMCD.png)


### *MLD :*
> Made with QuickDatabaseDiagrams

```
MLD HERE
```