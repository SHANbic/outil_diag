# Outil de diagnostic personnalisé

Cet outil a été créé pour les besoins d'un projet d'école dans lequel notre client, professionnel de la transformation digitale, souhaite proposer à ses prospects de les aider à déterminer les points sur lesquels leur entreprise doit évoluer.

J'ai décidé de créer cet outil sous forme d'arbre décisionnel comme suit: 

* une page html contenant l'ensemble des questions du formulaire composées essentiellement de bouton radio, chacun des input contenant un identifiant indiquant la prochaine question à afficher si le bouton est sélectionné

* un fichier javascript masquant l'ensemble du formulaire au départ (sauf la première question), permettant ensuite d'afficher/masquer les questions du formulaire en fonction des réponses choisies par l'utilisateur

* un base de données mySQL comprenant deux tables, celle amenée a recueillir les parcours des utilisateurs sur le formulaire, l'autre comprenant les réponses à servir aux utilisateurs en fonction de leur parcours

* un fichier php permettant la lecture et l'écriture dans la base de données décrite ci-dessus.

Je n'ai pas hébergé ce projet mais celui-ci a reçu de bons retours de la part de mes formateurs. Je reste malgré tout critique envers mon travail et si celui devait être déployé dans des conditions réelles, je manipulerais plutôt le formulaire sous forme de fichier json, permettant la création d'un script générant les balises html et leur contenu, de manière à alléger le fichier html. L'écriture en base de données se verrait également retravaillée avec la mise en place d'une architecture verticale, permettant une meilleure lisibilité.
