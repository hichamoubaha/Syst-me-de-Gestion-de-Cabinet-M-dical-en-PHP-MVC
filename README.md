# Gestion de Cabinet Médical - MVC

## Description du Projet
Ce projet est une application de gestion de cabinet médical développée en PHP en suivant l'architecture MVC (Modèle-Vue-Contrôleur). L'objectif est de fournir une plateforme organisée, lisible et maintenable, tout en facilitant l'intégration de futures fonctionnalités.

## Objectifs
- Développement selon le modèle MVC pour une meilleure organisation.
- Code lisible et maintenable en respectant les bonnes pratiques (SOLID, DRY, etc.).
- Préparation de la plateforme à intégrer de nouvelles fonctionnalités.

## Fonctionnalités

### 1. Structure MVC

#### **Modèle (Model)**
- Gestion des interactions avec la base de données (CRUD pour les patients, médecins et rendez-vous).
- Implémentation des relations entre entités (one-to-many, many-to-many).
- Utilisation de requêtes préparées pour éviter les injections SQL.

#### **Vue (View)**
- Création de templates réutilisables (header, footer, etc.).
- Design responsive.
- Validation côté client avec HTML5 et JavaScript natif.

#### **Contrôleur (Controller)**
- Gestion de la logique métier et des interactions entre les modèles et les vues.
- Validation des données côté serveur pour prévenir les attaques XSS et CSRF.
- Gestion des sessions utilisateurs et des autorisations d'accès.

### 2. Fonctionnalités Requises

#### **Front Office**
- Inscription et connexion des utilisateurs (patients et médecins).
- Prise de rendez-vous en ligne avec choix du médecin.
- Consultation de l'historique des consultations.

#### **Back Office**
- Gestion des utilisateurs.
- Gestion des rendez-vous (confirmation, annulation).
- Tableau de bord avec statistiques sur les patients et les consultations.

## Exigences Techniques
- **Base de données** : PostgreSQL.
- **Programmation** : Respect des principes OOP (encapsulation, héritage, etc.).
- **Sécurité** : Utilisation de sessions PHP pour la gestion des utilisateurs connectés.
- **Validation** : Côté serveur et client.

## Architecture Technique

- **Autoloading avec Composer** : Gestion efficace du chargement des classes.
- **Routing Dynamique** : Routeur personnalisé pour mapper les URLs vers les contrôleurs.
- **Configuration via .htaccess** : Redirection des requêtes vers un point d'entrée unique (`index.php`).
- **Séparation des Couches** : Distinction stricte entre modèles, vues et contrôleurs pour assurer la maintenabilité.

## Installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/hichamoubaha/Syst-me-de-Gestion-de-Cabinet-M-dical-en-PHP-MVC.git
   
   ```
2. **Installer les dépendances avec Composer** :
   ```bash
   composer install
   ```
3. **Configurer la base de données** :
   - Créer une base de données PostgreSQL.
   - Mettre à jour les informations de connexion dans le fichier de configuration.
4. **Lancer le serveur** :
   ```bash
   php -S localhost:8000 -t public
   ```

## Auteur
Développé par [hicham oubaha]
