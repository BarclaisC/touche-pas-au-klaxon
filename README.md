# 🚗 Touche pas au klaxon  
Application web 

## 📌 Présentation du projet
“Touche pas au klaxon” est une application web .  
Elle permet de gérer des **agences**, des **trajets**, ainsi que l’authentification des utilisateurs via une architecture **MVC** 

L’objectif du projet est de mettre en œuvre :
- une architecture MVC fonctionnelle,
- une base de données relationnelle cohérente,
- un routage simple,
- une interface utilisateur claire,
- une gestion sécurisée des sessions.

---

## 🏗️ Architecture du projet

touche-pas-au-klaxon/
│
├── App/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
│
├── Config/
│   └── config.php
│
├── Core/
│   ├── Controller.php
│   ├── Model.php
│   └── Router.php
│
├── public/
│   ├── css/
│   ├── js/
│   ├── assets/
│   ├── index.php
│   └── login.php
│
├── sql/
│   ├── create_database.sql
│   └── insert_data.sql
│
├── Test/
│
├── Vendor/
│
├── composer.json
└── README.md

---

## 🗄️ Base de données

La base de données est fournie dans le dossier `/sql/` :

- **create_database.sql** → création des tables  
- **insert_data.sql** → insertion des données de test

### Tables principales :
- `agence`
- `trajet`
- `utilisateur` (si présent)
- relations via clés étrangères

---

## 🚀 Installation

### 1. Cloner le projet
```bash
git clone https://github.com/BarclaisC/touche-pas-au-klaxon.git


2. PROJET DANS MON SERVEUR LOCAL
C:\xampp\htdocs\touche-pas-au-klaxon

3. Importer la base de données
Dans phpMyAdmin :
- Créer une base touche_pas_au_klaxon
- Importer create_database.sql
- Importer insert_data.sql

4. Configurer la connexion
Dans Config/config.php :
define('DB_HOST', 'localhost');
define('DB_NAME', 'touche_pas_au_klaxon');
define('DB_USER', 'root');
define('DB_PASS', '');

🔐 Authentification
L’accès à l’espace administrateur se fait via public/login.php.
Les identifiants de test sont fournis dans insert_data.sql.

🧭 Fonctionnalités
✔️ Gestion des agences
- Ajouter une agence
- Modifier une agence
- Supprimer une agence
- Lister toutes les agences

✔️ Gestion des trajets
- Ajouter un trajet
- Modifier un trajet
- Supprimer un trajet
- Associer un trajet à une agence
✔️ Authentification
- Connexion
- Déconnexion
- Sécurisation des pages via sessions
✔️ Architecture MVC
- Séparation claire Model / View / Controller
- Router simple et efficace
- Modèles connectés à la base de données

🧪 Tests
Le dossier /Test/ contient des fichiers de test utilisés pendant la construction du projet.


👩‍💻 Auteur
Anael Barclais








