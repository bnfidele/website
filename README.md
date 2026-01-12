# Dépôt flamx.online

## Présentation
Ce dépôt contient le code source du projet **flamx.online**, une application web basée sur le framework Laravel.

## Installation Laravel

1. Clonez le dépôt :
	```bash
	git clone https://github.com/bnfidele/website.git
	cd website
	```
2. Installez les dépendances PHP :
	```bash
	composer install
	```
3. Copiez le fichier d'environnement :
	```bash
	cp .env.example .env
	```
4. Générez la clé d'application :
	```bash
	php artisan key:generate
	```
5. Configurez la base de données dans le fichier `.env`.
6. Exécutez les migrations :
	```bash
	php artisan migrate
	```
7. (Optionnel) Installez les dépendances front-end :
	```bash
	npm install && npm run dev
	```

## Lancement du serveur de développement
```bash
php artisan serve
```

## Contribution
Les contributions sont les bienvenues !

## Licence
Ce projet est sous licence [à compléter].

---

Souhaitez-vous que je mette à jour le fichier avec ce contenu ou que je personnalise davantage selon vos besoins ?
