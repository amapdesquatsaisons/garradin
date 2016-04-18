<?php
/*
    Passphrase_FR
    Copyleft (C) 2009-2015 BohwaZ - http://bohwaz.net/

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, version 3 of the
    License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

namespace KD2;

class Passphrase_FR
{
    const DEFAULT_CHARACTERS = '\pL\'-';
    const DEFAULT_WORDS_NUMBER = 4;

    static private $words = null;

    static public function generate($nb_words = null, $characters = null)
    {
        if (is_null($nb_words))
        {
            $nb_words = self::DEFAULT_WORDS_NUMBER;
        }

        if (is_null($characters))
        {
            $characters = self::DEFAULT_CHARACTERS;
        }

        self::getDictionary();

        $words = array();
        $max = count(self::$words) - 1;

        while (count($words) < $nb_words)
        {
            $random = self::$words[mt_rand(0, $max)];

            if (preg_match('!^['.$characters.']+$!u', $random))
            {
                $words[] = $random;
            }
        }

        return implode(' ', $words);
    }

    static public function getDictionary()
    {
        if (is_null(self::$words))
        {
            self::$words = array ('paysage','lui-même','erreur','pénitence','brûlant','canon','prudent','débarrasser','séparer','retomber','croix','sauter','nid','grand-maman','satisfait','défense','compter','déboucher','peintre','tentation','devant','envie','pleuvoir','fièvre','organiser','persévérer','ivre','quart','pourvu que','tilleul','barrière','police','pareil','invention','fer','guerre','cordialement','campagnard','infirmier','crépuscule','manier','animal','transporter','mobile','perfection','marque','joncher','nouveau','désespoir','joindre','cordonnier','ruelle','risquer','janvier','ménage','couronne','fusil','loi','page','clou','armée','flacon','blanc','adresser','maître','caverne','rentrée','constant','montre','surface','ruban','cause','division','note','luisant','poche','poursuite','gazon','ingratitude','pré','rose','activité','joyeux','fâcher','préoccuper','obligeance','rivière','vache','dessin','but','fond','deux','ceinture','lorsque','cantique','tâcher','expirer','aviser','gibecière','lourd','espiègle','sommet','carte','vendeur','opérer','disparaître','rire','agréer','visite','précédent','simplement','dorer','sagesse','revivre','manteau','croûte','intelligence','lion','chêne','horreur','grandeur','saluer','mauvais','sentier','estomac','modeste','nullement','hâter','millier','saigner','curé','moineau','fuite','flaque','crêpe','gant','s\'emparer','gare','gentil','sacrifice','modérer','brutal','feuille','pouvoir','dossier','clef','terrain','quarante','actif','fou','réconforter','gendarme','ignorant','grotte','habiller','stationner','implorer','chapitre','soupir','chaise','rarement','application','s\'écrier','ressource','ministre','doyen','jeu','graisse','chantre','écho','barre','clouer','bourgeon','équipage','commun','obliger','berceau','outil','coquille','procureur','germer','séminaire','partout','agréablement','énorme','radieux','retrousser','sorte','billet','mademoiselle','condamner','aviateur','tourbillonner','boucher','fumer','décembre','rang','étouffer','sens','parcours','tablier','pleur','bluet','cesse','papier','bonté','boucle','avantageux','tranche','coller','jeune','drapeau','gaieté','chemin','deviner','auparavant','orée','passage','souffle','agir','s\'envoler','apparition','hors','président','deuil','berger','merveilleux','clin d\'oeil','priver','oser','mariage','forêt','règne','commode','finir','bosquet','mouche','tailleur','essuyer','téléphone','couronner','château','tourbillon','citoyen','neveu','paisible','messager','ci-joint','ignorer','sûrement','tache','dompteur','préférence','maison','revêtir','vicaire','vendredi','frapper','chef','bâiller','seigneur','appuyer','livre','complètement','motif','adjectif numéral','train','ruisselet','arrêter','danse','blottir','raisin','raconter','dahlia','épauler','réel','morceau','étudier','amical','mouchoir','libre','printanier','voiture','journal','musée','village','charge','pâquerette','mari','ombrage','attention','choc','rapprocher','prévoir','bienveillance','suprême','sirène','ceci','giroflée','gouverner','fraîcheur','circuler','mélancolie','exactement','désireux','commandement','annoncer','cueillette','duc','désobéissant','chauffeur','dessert','murmurer','exclamation','formidable','tant','acclamer','son','désaltérer','soeur','fourrer','industrie','embarquer','bienfaiteur','mine','joyeusement','fidèle','grès','dictionnaire','nuage','miroir','conscience','équilibre','tarder','verdoyant','parvenir','boue','refuser','manuel','grand','réchauffer','succéder','bloc','front','père','employé','moissonneur','là','majesté','réclamer','auquel','général','obscurcir','commerce','singulier','consolation','passager','mais','événement','administrer','coucher','rapidité','respirer','quai','empereur','farine','préserver','glisser','ver','sourd','notaire','citer','débris','habile','qualité','inerte','football','abri','miel','franchement','essai','production','errer','ah','idéal','agile','tarte','léger','raisonnable','projeter','poésie','massif','pommier','ensoleillé','couvent','sauver','invitation','métier','poussière','école','fuir','pleurer','imaginer','sautiller','édifier','multitude','commerçant','plat','autel','toujours','craindre','tuer','cuisinière','ingrat','percher','concert','doubler','trésor','cimetière','exercice','savon','éblouir','éclat','parc','peau','compléter','escalier','sous','matinée','recherche','régner','épreuve','autrefois','fauteuil','apprendre','pétale','sujet','lequel','bien-être','chauffage','nerveux','décision','participer','gronder','aussi','tombe','éternité','rejeter','enveloppe','habitude','peut-être','accabler','confrère','prêtre','parfaitement','soigneusement','compliment','d\'après','chéri','oiseau','coureur','mentir','faucheur','héros','arrêt','graver','intrigué','plaine','combler','planche','recouvrir','imprudence','brebis','poule','spectacle','semblable','anticiper','mener','hommage','déshabiller','moins','volume','poulet','main','imposant','fendre','paille','résistance','écrivain','franchise','casquette','mien','heure','an','oranger','coucou','plomb','télégramme','amende','part','combat','applaudir','rédaction','exécution','largement','unique','jardinier','belge','réserver','colère','lueur','moyen','coiffer','guérir','échec','minute','conseiller','fontaine','scier','fabrique','oisillon','amicalement','oreille','laisser','gosse','tard','autoriser','emmener','anxiété','patron','abbé','désobéissance','bazar','destinée','plume','terrasse','potager','dessus','régulièrement','distinguer','roseau','malade','éteindre','pendule','imperméable','fougère','pelage','écriture','journalier','comprendre','manoeuvre','soudain','dessous','parmi','aire','bosselé','goutte','bateau','veiller','économiser','intelligent','ferveur','avertir','repousser','ville','convenable','farce','cultiver','provenir','acharner','pic','avril','frontière','patte','merci','prince','précieux','espoir','allumette','poumon','bleu','inutile','proposer','être','attester','couvert','trou','démontrer','effroyable','localité','reverdir','trop','user','ours','locomotive','ailleurs','fournir','piste','béret','profondément','respecter','lecture','congrès','ennuyer','lendemain','indigne','eux','détail','compagne','vérité','capital','bavarder','grue','sueur','urgent','habituel','fragile','ôter','briller','border','souper','marteau','agent','moisson','mou','repentir','disperser','commande','situation','atteindre','musique','voyage','remettre','écharpe','fruit','éclaircir','particulier','ardent','foi','bercer','papa','marbre','guérison','alcoolique','apaiser','marguerite','hôpital','séance','bousculer','aube','cordial','quelque','chaque','difficilement','union','inquiétude','filleul','ami','explication','toux','limpide','jeter','réellement','inquiéter','activer','capable','résister','reconnaissance','troupe','aussitôt','niveau','jeunesse','meunier','signature','consulter','bout','périr','amateur','livrer','rapide','engloutir','usage','nombreux','sagement','tapis','grossier','bourgmestre','demoiselle','prodiguer','limite','clochette','fortune','échanger','inquiet','parapluie','quelconque','propos','enquête','réduire','chance','énergique','source','dent','voilà','féroce','tasse','envers','capitaine','contrée','obstacle','île','plier','moderne','allemand','muet','introduction','annuel','habitation','jambe','mouton','résoudre','ferrer','éclater','sein','naufrage','galerie','foule','soulier','voûte','toutefois','fourrure','marquis','punir','féliciter','discussion','défiler','dédaigner','tailler','tomber','clé','côté','broder','encore','jambon','poulailler','habiter','chauffer','normal','aventurer','professeur','approuver','peur','automobile','conduire','ardeur','vôtre','centime','emporter','fois','moquer','éducation','fourmillière','pieux','copier','étinceler','regagner','trait','esclave','géant','attrait','allonger','rude','santé','bébé','décharger','obscur','commercial','battre','partir','parure','mesure','encombrer','reflet','reproche','recueillir','cathédrale','illustrer','chiffre','timbre','courir','climat','genre','daigner','tente','gauche','imagination','chérir','guichet','bulletin','classique','poursuivre','renseigner','boisson','ranimer','sabot','chute','brillant','volaille','grandiose','orgueil','brun','plaintif','moqueur','bruit','jadis','achat','baigner','accourir','inscrire','plancher','religieux','joue','avec','accident','figurer','surtout','buis','courageusement','moine','employer','baguette','foudre','signaler','succès','parfumer','découvrir','bête','sien','corniche','renoncer','relever','mérite','résonner','type','tournée','préparation','sillon','étable','relation','chasseur','cas','description','porc','pourrir','blesser','favori','puisque','laid','calculer','veine','chameau','indifférent','dégager','crucifix','faine','renouveler','principe','crayon','revenir','frémir','élégant','secret','parce que','opinion','mélanger','colonel','utiliser','soin','cinquante','sonore','écouler','tel','colline','seulement','futur','expédier','tuile','chapeau','mouiller','fureur','grâce','consentement','fervent','paletot','vêtir','manger','étude','ménager','proie','héroïque','pli','canal','lin','effectuer','condoléances','savoir','instructif','azuré','cristal','plus','chemise','jouer','immobile','achever','quatrième','serviteur','spécial','science','rechercher','alentours','mont','soyeux','cruel','service','jugement','négligence','oie','mortel','voyager','fourneau','gâteau','début','ciseaux','carrefour','mobilier','gambader','arroser','imiter','redevenir','rapporter','gaz','inviter','fort','hardi','passé','riche','oeuvre','souterrain','créature','tendre','souvent','ralentir','agrément','entasser','faute','scintiller','peiner','froid','traiter','gorge','remarquable','veston','princesse','peinture','basse','provision','poteau','guider','plusieurs','série','mûr','affectueux','refuge','salaire','innocent','véhicule','style','consacrer','gardien','retrouver','coupable','charmer','créateur','renard','panorama','couteau','rêver','confectionner','appartement','traîner','astre','appétit','invisible','détester','raide','réponse','ceux','creuser','carré','aujourd\'hui','ficelle','trottoir','moulin','glacer','vêtement','hâte','appeler','mission','renouvellement','dernier','missionnaire','fille','gratitude','juillet','vieil','déchaîner','commettre','attraper','parsemer','quantité','gazouiller','blancheur','foie','satin','serein','salut','connaître','novembre','avenue','curiosité','porte-plume','merveille','chaland','article','geler','mansarde','alcool','monstre','chanter','océan','ressort','sifflet','renoncule','entrée','balle','monter','effort','introduire','juin','vaillant','valoir','voisin','eh','dresser','dortoir','sobre','médecin','répéter','problème','négliger','bicyclette','couche','facile','visiteur','aise','assiette','aurore','sincère','magnifique','estimer','durée','accorder','reculer','café','fameux','serviette','ainsi','voix','protéger','circulation','agréable','communier','chrysanthème','animation','végétation','justement','cochon','courant','légume','nation','table','jardin','extérieur','attentif','important','noeud','décrire','vivant','merle','vermeil','forger','comparer','redoubler','forcer','incliner','bien-aimé','préau','ériger','gras','dentelle','rayon','régime','foncer','avant','célébrer','générosité','perle','envoi','sonnette','suffire','crever','réfectoire','indication','paternel','ronronner','péril','second','grappe','courageux','lierre','cuire','cousin','souhaiter','trembler','pas','patronage','mur','mâchoire','paresse','garde','ronce','courber','furieux','dedans','brouillard','expression','promener','intention','bille','perte','déception','situer','bonne','désormais','azur','roulotte','public','gerbe','crème','isoler','séjour','repas','donc','madame','vernir','corridor','périlleux','fauvette','encourir','position','fin','vide','jusque','agrémenter','autorité','pauvre','plage','enfouir','marché','vraiment','signifier','portière','griffe','minuscule','plonger','messe','impossibilité','ouvrage','paix','ambulance','petit','vacances','corriger','engager','humble','longuement','pratiquer','jaunir','salutation','dérober','bouche','nécessaire','causer','dessein','rouler','huit','villa','façonner','malgré','sang','alors','silencieusement','nettoyer','dévouement','conseil','tunnel','parent','fauve','cabane','distraction','opération','fruitier','poupée','crier','tapage','soir','sot','sentiment','prolonger','grimper','pur','produit','satisfaction','rustique','chambre','excuse','rouge','protection','désolation','étendre','crise','pourtant','communiant','enseignement','ample','physique','négligent','lanterne','recommencer','conserver','chaux','menteur','suffisant','vivre','abondant','étagère','douter','glace','liberté','docile','pensionnat','debout','abattre','clairon','noircir','victoire','épuiser','tiroir','chevalier','considérer','cuiller','réunion','reste','depuis','cortège','heureusement','panache','poignée','brin','peser','lettre','naissance','réunir','lâcher','venir','rassurer','porte','resplendir','taper','associer','doute','promettre','sourire','surmonter','bienveillant','chaleur','nièce','flatter','régaler','moelleux','surprise','écurie','danger','distinction','offrir','travail','exposer','colis','flot','quotidien','permettre','ennemi','invoquer','voler','artiste','attrister','linge','tombeau','répondre','donner','transmettre','août','seul','planter','acquitter','lire','horizon','splendeur','amour','kilomètre','jardinage','ornement','charme','vers','mineur','tempête','circonstance','maint','caresse','oeillet','dimension','gâter','immaculé','veille','baisser','peuplier','rouleau','lilas','lumineux','laborieux','gland','écrire','flocon','parole','cuillère','favoriser','composition','gravure','nature','tantôt','dominer','boire','fouet','spécialement','coquelicot','fourniture','lampe','grange','pétrir','port','retraite','douloureux','amusement','bibelot','enlever','clément','sabre','lutter','pluie','musicien','pie','phrase','aventure','perspective','solide','vertu','refaire','apostolique','orgue','quinze','réciter','bordure','débarquer','cycliste','randonnée','renvoyer','épargner','volonté','savoureux','tous','essayer','aliment','haleine','côte','humide','obtenir','complet','onduler','ressentir','crime','pigeon','vapeur','chaume','cirque','chiffon','ferraille','ramasser','s\'éloigner','cent','manche','planer','affreux','jurer','trimestre','triomphe','pénible','grelotter','rigole','commander','épine','suivre','gourmand','confier','hurler','joujou','dîner','dévorer','plafond','parler','enfermer','avion','bienheureux','titre','lien','peine','aucun','riant','dont','admirable','triompher','conférence','tiède','mourir','diriger','terminer','prononcer','acier','splendide','image','histoire','céleste','brigand','résultat','dos','foin','rayonner','venger','ensuite','patience','ébats','allégresse','rideau','malin','flatteur','luire','robuste','ardoise','sacoche','menton','bassin','mai','doux','date','bonbon','dévouer','enflammer','goût','instituteur','habit','lier','sympathie','naître','marraine','animer','pourquoi','chausser','communication','mouvement','sève','aubépine','vif','clos','bal','hasard','trouble','ménagère','scolaire','marche','prouver','comble','couver','théâtre','affliger','écouter','contrarier','lieu','étoile','frotter','four','caprice','fixe','puissant','ménagerie','croître','culotte','tort','pelouse','maudire','confus','occuper','tournant','angoisse','fièrement','exécuter','commission','servir','poil','catastrophe','selon','bord','chose','vaisselle','rage','louer','étirer','énormément','entre','juge','poutre','blanchir','fréquent','las','mériter','inconvénient','fréquenter','bourgeonner','demi','voie','centre','chevelure','raccourcir','affiche','découper','succulent','impression','architecte','blouse','procurer','faner','utilité','vigne','bêche','vain','reprise','chair','secouer','anxieux','recommander','onze','velours','moindre','sillonner','cité','évangile','duvet','quatre','farouche','noyer','si','caillou','manoeuvrer','négociant','chou','royaume','attirer','missel','rougir','limiter','flanc','dommage','dehors','difficile','litière','intime','penser','huile','savant','souhait','piété','calmer','faiblesse','bénir','préparatif','pinson','goûter','membre','écarter','défendre','wagon','gamin','pain','insigne','valeur','recommandation','butiner','hanneton','redoutable','consoler','appartenir','soupe','mettre','hausser','chocolat','aligner','gracieux','haillon','niche','bourdonner','peindre','briser','quoi','attaquer','nuit','paraître','lisière','cesser','recevoir','sport','maire','marin','violence','usine','survenir','meule','proprement','saint','possession','cinq','dessiner','quant','falloir','politesse','trente','fier','épaule','embaumer','dès','abaisser','pécher','noir','accrocher','tas','vie','interdire','progrès','sacrement','rusé','orgueilleux','courrier','déjà','au-dessus','guetter','pâte','vagabond','plante','rôle','avoine','voleur','craquement','taquiner','affectueusement','portée','grain','porteur','buisson','toile','tressaillir','intellectuel','mordre','bière','dette','apprêter','camion','net','bravo','groupe','espace','aimable','épée','dur','menuisier','précaution','volée','orphelin','accepter','estrade','bambin','célèbre','bétail','déborder','univers','tremper','oeuf','toit','bec','coiffure','hauteur','filer','bouleverser','réserve','talus','expédition','fatiguer','annonce','acte','vendre','samedi','appliquer','conviction','ranger','pan','camarade','terrestre','quelquefois','poli','voiler','dépendre','directeur','unir','suspendre','paradis','dormir','décorer','cadet','plan','saut','national','gémir','gloire','terme','indiquer','mélodie','exactitude','tacher','douzaine','répartir','propice','distance','région','mendier','parterre','flèche','idée','bref','confondre','couler','verre','oncle','étalage','familier','fumée','désirer','boutique','boîte','industriel','corde','veuf','refléter','gaiement','arrondissement','refermer','lèvre','banque','tableau','s\'écrouler','instant','pardon','turbulent','somme','chrétien','rompre','vol','concours','enfin','renaître','loup','envelopper','commune','bondir','barbe','paître','outre','corbeille','exposition','fleurir','pension','pays','brusquement','âne','vue','soulever','recourir','coussin','avantage','balancer','cigarette','nouvelle','charité','pitié','suffisamment','secourir','cela','long','longer','trouver','doucement','passant','demander','réalité','demeure','queue','procession','fondre','aisément','bonheur','respect','changement','aiguille','vaste','centaine','transformer','prospérité','sacrifier','prochain','geste','lointain','flamand','tenter','commencement','là-bas','diamant','prier','propriété','hirondelle','nécéssité','continuellement','fatigue','rive','travailleur','kermesse','quelqu\'un','solitude','sursauter','salir','évidemment','vieillard','cadeau','office','acquérir','péniblement','environner','grille','grammaire','végétal','pipe','fête','semaine','profondeur','délicat','détacher','retour','souffrir','supporter','gouvernement','barque','lambeau','seuil','étranger','froisser','tourment','d\'abord','personnel','prudence','remède','intéresser','étudiant','manque','jacinthe','villageois','renfermer','égarer','herbe','poire','armoire','présent','prétendre','joli','signer','plaindre','offre','sucer','ressembler','maladie','tandis que','caresser','couleur','électricité','plaisir','bras','tonneau','bruyant','proclamer','couture','bienvenue','cage','calvaire','connaissance','tenir','propre','confesser','degré','maintenant','droit','lancer','gelée','reconnaissant','ancien','colonne','nord','maussade','talent','contempler','fermer','vélo','ni','garantir','résigner','brut','blond','reporter','vite','aisance','gêner','blé','forge','nourrir','barquette','abord','teinte','pardessus','ravir','emploi','étage','sauf','frêle','prêt','lièvre','créer','pâture','extrême','victime','tendresse','rue','inconnu','possible','croquer','encre','anglais','chasser','rester','charbonnage','sinistre','carnet','effrayer','myosotis','fouetter','expliquer','écorce','ravage','sublime','revue','entretien','géographie','boucler','gravement','quel','or','lis','écolier','dégât','taire','insister','onde','supplier','chariot','mécanique','baiser','vouloir','fossé','mois','porter','exercer','puis','poulain','illusion','sécurité','marier','gîte','tapisser','domestique','amer','étincelant','garnir','providence','espérer','cartable','fonds','alouette','ébranler','estime','soleil','valise','entourer','insecte','armer','sortir','jouir','éclore','mécontent','loyal','primaire','contenu','généralement','persuader','infini','anniversaire','fenêtre','action','forgeron','agiter','fortement','réveil','accomplir','disposition','ordinairement','embellir','mesurer','arme','souci','graine','soirée','robe','proverbe','manifester','pantalon','dictée','bouleau','illuminer','fêter','relatif','certes','élever','mort','natal','drôle','point','modèle','exister','voeu','beauté','admirer','redresser','par','cours','varier','envahir','content','retenir','amuser','s\'efforcer','obéir','pondre','logis','avouer','museau','parti','grandir','promeneur','enfance','autour','flamme','durer','adversaire','préférer','retirer','informer','mardi','terreur','étonner','aimer','tricot','entrer','consentir','carrière','aérer','réaliser','régiment','renverser','foire','immédiatement','chien','accompagner','traitement','inondation','combien','épargne','détruire','faible','champ','aigu','arranger','monument','baptême','punition','abandonner','rez-de-chaussée','troupeau','sale','rien','afin','famille','agitation','tabac','coupe','fillette','sud','carton','file','habituer','triste','catholique','sévèrement','permission','match','retentir','fabriquer','communal','défunt','rare','remporter','jour','période','sec','labeur','lenteur','débattre','montant','bouger','joie','sac','demeurer','muraille','sage','facilement','bas','abîme','attentivement','tuyau','munir','tricoter','raison','nègre','morne','accueil','exquis','lisse','apporter','bise','emballer','examiner','américain','réformer','admettre','servante','droite','occasion','église','éléphant','garniture','établir','récolter','hésiter','avance','compassion','égard','sensible','emplacement','montrer','docteur','retourner','comme','acheter','étincelle','pont','zèle','déterminer','continuer','vieillesse','attribuer','enfoncer','partager','course','rond','trancher','tourmenter','ravissant','migrateur','odorant','s\'empresser','malheureux','dimanche','barreau','cependant','drap','haine','importer','attachement','sacré','croire','discuter','plumier','bouton','araignée','romain','groseillier','diminuer','convertir','saisir','interroger','garder','atelier','respiration','chaudement','distribution','collège','société','tromper','roue','réfugier','patin','remuer','mignon','corbeau','statue','perdrix','croiser','cygne','exciter','peu','nager','remords','découverte','demande','paquet','perche','meuble','pis','ferme','froment','symbole','tellement','examen','sable','art','rattraper','charbon','gonfler','monde','correspondance','soumettre','entendre','cerise','entraîner','misérable','admiration','imprimer','établissement','brumeux','bureau','crèche','tirelire','infirme','fils','sinon','mille','oui','charrette','troisième','viser','arrière','empressement','péché','acheminer','grêle','coton','extraire','maintenir','chacun','placer','avancer','soutenir','preuve','réjouir','provoquer','couvercle','tulipe','étourdi','postal','dépenser','dater','produire','percer','reprocher','émouvoir','cache-cache','lait','mémoire','bonsoir','étaler','volontiers','ouate','tigre','naturellement','davantage','richesse','avaler','brèche','serrer','conformément','paisiblement','marchandise','vigueur','caisse','darder','principalement','racine','cueillir','bouquet','ruine','baptiser','épouvantable','cadran','arriver','aboyer','rôder','reconnaître','chaussure','apôtre','attendre','incident','violent','fromage','muscle','lutte','pratique','ange','propreté','studieux','malle','bossu','femme','repos','reconduire','spectateur','accord','observation','grouper','ruisseler','figure','charmant','vitesse','époux','familial','âme','honorer','enterrement','monnaie','éclabousser','sapin','désespérer','juger','opposer','disputer','menu','arbuste','lot','bourrasque','supérieur','puissance','cuivre','payer','papillon','échantillon','pièce','composer','incendie','parcourir','patrie','calcul','apprécier','timide','orage','labourer','appel','vierge','chasse','recours','embrasser','salle','cadre','voile','million','moitié','feuillage','haut','puits','augmenter','juste','derrière','blessure','midi','calendrier','clair','hiver','fleur','magique','touffu','violette','libérer','caractère','choix','plumage','remonter','étonnement','impatiemment','fixer','proposition','banc','trois','irriter','coffre','regret','brise','divin','endormir','précéder','allée','noisette','tourner','carotte','mère','boulevard','faire','règle','témoin','rame','affectionner','sans','adresse','chant','cou','hermine','tordre','chevet','panier','fleuve','argent','silence','manquer','bourgeois','siège','replier','masse','cime','dépens','excuser','actuel','mal','apercevoir','tribunal','renouveau','domicile','abeille','cher','dépêcher','malheur','condition','riz','passion','sermon','pointe','arrivée','impatient','sérieusement','brave','soif','joueur','muguet','carrousel','accueillir','continuel','contraire','dicter','vanter','régulier','sain','encrier','vallée','canne','tendrement','imprudent','décéder','précipiter','boule','portefeuille','réparer','universel','pâtisserie','démarche','neiger','souriant','branche','narcisse','étrange','eau','clown','parrain','jeudi','février','moudre','fil','affaire','salon','sauvage','rôti','ouverture','poudre','repasser','perroquet','mare','rameau','extrémité','disparition','réception','coudre','pardonner','central','observer','dépouiller','celle-ci','absolument','amitié','inférieur','tâche','profit','illustre','honorable','assembler','sergent','faciliter','pupitre','politique','changer','basse-cour','spacieux','officier','délaisser','exemple','trouer','accuser','descente','beau','chaîne','saison','vérifier','deuxième','femelle','abîmer','tristement','portrait','entrouvrir','défenseur','redouter','représenter','parages','endosser','excellent','bénédiction','combattre','récréation','coup','horrible','ramage','constater','képi','paroisse','tranquille','décider','rencontre','broyer','maigre','paire','ombre','matière','obscurité','scène','envier','chanson','signal','exprimer','monotone','s\'absenter','septembre','utile','enrichir','matin','catéchisme','aumône','marron','taille','canot','projet','parfum','congé','imposer','départ','mars','vitre','sucre','semer','coin','tartine','sommeil','infiniment','raccommoder','hypocrite','intérêt','tournoyer','prendre','adoucir','averse','monseigneur','pompier','givre','méchant','stupéfaction','aboutir','genêt','orange','malette','hangar','ordonner','crainte','fiancé','épi','clarté','meilleur','prêcher','brochure','gagner','calme','sur','hier','dangereux','pois','défaire','convenir','indispensable','vainqueur','fabrication','prière','prisonnier','aîné','gigantesque','vente','s\'évanouir','envoyer','charger','pinceau','pousser','retard','autant','distrait','arrondir','simplicité','pâle','assez','céder','difficulté','généreux','perdre','mousse','franc','redescendre','siècle','contribuer','excursion','marchander','hygiène','délivrer','esprit','dix','objet','néanmoins','besoin','diable','verser','éprouver','marcher','nul','transport','vrai','dame','exaucer','présence','quatorze','étroit','épanouir','commandant','force','adroit','rouiller','réveiller','conduite','mélancolique','communion','sursaut','borne','conquérir','clocher','étoffe','heurter','confiture','épais','gris','honteux','quartier','dépasser','ronde','distribuer','facteur','asseoir','rencontrer','méthode','absence','rappeler','constituer','sort','enfant','grossir','mât','seau','offenser','fatal','honneur','hérissé','prêter','différence','soulager','traverser','pourvoir','seconde','adorer','sévir','odeur','colorer','malheureusement','charitable','nu','mouvoir','agacer','loisir','supposer','oh','tricolore','appui','approcher','institut','bûcheron','laver','religion','respectueux','avoir','chercher','flamber','savourer','tortue','déclarer','éclair','honnête','temps','danser','brusque','même','particulièrement','humeur','durant','plupart','réussir','barrage','maman','cacher','cheval','absolu','modestie','nuisible','pencher','tour','peupler','plateau','grippe','quitter','lever','régler','coffret','celui-ci','obéissant','délice','sortie','vivement','vin','osier','enthousiasme','firmament','déplacer','prairie','enterrer','costume','cave','acide','trajet','manière','discours','dizaine','bandit','empêcher','poêle','profession','mélodieux','relativement','cheminée','soupirer','convaincre','faucher','adopter','peuple','été','méditer','pénétrer','passer','rassembler','trace','façade','façon','attaque','apparence','solitaire','voici','échelle','époque','immense','fâcheux','ici','principal','étang','bonnet','kilogramme','français','mendiant','aborder','automne','lunette','marchand','doigt','air','conséquence','acheteur','haie','bâton','probablement','digne','bleuet','sécher','enseigner','mêler','tige','interruption','coûter','noix','poirier','os','redire','âgé','vilain','contact','pourpre','douceur','lac','ruiner','aisé','contenir','lundi','langage','espérance','direction','température','brique','sûr','cinéma','raser','sel','primevère','douze','charlatan','remarquer','entreprendre','parfait','mer','regarder','bientôt','piquer','dérouler','économie','balayer','autrui','homme','évêque','sitôt','échapper','minuit','vingt','orner','défaut','colonial','couvrir','cuir','chaud','canard','rafraîchir','couper','harmonieux','poids','bourse','purifier','différent','amusant','très','marronnier','pensionnaire','bienfaisant','médaille','navire','comte','oeil','interrompre','miette','charrue','mauve','violet','guêpe','endroit','souverain','former','administration','aide','bizarre','désigner','tonnerre','hache','aspirer','bougie','rêve','franchir','bain','regard','journée','cerisier','pendre','touffe','attente','ténèbres','prodigieux','songer','forme','révéler','verdure','monsieur','intérieur','cri','plein','appétissant','soldat','sévère','écluse','local','beaucoup','genou','coq','saule','race','géranium','roi','souiller','pomme','privation','botte','large','bâtir','rejoindre','thé','question','devoir','terre','client','noble','sombre','installer','valet','habileté','presser','risque','lit','mirer','remerciement','rocher','élargir','désastre','impossible','misère','moment','coutume','loin','bon','frayeur','cloche','pâlir','cadavre','honte','carreau','jaillir','souvenir','vulgaire','hôtel','dispenser','inspecteur','prévenir','élève','mieux','treize','profond','suc','parer','pâtre','déployer','laine','condisciple','lys','influence','déchirer','après-midi','inonder','occasionner','surveiller','déranger','disposer','transformation','verdâtre','giboulée','piano','face','allure','écrit','ton','matinal','remise','vent','paresseux','flotter','grave','creux','autrement','plainte','ruche','hêtre','louange','alerte','récompense','intervenir','rossignol','visage','six','coude','visible','parquet','mètre','perpétuel','pavé','solliciter','forestier','exhaler','don','directement','équipe','choeur','témoigner','faveur','différer','friandise','ennuyeux','mince','bois','gaufre','tôt','bond','tronc','année','tenue','emplir','rosier','moustache','bonjour','pied','humanité','injure','roux','gravir','descendre','domaine','pêcher','souple','voisinage','ça','faim','reposer','premier','élancer','argenter','liste','égal','propriétaire','subitement','salade','sincèrement','serviable','avenir','concerner','arbre','déménager','correction','car','cabine','griffer','poing','aiguiser','corps','ligue','nommer','sol','destination','lutin','métal','assidu','voyageur','attacher','successivement','transparent','abondamment','cercle','bijou','sifflement','encourager','souffler','machine','atmosphère','parfois','royal','ramener','canif','nez','détourner','boeuf','soigner','chèvre','dans','auteur','décourager','aveugle','fréquemment','soigneux','douleur','langue','sentir','assurer','tracer','mystérieux','bâtiment','lent','certain','nombre','flûte','taillis','désagréable','bourdonnement','mensonge','cérémonie','larme','constamment','importance','allumer','fée','bouder','poste','chat','récompenser','ciel','ivoire','amener','vénérer','quoique','autre','cultivateur','ventre','filet','s\'enfuir','faux','halte','embarras','brume','vigoureux','escalader','dissiper','miracle','brouter','gratter','exact','légèrement','instruction','photographie','exprès','classe','cour','compte','longueur','laboureur','protecteur','fonction','sou','s\'agenouiller','favorable','dire','loger','toilette','balançoire','résolution','jonquille','dénudé','nom','satisfaire','plutôt','brûler','court','pour','corolle','hameau','subir','majestueux','chagrin','également','habitant','cirer','jaune','merveilleusement','émerveiller','campagne','réflexion','relire','affection','enchanté','distraire','boulangerie','considérable','mystère','ordinaire','soulagement','coeur','lumière','glissant','interpeller','neige','silencieux','refrain','ouvrir','récolte','lune','éclatant','jaloux','besogne','tête','surprendre','rapidement','vague','extraordinaire','personnage','foyer','bouteille','grive','tante','remarque','tout','matériel','espèce','finalement','garçon','betterave','débiter','voir','rhume','gymnastique','multicolore','serrure','bien','craquer','suivant','démolir','guère','entièrement','poitrine','conter','bruyamment','écraser','ballon','effacer','délicieux','courage','retardataire','contenter','ennui','rosée','gibier','nappe','carabine','déjeuner','centimètre','tram','chef-d\'oeuvre','photographier','sept','sembler','toucher','exiger','lasser','présenter','surgir','suave','grincer','cuisine','contre','fermier','calice','verger','arracher','quand','fleurette','approche','remplacer','souris','pendant','non','place','civil','hélas','destiner','bibliothèque','éternel','reprendre','consister','élan','imprévu','encadrer','lors','mot','liquide','désert','gazouillement','personne','attarder','boueux','fouiller','entonner','devenir','double','abuser','simple','frissonner','désordre','voltiger','communiquer','instruire','chanteur','fourmi','banquier','bonhomme','fait','rendez-vous','angle','écureuil','remercier','pin','renseignement','pointu','dernièrement','cheveu','rat','conte','électrique','dépôt','octobre','promesse','boulanger','ensemble','émotion','rendre','ordre','poète','couloir','plaie','actuellement','tramway','fraise','arbitre','aller','conclure','auprès','auberge','abriter','travailler','volet','bataille','frère','occupation','sérieux','assaut','rater','intéressant','instrument','intense','chapelet','divers','frais','couverture','neuf','lui','mélange','soie','plaire','grenier','désoler','soutien','paysan','vaincre','tambour','visiter','compliquer','prime','maîtresse','sanglot','ravin','printemps','certainement','éveiller','remplir','état','impatience','déplaire','environ','confiance','banane','seize','moyenne','vider','velouté','pensée','refroidir','brindille','morale','profiter','pot','assister','téléphoner','poser','affairé','claquer','entier','dieu','suite','quinzaine','plaque','fléau','solennel','vitrine','rigoureux','leçon','adieu','détour','collection','gai','lieue','construire','demain','sincérité','âge','horloge','avis','apparaître','trompette','lugubre','rapport','abondance','anneau','programme','viande','pêcheur','coquet','lamentable','lentement','inspirer','ronger','témoignage','lapin','épouser','poussin','longtemps','entretenir','lécher','pittoresque','terrier','chaussée','murmure','comment','procéder','répandre','tissu','cahier','houille','corne','entrevoir','jamais','véritable','menacer','éclairer','laitier','reparaître','casser','pêche','palais','marquer','tinter','humidité','compagnon','tranquillement','acclamation','commencer','représentant','exemplaire','étrennes','bande','prix','facilité','rapiécer','conversation','multiple','embarrasser','pompe','prompt','tirer','comparaison','vert','compagnie','gros','prise','yeux','vice','cerf','ligne','poisson','choisir','excellence','troubler','hôte','absent','camp','mode','reine','près','vieux','trotter','désobéir','justice','proche','glissoire','heureux','route','étendue','jouet','affaiblir','prison','poireau','veau','aile','mûrir','militaire','moral','boiteux','tristesse','chaumière','préparer','partie','éviter','rider','secours','clairière','existence','vêpres','rétablir','grenouille','bagage','construction','représentation','après','sonner','balcon','torrent','revoir','montagne','réfléchir','aider','posséder','bienfait','expérience','feu','ivresse','naturel','gentiment','épouvanter','développer','récit','souffrance','regretter','combattant','grand-père','siffler','entrain','superbe','station','moteur','nourriture','ajouter','duquel','presque','beurre','atteler','guide','cendre','rentrer','signe','pierre','numéro','effet','maternel','promenade','travers','chapelle','énergie','ouvrier','grand-mère','humain','milieu','gens','tacheter','ruisseau','leur','vase','précisément','désir','singe','diviser','soupçonner','terrible','curieux','déposer','traîneau','culture','mercredi','goal','chez','magasin');
        }

        return self::$words;
    }

}

class_alias('KD2\Passphrase_FR', 'KD2\Passphrase');