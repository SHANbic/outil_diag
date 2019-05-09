$(document).ready(function () {

  // déclaration des variables
  let elements = document.getElementsByClassName('element'); //on stocke chaque élémént du formulaire dans un tableau
  let goto = 0; //on indiquera dans cette variable quel élément du tableau doit être affiché au fur et à mesure de notre progression
  let progression = [0]; //ce tableau stockera notre progression dans l'arbre décisionnel
  let uncheck; //uncheck sera appelé à chaque retour en arriere afin de retirer l'attribut check des balises déjà cochées
  let ceil; //variable définie à chaque étape afin de déterminer le la longueur maximale du tableau  
  let current_progress = 0; // permet de mettre à jour la barre de progression
  let start = document.getElementById('start'); //on récupère l'élement start pour pouvoir lui appliquer un écouteur d'évènement

  start.addEventListener('click', function () { //au clic sur "commencer"
    start.classList.add('hide'); // on masque le bouton du meme nom
    elements[goto].classList.remove('hide'); // et on affiche l'élément contenu dans le tableau d'éléments et situé à l'indice actuellement initialisé à 0
    progression.push(1); // aucune condition pour le moment, on push la prochaine étape à suivre dans l'arbre décisionnel

  });
  /* !!!une expression régulière devrait vérifier le contenu de la balise input type email afin!!! */
  $('#mail').on('input', function () { // on réagit à l'insertion de caractères pour le champ 'mail'
    if ($(this).val().length > 8) ($('#mailcheck').removeClass('hide')); //on vérifie la présence d'un certain nombre de caractère et on affiche le bouton suivant
    else ($('#mailcheck').addClass('hide')); // sinon on masque le bouton suivant
  });

  $('#start').click(function () { //au clic sur le bouton commencer
    $('.progress').removeClass('hide'); // on affiche la barre de progression
  })

  $(':radio').click(function () { // on cible les inputs de type radio
    goto = $(this).attr("goto"); // pour stocker la valeur qu'ils contiennent dans leur attribut goto
    progression[ceil] = Number(goto);// on stocke également la prochaine étape du formulaire dans la progression en ajoutant un nouvel index
  });

  $('.next').click(function () { // on cible maintenant les boutons "SUIVANT"
    console.log(progression);
    elements[progression[progression.length - 2]].classList.add('hide'); // on masque l'avant dernier élément (car le dernier correspond à l'actuel)
    if (goto == 0) goto++; // à la premiere étape, goto est égal à 0, on l'incrémente de 1 pour passer à l'élément suivant
    elements[goto].classList.remove('hide'); // on affiche l'élément sur lequel on pointe
    ceil = progression.length; // et on définit immédiatement la taille actuelle du tableau qui servira à éviter les erreurs lors de la sélection du prochain input radio
    current_progress = (goto / (elements.length - 2) * 100).toFixed(0);// ici on calcule le pourcentage de progression en fonction du prochain élément à afficher pour le passer à notre barre
    updateBar();
  })

  $('.prev').click(function () { //on cible les boutons "PRECEDENT"
    current_progress = ([progression[progression.length - 2]] / (elements.length - 2) * 100).toFixed(0); // ici on calcule le pourcentage de progression en fonction du précédent élément pour le passer à notre barre
    goto = [progression[progression.length - 2]];
    elements[progression[progression.length - 1]].classList.add('hide');
    

    if (progression.length > 2) { // on s'assure de ne jamais aller effacer les indices correspondant au début de notre parcours (aucun moyen de les push de nouveau)
      // on masque l'élément en cours
      progression.pop(); //on supprime le dernier indice car nous sommes revenus sur notre décision
      elements[progression[progression.length - 1]].classList.remove('hide'); // et on affiche le dernier élément du tableau, correspondant à l'élémént sur lequel on souhaitait revenir

    } else { // si on est dans nos premiers éléments
      // on se contente de masquer l'élement en cours
      elements[progression[0]].classList.remove('hide'); // et on affiche l'élément 0, soit le début de notre formulaire
    }

    ceil = progression.length;// on met à jour la donnée stockant la taille du tableau afin de ne pas entrainer un muavais comportement lors de la sélection des input radio
    //goto = 0; // et on remet à 0 le goto, au cas ou nos manipulations nous ont ramené au début. Sinon, cette variable sera remise à jour des la sélection de l'input radio
    updateBar();
    console.log(progression);
    uncheck = $(':checked').last().prop("checked", false); //afin d'envoyer des résultats erronés en bdd, on effectue un uncheck pour le dernier élément choisi par erreur
  })

  // code issu du site https://codepen.io/
  function updateBar() { // permettant d'animer la barre de progression
    if (current_progress > 100) current_progress = 100;
    $("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% Complete");
  }
}); // On peut enfin sourire parce que c'est fini et qu'on en a bavé ;)