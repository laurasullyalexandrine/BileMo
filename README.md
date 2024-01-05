# API BileMo

BileMo est une API REST, développée en from scratch depuis le Framework Symfony version 6.4.

## DESCRIPTION DU PROJET

BileMo est une entreprise proposant une selection de téléphones mobiles premium.
Elle fonctionne sur modèle Business-to-Business (B2B).
Au lieu de vendre directement des produits sur le site web, l'entreprise fournit un accès à son catalogue via une Interface de Programmation d'Application (API) destinée à d'autres plates-formes. L'objectif principal est de servir exclusivement les clients professionnels.

## PRÉREQUIS

- PHP 8.2.4
- MySQL ou Mariadb
- Composer version 2.3.10
- Symfony CLI 5.6.1
- Symfony 6.3.6
- Extension OpenSSL

## INSTALLATION

1. Clôner le projet depuis mon compte gitHub sur votre disque dur.
2. Ouvrez le projet dans votre éditeur de texte.
3. Installer les dépendances Composer.```composer install```
4. Noter que le dossier vendor est généré automatiquement par composer.
5. Créer un copie du fichier .env et le renommer .env.local
6. Renseigner les informations de connexion à la base de données, de votre SGBDR depuis le fichier .env.local
   - ex : `DATABASE_URL="mysql://votre-identifiant:votre-mot-de-passe@127.0.0.1.3306/nom-de-la-bd-bileMo?serverVersion=mariadb-10.4"`
7. Créer la base de données : `symfony console doctrine:database:create`
8. Jouer la dernière migration : `symfony console doctrine:migrations:migrate`
9. Charger les fixtures : `symfony console doctrine:fixtures:load`
10. Générer les clés SSL de JWT pour l'authentification : ```symfony console lexik:jwt:generate-keypair```

## DOCUMENTATION À UTILISER

[Documentation Symfony](https://symfony.com/doc/current/index.html)

[Documentation PHP](https://www.php.net/docs.php)

[Documentation LexikJWTAuthenticationBundle](https://symfony.com/bundles/LexikJWTAuthenticationBundle/current/index.html)

[Documentation NelmioApiDocBundle](https://symfony.com/bundles/NelmioApiDocBundle/current/index.html)
