CREATE TABLE cotisations
-- Types de cotisations et activités
(
    id INTEGER PRIMARY KEY,
    id_categorie_compta INTEGER NULL, -- NULL si le type n'est pas associé automatiquement à la compta

    intitule TEXT NOT NULL,
    description TEXT NULL,
    montant REAL NOT NULL,

    duree INTEGER NULL, -- En jours
    debut TEXT NULL, -- timestamp
    fin TEXT NULL,

    FOREIGN KEY (id_categorie_compta) REFERENCES compta_categories (id)
);

CREATE TABLE abonnements
-- Enregistrement des cotisations et activités
(
    id_membre INTEGER NOT NULL REFERENCES membres (id),
    id_cotisation INTEGER NOT NULL REFERENCES cotisations (id),

    date TEXT NOT NULL DEFAULT CURRENT_DATE
);

CREATE TABLE rappels
-- Rappels de devoir renouveller une cotisation
(
    id INTEGER PRIMARY KEY,
    id_cotisation INTEGER NOT NULL REFERENCES cotisations (id),

    delai INTEGER NOT NULL, -- Délai en jours pour envoyer le rappel

    sujet TEXT NOT NULL,
    texte TEXT NOT NULL
);

CREATE TABLE rappels_envoyes
-- Enregistrement des rappels envoyés à qui et quand
(
    id_membre INTEGER NOT NULL REFERENCES membres (id),
    id_rappel INTEGER NOT NULL REFERENCES rappels (id),
    date TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    media INTEGER NOT NULL, -- Média utilisé pour le rappel : 1 = email, 2 = courrier, 3 = autre
    
    PRIMARY KEY(id_membre, id_rappel, date)
);


CREATE TABLE membres_operations
-- Opérations comptables associées à un membre
(
    id_membre INTEGER REFERENCES membres (id),
    id_operation INTEGER REFERENCES compta_operations (id)
);

CREATE TABLE compta_operations
(
    id INTEGER PRIMARY KEY,

    libelle TEXT NOT NULL,
    remarques TEXT,
    numero_piece TEXT, -- N° de pièce comptable

    date TEXT DEFAULT CURRENT_DATE,
    moyen_paiement TEXT DEFAULT NULL,
    numero_cheque TEXT DEFAULT NULL,

    montant REAL NOT NULL,

    id_exercice INTEGER NULL DEFAULT NULL, -- En cas de compta simple, l'exercice est permanent (NULL)
    id_auteur INTEGER NULL,
    id_categorie INTEGER NULL, -- Numéro de catégorie (en mode simple)
    id_transaction INTEGER NULL, -- Numéro de transaction

    FOREIGN KEY(moyen_paiement) REFERENCES compta_moyens_paiement(code),
    FOREIGN KEY(id_exercice) REFERENCES compta_exercices(id),
    FOREIGN KEY(id_auteur) REFERENCES membres(id),
    FOREIGN KEY(id_categorie) REFERENCES compta_categories(id),
    FOREIGN KEY(id_transaction) REFERENCES membres_transactions(id)
);

CREATE TABLE compta_ecritures
-- Ventilation des écritures
(
    id_operation INTEGER,
    id_compte TEXT,

    montant REAL,
    position INTEGER DEFAULT 1, -- 1 = gauche, 2 = droite

    FOREIGN KEY(id_compte) REFERENCES compta_comptes(id),
    FOREIGN KEY(id_operation) REFERENCES compta_operations(id)
);

-- Tester si une opération est équilibrée :
-- SELECT (SELECT SUM(montant) FROM compta_ecritures WHERE id_operation = ? AND position = 1) 
--    - (SELECT SUM(montant) FROM compta_ecritures WHERE id_operation = ? AND position = 2)

-- Récupérer le solde d'un compte :
-- SELECT (SELECT SUM(montant) FROM compta_ecritures WHERE id_compte = ? AND position = 1) 
--    - (SELECT SUM(montant) FROM compta_ecritures WHERE id_compte = ? AND position = 2)