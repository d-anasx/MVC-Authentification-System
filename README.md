# SecureCore Authentication System

## 📋 Description
Système d'authentification multi-rôles basé sur une architecture MVC sans framework. Projet pédagogique pour comprendre les fondations d'une application web sécurisée et extensible.

---

## 🎯 Objectif
Créer un système d'authentification robuste et réutilisable avec architecture MVC propre, démontrant les avantages de la séparation des responsabilités par rapport au code procédural.

---

## 👥 Rôles

| Rôle | Permissions |
|------|-------------|
| 👤 **Candidat** | Inscription, Connexion, Espace personnel |
| 🛡️ **Admin** | Connexion, Dashboard admin, Gestion système |
| 🟣 **Company** | Connexion, Dashboard entreprise, Gestion offres |

> Chaque rôle possède ses propres routes, contrôleurs et vues isolées.

---

## ⚙️ Fonctionnalités

### 🔐 Authentification
- Inscription avec validation
- Connexion sécurisée
- Déconnexion
- Hashage mots de passe (bcrypt/argon2)
- Gestion sessions PHP

### 🔑 Gestion Rôles
- Attribution automatique lors inscription
- Redirection selon rôle après login
- Contrôle d'accès basé sur rôles (RBAC)
- Refus accès non autorisés

### 🚫 Protection Routes
**Publiques :** `/login`, `/register`  
**Protégées :** `/candidate/dashboard`, `/admin/dashboard`, `/company/dashboard`  
**Vérifications :** Utilisateur connecté + rôle autorisé

---

## 🏗️ Architecture

### Structure
```
securecore/
├── public/
│   └── index.php              # Point d'entrée unique
├── src/
│   ├── Controllers/           # Logique contrôle
│   ├── Models/                # Logique métier + BDD
│   ├── Views/                 # Affichage
│   └── Router/                # Routage
├── config/
│   └── database.php           # Config BDD
├── database/
│   └── schema.sql             # Structure BDD
└── README.md
```