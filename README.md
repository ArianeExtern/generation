# generation

Afin d'excecter le projet, il faudra suivre les étapes suivantes :

<h3>1- Cloner ou téléchager le projet "CodeGenerator" dans votre repertoire www.<h3>

<h3>2- Ensuite remarque les deux elements ci-dessous à la racine du répertoire de projet : </h3> 
  <ul>
    <li>app/in/GeneratorCode.php : Qui contient la configuration du MCD donc les fichiers doivent être générer.</li>
    <li>out/[controller, form, model, schema] : Qui va contenir les fichier générer.</li>
  </li>

<h3>Pour finallement générer les fichiers, il suffit de lancer la commande "php artisan code:generate" etant placé à la racine       du répertoire du projet.
</h3>
  <p>
  Ceci Va generer les differents fichier en fonction du MCD spécifier dans la fonction 'getSite()' du fichier app/in/GeneratorCode.php et les fichier seront générer dans le repertoire "out" à la racine de projet.
  </p>
  
<h3>3- Pour customiser voir le répertoire "packages" qui se trouve à la racine du projet.</h3>
