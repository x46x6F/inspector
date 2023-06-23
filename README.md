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
> Made with ***[MoCoDo](https://www.mocodo.net/)***

#### *Explication du MCD :*

```
:
:
belong1, 11 campaigns, 0N sites
sites: id, name, adress, adress_comp, zip_code, city, number
features0, 1N sites, 11 materials
:
types: id, name, domain

roles: id, name
audit0, 0N users, 11 campaigns
campaigns: id, name, status, start_date, end_date
concern0, 1N campaigns, 0N materials: description
materials: id, name, has_electro, status, description
characterize1, 11 materials, 1N models
have0, 11 models, 1N types

belong0, 0N roles, 11 users
users: id, name, email, password
create0, 0N users, 11 campaigns
audit1, 1N campaigns, 1N pieces: audit, presence, functional, month, usury, change, complement, recommended
compose0, 1N materials, 11 pieces
models: id, name, status
compatible0, 1N models, 1N models

:
:
:
:
pieces: id, name, has_electro, creation_year, status
characterize0, 11 pieces, 1N models
belong2, 11 models, 1N constructors

:
:
:
:
:
:
constructors: id, name
```

![MCD 1nspect0r](MERISE/1nspect0rMCD.png)


### *MLD :*
> Made with ***[DBDiagram](https://dbdiagram.io/d/)***

```
Table users {
  id int PK
  name varchar(255)
  email varchar(255)
  password varchar(255)
  role_id int
}

Table roles {
  id int PK
  name varchar(255)
}

Table campaigns {
  id int PK
  name varchar(255)
  status varchar(255)
  start_date date
  end_date date
  creator_id int
  auditor_id int
  site_id int
}

Table sites {
  id int PK
  name varchar(255)
  adress varchar(255)
  adress_comp varchar(255)
  zip_code int
  city varchar(255)
  number int
}

Table materials {
  id int PK
  name varchar(255)
  has_electro bool
  status bool
  description text
  model_id int
  site_id int
}

Table pieces {
  id int PK
  name varchar(255)
  has_electro bool
  status bool
  creation_year int
  model_id int
  material_id int
}

Table models {
  id int PK
  name varchar(255)
  status varchar(255)
  constructor_id int
  type_id int
}

Table constructors {
  id int PK
  name varchar(255)
}

Table types {
  id int PK
  name varchar(255)
  domain varchar(255)
}

Table campaigns_materials{
  material_id int PK
  campaign_id int PK
  description text
}

Table audit {
  piece_id int PK
  campaign_id int PK
  audit bool
  presence bool
  functional bool
  month int
  usury bool
  change bool
  complement bool
  recommended bool
}

Table csv_materials {
  id int PK
  constructor_id int
  model_id int
  type_id int
  site_id int
  piece_id int
  model_name varchar(255)
  creation_year int
  has_electro bool
  status bool
}

Table csv_pieces {
  id int PK
  constructor_id int
  model_id int
  type_id int
  model_name varchar(255)
  creation_year int
  has_electro bool
  status bool
}

Table compatible {
  model_id int PK
  compatible_id int PK
}

Ref: users.role_id > roles.id
Ref: campaigns.creator_id > users.id
Ref: campaigns.auditor_id > users.id
Ref: campaigns.site_id > sites.id
Ref: materials.site_id > sites.id
Ref: campaigns_materials.campaign_id > campaigns.id
Ref: campaigns_materials.material_id > materials.id
Ref: campaigns.id > audit.campaign_id
Ref: audit.piece_id > pieces.id
Ref: materials.id > pieces.material_id
Ref: models.id > materials.model_id
Ref: models.id > pieces.model_id
Ref: models.type_id > types.id
Ref: models.constructor_id > constructors.id
Ref: models.id > compatible.model_id
Ref: models.id > compatible.compatible_id
```

![MCD 1nspect0r](MERISE/1nspect0rMLD.png)