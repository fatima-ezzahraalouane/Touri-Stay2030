# ✨ TouriStay 2030 ✨

## 🌍 Contexte du Projet
TouriStay 2030 est une **plateforme innovante** qui facilite la location de maisons et d’appartements pour les touristes assistant au **Mondial 2030 "Morocco-Spain-Portugal"**. 

🎯 **Objectif** : Fournir une solution rapide, sécurisée et intuitive pour l'authentification, la gestion des annonces et la recherche d’hébergements.

---

## 👤 User Stories

- 🔑 **Utilisateur (propriétaire ou touriste)** : Inscription et authentification sécurisées.
- 👤 **Utilisateur** : Consultation et modification du profil.
- 🏡 **Propriétaire** : Publication d’annonces avec localisation, prix, équipements et disponibilités.
- 📂 **Propriétaire** : Modification ou suppression d’annonces.
- 📌 **Touriste** : Exploration des annonces avec **pagination dynamique** (4, 10, 25 annonces/page).
- 🔍 **Touriste** : Recherche avancée (ville, date de disponibilité).
- ⭐ **Touriste** : Ajout d’annonces en **favoris**.
- 🗑️ **Administrateur** : Suppression des annonces inappropriées.
- 📊 **Administrateur** : Accès aux **statistiques** (inscriptions, locations, annonces actives).

---

## 🚀 Fonctionnalités Techniques

✅ **Authentification sécurisée** avec Laravel Breeze (gestion des rôles : Admin, Tourist, Owner).  
✅ **CRUD complet** pour les annonces.  
✅ **Recherche avancée** avec filtres par ville et date de disponibilité.  
✅ **Gestion des profils utilisateurs**.  
✅ **Interface responsive & moderne** avec Blade et Tailwind CSS.  
✅ **Favoris** pour sauvegarder des annonces préférées.  
✅ **Modération avancée** pour l’administrateur.  
✅ **Statistiques dynamiques** sur les inscriptions et annonces.  

---

## 🛠️ Technologies Utilisées

- ⚡ **Back-end** : Laravel (PHP, Blade)
- 🎨 **Front-end** : Blade + Tailwind CSS
- 🗄️ **Base de données** : PostgreSQL
- 🔐 **Authentification** : Laravel Breeze
- 📂 **Gestion des migrations** : Laravel Migrations

---

## 📌 Diagrammes UML

Le projet inclut **deux diagrammes UML** pour une meilleure compréhension de l’architecture :
1️⃣ **Diagramme de cas d’utilisation** – Représentation des interactions utilisateur.  
2️⃣ **Diagramme de classes** – Modélisation des entités et relations du projet.  

---

## 🛠️ Installation et Exécution du Projet

### 📋 Prérequis
🔹 PHP 8+  
🔹 Composer  
🔹 PostgreSQL  
🔹 Node.js & NPM  
🔹 Laravel 10+  

### ⚙️ Étapes d’installation

1️⃣ **Cloner le projet** :
   ```bash
   git clone https://github.com/votre-repo/touristay-2030.git
   cd touristay-2030
   ```
2️⃣ **Installer les dépendances Laravel** :
   ```bash
   composer install
   ```
3️⃣ **Configurer la base de données** :
   ```bash
   cp .env.example .env
   ```
4️⃣ **Générer la clé d’application** :
   ```bash
   php artisan key:generate
   ```
5️⃣ **Exécuter les migrations et les seeders** :
   ```bash
   php artisan migrate --seed
   ```
6️⃣ **Lancer le serveur local** :
   ```bash
   php artisan serve
   ```
7️⃣ **Compiler les assets front-end** :
   ```bash
   npm install && npm run dev
   ```

---

## 🤝 Contribution
Les contributions sont **les bienvenues** ! Pour contribuer :
1️⃣ **Forker le projet**  
2️⃣ **Créer une branche** : `git checkout -b feature-nouvelle-fonctionnalite`  
3️⃣ **Committer vos modifications** : `git commit -m "Ajout de la nouvelle fonctionnalité"`  
4️⃣ **Pousser votre branche** : `git push origin feature-nouvelle-fonctionnalite`  
5️⃣ **Ouvrir une pull request** 🛠️  

---

## 📜 Licence
📝 Ce projet est sous licence **MIT**. Consultez le fichier `LICENSE` pour plus de détails.

🚀 **TouriStay 2030 – La plateforme idéale pour un séjour inoubliable au Mondial 2030 !** 🌍✨

