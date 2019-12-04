/**
 * Created by Cap Adresse on 05/11/2014.
 *
 * Pour plus de sécurité
 * On englobe l'application dans une fonction anonyme qui s'execute immédiatement
 * Elle prend en paramètre l'objet jQuery pour pouvoir utiliser le symbole "$" sans risque de conflit
 *
 * @param  {object} $ Objet jQuery permettant ainsi d'éviter les conflits avec l'utilisation du "$"
 * @return {void}
 */
(function($) {

/**
 * Objet contenant les fonctions / variables pour Cap Saisie FR
 * @type {object}
 */
Cap.SaisieFR = Cap.SaisieFR || {};

/**
 * Simple chaîne de caractère contenant le numéro de version
 * @type {string}
 */
Cap.SaisieFR.version = "2.0.2";

/**
 * Permet de savoir si la solution a été initialisée
 * @type {boolean}
 */
Cap.SaisieFR.isSolution = false;

/**
 * Options par défaut
 * @type {object}
 */
Cap.SaisieFR.defaults = {
    // Gestion des messages d'erreur
    errorMessages: {
        // Pour afficher les messages d'erreur lors de la Saisie
        showMessage: true,
        // Positionne le message d'erreur au dessus ou en dessous de l'input text (2 valeurs : "top" || "bottom")
        position: "top"
    },

    // Les identifiants des champs sont nécessaires pour pouvoir les récupérer via jQuery et activer l'autocomplétion
    // ID de la div qui contiendra le formulaire de l'adresse (si celui-ci est chargé en Ajax)
    divContent_ID: "",
    // ID du champ Code Qualité Adresse
    cqa_ID: "",
    // ID de la liste déroulante des pays
    countriesDropD_ID: "country",
    // ID du champ du code INSEE
    zipId_ID: "",
    // ID du champ du matricule de voie
    streetId_ID: "",
    // ID du champ du code hexaclé du numéro de voie
    numId_ID: "",
    // ID du champ code postal / localité (s'il n'y a qu'un seul champ)
    zipcity_ID: "",
    // ID du champ code postal (si les champs sont séparés)
    zip_ID: "zip",
    // ID du champ localité (si les champs sont séparés
    city_ID: "city",
    // ID du champ lieudit
    province_ID: "province",
    // ID du champ voie
    street_ID: "street",
    // ID du champ numéro de voie
    num_ID: "street_number",
    // ID du champ du 1er complément d'adresse (bâtiment, résidence, etc.)
    add1_ID: "",
    // ID du champ du 2ème complément d'adrese (appartement, étage, etc.)
    add2_ID: ""
};

/**
 * Objet où seront stockés les différents champs (via jQuery)
 * C'est grâce à ces éléments qu'on pourra activer l'autocomplétion
 * @type {object}
 */
Cap.SaisieFR.inputs = [{
    // Champ contenant la liste déroulante des pays pour envoyer le bon pays à Cap Saisie
    countriesDropD: "",
    // Div qui contiendra le formulaire de l'adresse (si celui-ci est chargé en Ajax)
    divContent: "",
    // Champ Code Qualité Adresse
    cqa: "",
    // Champ du code INSEE
    zipId: "",
    // Champ du matricule de voie
    streetId: "",
    // Champ du code hexaclé du numéro de voie
    numId: "",
    // Champ code postal / localité (s'il n'y a qu'un seul champ)
    zipcity: "",
    // Champ code postal (si les champs sont séparés)
    zip: "",
    // Champ localité (si les champs sont séparés
    city: "",
    // Champ lieudit
    province: "",
    // Champ voie
    street: "",
    // Champ numéro de voie
    num: "",
    // Champ du 1er complément d'adresse (bâtiment, résidence, etc.)
    add1: "",
    // Champ du 2ème complément d'adrese (appartement, étage, etc.)
    add2: ""
}];

/**
 * Permet de stocker l'appel Ajax et de le tuer pour éviter les appels multiples
 * @type {null}
 */
Cap.SaisieFR.appelAjax = null;

/**
 * Permet de ne pas de ne pas appeler la fonction validate en boucle
 * @type {boolean}
 */
Cap.SaisieFR.formValidated = [];
Cap.SaisieFR.validated = true;

Cap.SaisieFR.cqa = ["60"];

Cap.SaisieFR.settings = [];

Cap.SaisieFR.instance = 0;


/**
 * Objet contenant toutes les variables / fonctions concernant le couple code postal / localité
 * @type {object}
 */
Cap.SaisieFR.zipcity = Cap.SaisieFR.zipcity || {};
/**
 * Tableau contenant la liste des Code postaux/localités à afficher à l'utilisateur
 * @type {array}
 */
Cap.SaisieFR.zipcity.propositions = [];
/**
 * Objet contenant toutes les informations liées au couple Code postal/localité choisi par l'utilisateur
 * @type {object}
 */
Cap.SaisieFR.zipcity.propChoisie = [0];
/**
 * Permet de stocker l'appel Ajax et de le tuer pour éviter les appels multiples
 * @type {null}
 */
Cap.SaisieFR.zipcity.appelAjax = null;


/**
 * Objet contenant toutes les variables / fonctions concernant la voie
 * @type {object}
 */
Cap.SaisieFR.street = Cap.SaisieFR.street || {};
/**
 * Tableau contenant la liste des Voies à afficher à l'utilisateur
 * @type {array}
 */
Cap.SaisieFR.street.propositions = [];
/**
 * Objet contenant toutes les informations liées à la voie choisie par l'utilisateur
 * @type {object}
 */
Cap.SaisieFR.street.propChoisie = [];
/**
 * Permet de stocker l'appel Ajax et de le tuer pour éviter les appels multiples
 * @type {null}
 */
Cap.SaisieFR.street.appelAjax = null;


/**
 * Objet contenant toutes les variables / fonctions concernant le numéro de voie
 * @type {object}
 */
Cap.SaisieFR.num = Cap.SaisieFR.num || {};
/**
 * Tableau contenant la liste des Voies à afficher à l'utilisateur
 * @type {array}
 */
Cap.SaisieFR.num.propositions = [];
/**
 * Objet contenant toutes les informations liées au numéro choisi par l'utilisateur
 * @type {object}
 */
Cap.SaisieFR.num.propChoisie = [];
/**
 * Permet de savoir le numéro a déjà été testé ou non
 * @type {boolean}
 */
Cap.SaisieFR.num.dejaTeste = [false];
/**
 * Tableau contenant la saisie du champ complément
 * @type {array}
 */
Cap.SaisieFR.num.sNumIn = [];
/**
 * Permet de stocker l'appel Ajax et de le tuer pour éviter les appels multiples
 * @type {null}
 */
Cap.SaisieFR.num.appelAjax = null;


/**
 * Objet contenant toutes les variables / fonctions concernant le 1er complément d'adresse (bâtiment, résidence, etc.)
 * @type {object}
 */
Cap.SaisieFR.add1 = Cap.SaisieFR.add1 || {};
/**
 * Tableau contenant la liste des Compléments d'adresse à afficher à l'utilisateur
 * @type {array}
 */
Cap.SaisieFR.add1.propositions = [];
/**
 * Objet contenant toutes les informations liées au complément d'adresse choisi par l'utilisateur
 * @type {array}
 */
Cap.SaisieFR.add1.propChoisie = [];
/**
 * Tableau contenant la saisie du champ complément
 * @type {array}
 */
Cap.SaisieFR.add1.sInput = [];
/**
 * Permet de stocker l'appel Ajax et de le tuer pour éviter les appels multiples
 * @type {null}
 */
Cap.SaisieFR.add1.appelAjax = null;



/**
 * Initialisation de l'application
 * On récupère les champs du formulaire via leur ID
 *
 * @param  {object|array} settings Paramètres de l'utilisateur
 * @return {void}
 */
Cap.SaisieFR.init = function( settings ) {

    var _this = this,
        settingsLength = 1,
        i;

    Cap.SaisieFR.isSolution = true;

    if (!$.isArray(settings)) {
        _this.settings.push($.extend(true, _this.defaults, settings));
    }
    else {
        settingsLength = settings.length;
        $.each(settings, function(index, setting) {
            _this.settings.push($.extend(true, {}, _this.defaults, setting));
        });
    }

    for (i = 0; i < settingsLength; i++) {

        if (i > 0) {
            _this.inputs.push($.extend({}, _this.inputs[i - 1]));
        }

        $.each(_this.inputs[i], function(index) {
            // Récupération des différents inputs via jQuery
            _this.inputs[i][index] = document.getElementById(_this.settings[i][index+"_ID"]) !== null ? $("[id='"+_this.settings[i][index+"_ID"]+"']") : "";

            // On réinitialise toutes les données de chaque Champs
            if (Cap.Utils.nonDefini(_this[index]) !== "") {
                // On efface les propositions choisies
                if (Cap.Utils.nonDefini(_this[index].propChoisie) !== "") {
                    _this[index].propChoisie[i] = {};
                }
                // On efface les tableaux contenant les listes de propositions
                if (Cap.Utils.nonDefini(_this[index].propositions) !== "") {
                    _this[index].propositions = [];
                }
                // On réinitialise l'autocomplete
                if (Cap.Utils.nonDefini(_this[index].autocompleteInit) !== "") {
                    _this[index].autocompleteInit();
                }
            }
        });

        // On récupère l'insee s'il est présent
        if (_this.inputs[i].zipId !== "") {
            _this.zipcity.propChoisie[i].sInsee = _this.inputs[i].zipId.val();
        }
        // On récupère le matricule voie s'il est présent
        if (_this.inputs[i].streetId !== "") {
            _this.street.propChoisie[i].sMat = _this.inputs[i].streetId.val();
        }
        // On récupère le code hexaclé s'il est présent
        if (_this.inputs[i].numId !== "") {
            _this.num.propChoisie[i].sHcNum = _this.inputs[i].numId.val();
        }
    }
};



/**
 * Permet de réinitialiser les propositions choisies et les listes de propositions
 * Suivant l'étape dans laquelle on se trouve
 * @param {string} etape Etape dans laquelle on se trouve
 *                       Valeurs possibles : cploc | voie | num | l3
 */
Cap.SaisieFR.reset = function( etape ) {

    var _this = this,
        resetCQA = false,
        cqa = "60",
        instance = _this.instance;

    etape = Cap.Utils.nonDefini(etape).toLowerCase();

    if (etape == "cploc") {
        resetCQA = true;

        _this.zipcity.propChoisie[instance] = {};
        _this.zipcity.propositions = [];

        _this.street.propChoisie[instance] = {};
        _this.street.propositions = [];

        _this.num.propChoisie[instance] = {};
        _this.num.propositions = [];
    }
    else if (etape == "voie") {
        // On remet le code qualité par défaut
        cqa = "42";
        resetCQA = true;

        _this.street.propChoisie[instance] = {};
        _this.street.propositions = [];

        _this.num.propChoisie[instance] = {};
        _this.num.propositions = [];
    }
    else if (etape == "num") {
        // On remet le code qualité par défaut
        cqa = "53";
        resetCQA = true;

        _this.num.propChoisie[instance] = {};
        _this.num.propositions = [];

        // On détruit la liste, au cas où
        if (_this.inputs[instance].add1 !== "" && _this.inputs[instance].add1.hasClass("ui-autocomplete-input")) {
            _this.inputs[instance].add1.autocomplete("destroy");
        }
    }
    else if (etape == "l3") {
        _this.add1.propChoisie[instance] = {};
        _this.add1.propositions = [];
    }

    if (resetCQA) {
        _this.majCQA(cqa);
    }
};

/**
 * Permet de placer le focus sur le champ suivant
 *
 * @param  {object}  jQinput Input récupéré via $(".class") | $("#id") | $(this)
 * @return {void}
 */
Cap.SaisieFR.putFocusOnNextInput = function( jQinput ) {

    var _this = this,
        instance = _this.instance,
        inputs = _this.inputs[instance],
        settings = _this.settings[instance],
        $input = Cap.Utils.nonDefini(jQinput),
        currentID = Cap.Utils.inputExists($input) ? $input.attr("id") : "",
        $nextInput;

    if (currentID == settings.zipcity_ID || currentID == settings.zip_ID || currentID == settings.city_ID) {

        if (Cap.Utils.inputExists(inputs.street)) {
            $nextInput = inputs.street;
        }
        else if (Cap.Utils.inputExists(inputs.num)) {
            $nextInput = inputs.num;
        }
        else if (Cap.Utils.inputExists(inputs.add1)) {
            $nextInput = inputs.add1;
        }
        else if (Cap.Utils.inputExists(inputs.add2)) {
            $nextInput = inputs.add2;
        }
        else {
            $nextInput = $(":input:eq(" + ($(":input").index($input) + 1) + ")");
        }
    }
    else if (currentID == settings.street_ID) {

        if (Cap.Utils.inputExists(inputs.num)) {
            $nextInput = inputs.num;
        }
        else if (Cap.Utils.inputExists(inputs.add1)) {
            $nextInput = inputs.add1;
        }
        else if (Cap.Utils.inputExists(inputs.add2)) {
            $nextInput = inputs.add2;
        }
        else {
            $nextInput = $(":input:eq(" + ($(":input").index($input) + 1) + ")");
        }
    }
    else if (currentID == settings.num_ID) {

        if (Cap.Utils.inputExists(inputs.add1)) {
            $nextInput = inputs.add1;
        }
        else if (Cap.Utils.inputExists(inputs.add2)) {
            $nextInput = inputs.add2;
        }
        else {
            $nextInput = $(":input:eq(" + ($(":input").index($input) + 1) + ")");
        }
    }
    else if (currentID == settings.add1_ID) {

        if (Cap.Utils.inputExists(inputs.add2)) {
            $nextInput = inputs.add2;
        }
        else {
            $nextInput = $(":input:eq(" + ($(":input").index($input) + 1) + ")");
        }
    }

    if (Cap.Utils.inputExists($nextInput) && ($nextInput.attr("type") == "text" || $nextInput.attr("type") == "password" || $nextInput.attr("type") == "tel" || $nextInput.attr("type") == "email")) {
        $nextInput.focus();
    }
};

/**
 * Permet de détruire les listes de jQuery-UI autocomplete
 *
 * @param  {string} etape Etape dans laquelle on se trouve pour savoir quelles listes ont doit détruire
 * @return {void}
 */
Cap.SaisieFR.destroyAutocomplete = function( etape ) {

    var _this = this,
        instance = _this.instance,
        inputs = _this.inputs[instance];

    etape = Cap.Utils.nonDefini(etape);

    if (etape == "cploc") {
        // On détruit les listes, au cas où
        if (inputs.street !== "" && inputs.street.hasClass("ui-autocomplete-input")) {
            inputs.street.autocomplete("destroy");
        }

        if (inputs.num !== "" && inputs.num.hasClass("ui-autocomplete-input")) {
            inputs.num.autocomplete("destroy");
        }

        if (inputs.add1 !== "" && inputs.add1.hasClass("ui-autocomplete-input")) {
            inputs.add1.autocomplete("destroy");
        }
    }
    else if (etape == "voie") {
        // On détruit les listes, au cas où
        if (inputs.num !== "" && inputs.num.hasClass("ui-autocomplete-input")) {
            inputs.num.autocomplete("destroy");
        }

        if (inputs.add1 !== "" && inputs.add1.hasClass("ui-autocomplete-input")) {
            inputs.add1.autocomplete("destroy");
        }
    }
    else if (etape == "num") {
        // On détruit la liste, au cas où
        if (inputs.add1 !== "" && inputs.add1.hasClass("ui-autocomplete-input")) {
            inputs.add1.autocomplete("destroy");
        }
    }
};

/**
 * Appel de SearchHP (pour récupération de la localité)
 *
 * @param  {object} jQinput Champ input dans lequel on se trouve
 *                          Valeur de type : $("#id_input") | $(".class_input") | $(this)
 * @param  {object} event   Touche appuyée
 * @return {void}
 */
Cap.SaisieFR.zipcity.search = function( event, jQinput ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        toucheSaisie = Cap.Utils.getTouche(event),
        sInput = "";

    Cap.SaisieFR.destroyAutocomplete("cploc");

    // Lancement du traitement uniquement si c'est une touche valide (voir la fonction pour plus de détails sur les touches autorisées)
    if (Cap.Utils.toucheAutorisee(toucheSaisie)) {

        // On re-initialise les variables car on modifie un cp loc qui a déjà été validé
        Cap.SaisieFR.reset("cploc");

        // Si on arrive ici, c'est qu'on saisit une nouvelle adresse donc il faudra appeler ValideFormulaireCS
        Cap.SaisieFR.validated = false;

        // Si le champ Lieu-dit existe, on le vide
        if (Cap.Utils.inputExists(inputs.province)) {
            inputs.province.val("");
        }

        // Si le champ cp / Loc n'est qu'un seul champ
        if (Cap.Utils.inputExists(inputs.zipcity)) {
            sInput = Cap.Utils.getInputValue(inputs.zipcity);
        }
        // Sinon, les champs cp et Loc sont deux champs séparés
        else {
            sInput = Cap.Utils.getInputValue(jQinput);

            // On a saisi dans le champ cp
            if (inputs.zip.prop("id") === jQinput.prop("id")) {
                inputs.city.val("");
            }
            // On a saisi dans le champ Loc
            else if (inputs.city.prop("id") === jQinput.prop("id")) {
                inputs.zip.val("");
            }
        }

        if (sInput === "") {

            // Suppression du message d'erreur
            // Si le champ cp / Loc n'est qu'un seul champ
            if (Cap.Utils.inputExists(inputs.zipcity)) {
                Cap.Utils.afficherMessage(inputs.zipcity);
            }
            // Sinon, les champs cp et Loc sont deux champs séparés
            else {
                // On est dans le champ cp
                if (inputs.zip.prop("id") === jQinput.prop("id")) {
                    Cap.Utils.afficherMessage(inputs.zip);
                }
                // On est dans le champ Loc
                else if (inputs.city.prop("id") === jQinput.prop("id")) {
                    Cap.Utils.afficherMessage(inputs.city);
                }
            }

            _this.propositions = [];
            _this.autocompleteInit();
        }
        else {

            Cap.Utils.abortAjaxRequest(_this.appelAjax);

            // Appel ajax (via jQuery)
            _this.appelAjax = $.ajax({
                dataType: "json",
                url: capSaisieFRPath + "search",
                data: {
                    request: "cploc",
                    showMessage: settings.errorMessages.showMessage,
                    countryCode: Cap.Utils.countryCode[instance],
                    params: {
                        sInput: sInput
                    }
                }
            }).done(function(data) {
                _this.list(data);
            }).always(function() {
                _this.appelAjax = null;
            });
        }
    }
};

/**
 * Affiche la liste des propositions, en cas de succès à l'appel
 * Pour les localités
 *
 * @param  {object} response Objet JSON renvoyé par la fonction SearchHP
 * @return {void}
 */
Cap.SaisieFR.zipcity.list = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le code retour de la fonction
        iRet = parseInt(response.iRet),
        jQinput = "",
        Hp = "",
        valeur = "",
        proposition = {};

    if (Cap.Utils.inputExists(inputs.zipcity)) {
        jQinput = inputs.zipcity;
    }
    else if (Cap.Utils.inputExists(inputs.zip) && inputs.zip.is(":focus")) {
        jQinput = inputs.zip;
    }
    else if (Cap.Utils.inputExists(inputs.city) && inputs.city.is(":focus")) {
        jQinput = inputs.city;
    }

    // Affichage du message d'erreuro
    if (iRet > 0 && settings.errorMessages.showMessage && Cap.Utils.inputExists(jQinput)) {
        Cap.Utils.afficherMessage(jQinput, Cap.Utils.nonDefini(response.message), settings.errorMessages.position);
    }
    // Suppression du message d'erreur
    else if (iRet === 0 && Cap.Utils.inputExists(jQinput)) {
        Cap.Utils.afficherMessage(jQinput);
    }

    _this.propositions = [];

    if (Cap.Utils.nonDefini(response.ptrTabHp) !== "" && Cap.Utils.nonDefini(response.ptrTabHp.Hp) !== "") {

        $.each(response.ptrTabHp.Hp, function(index, value) {
            Hp = value;
            valeur = _this.afficherProposition(Hp);
            proposition = {
                value: valeur,
                label: valeur,
                Hp: Hp
            };

            _this.propositions.push(proposition);
        });
    }

    if (Cap.Utils.inputExists(jQinput)) {
        _this.autocompleteInit();
        jQinput.autocomplete("search", "");
    }
};

/**
 * Affichage dans la liste des propositions
 *
 * @param  {object} Hp Objet contenant toutes les informations renvoyé par SearchHP
 * @return {string}          Chaîne de caractère à afficher à l'utilisateur (dans la liste)
 */
Cap.SaisieFR.zipcity.afficherProposition = function( Hp ) {

    var prop = "",
        iType = parseInt(Hp.iType),
        sCp = Cap.Utils.nonDefini(Hp.sCp),
        sLoc = Cap.Utils.nonDefini(Hp.sLoc),
        sLieuDit = Cap.Utils.nonDefini(Hp.sLieuDit);

    // Affichage en fonction de iType
    if (iType === 0 || iType === 3) {
        prop += sCp;
        prop += (prop !== "") ? " " : "";
        prop += sLoc;
    }
    else if (iType === 1) {
        prop += sCp;
        prop += (prop !== "") ? " " : "";
        prop += sLieuDit;
    }
    else if (iType === 2) {
        prop += sCp;
        prop += (prop !== "") ? " " : "";
        prop += sLoc;
        prop += (prop !== "") ? " " : "";
        prop += (sLieuDit !== "") ? "(" + sLieuDit + ")" : "";
    }

    return prop;
};

/**
 * Fonction appelée lorsqu'on choisit une proposition de localité
 *
 * @param  {object}  Hp    Objet contenant toutes les informations de la localité sélectionnée
 * @param  {object}  event Touche appuyée lors du choix
 * @return {boolean}
 */
Cap.SaisieFR.zipcity.choisirProposition = function( Hp, event ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le lieudit choisi (pour plus de simplicité et n'appeler Cap.Utils.nonDefini qu'une seule fois)
        sLieuDit = Cap.Utils.nonDefini(Hp.sLieuDit),
        // On récupère le iType (même raison que pour le lieudit)
        iType = parseInt(Hp.iType),
        // On positionne le CQA à 60 (on le mettra à jour en fonction du iType)
        cqa = "60",
        cploc = "",
        jQinput = "";

    // Suppression du message d'erreur et remplissage des champs
    // Si le champ CP / Loc n'est qu'un seul champ
    if (Cap.Utils.inputExists(inputs.zipcity)) {
        // On supprime le message du champ CPLOC
        Cap.Utils.afficherMessage(inputs.zipcity);

        // Récupération du CP
        cploc = Cap.Utils.nonDefini(Hp.sCp);

        // Ajout de la localité
        if (Cap.Utils.nonDefini(Hp.sLoc) !== "") {
            cploc += (cploc !== "") ? " " : "";
            cploc += Hp.sLoc;
        }

        // Ajout du lieudit si le champ lieudit n'existe pas et que si le iType != 0 (même si le champ Lieudit est renseigné)
        if (!Cap.Utils.inputExists(inputs.province) && iType !== 0 && sLieuDit !== "") {
            cploc += (cploc !== "") ? " " : ""
            cploc += "(" + sLieuDit + ")";
        }

        inputs.zipcity.val(cploc);
    }
    // Sinon, les champs CP et Loc sont deux champs séparés
    else {

        if (Cap.Utils.inputExists(inputs.zip)) {
            // On supprime le message du champ CP
            Cap.Utils.afficherMessage(inputs.zip);

            inputs.zip.val(Cap.Utils.nonDefini(Hp.sCp));
        }

        if (Cap.Utils.inputExists(inputs.city)) {
            // On supprime le message du champ Loc
            Cap.Utils.afficherMessage(inputs.city);

            // Récupération de la localité
            cploc = Cap.Utils.nonDefini(Hp.sLoc);

            // Ajout du lieudit si le champ lieudit n'existe pas et que si le iType != 0 (même si le champ Lieudit est renseigné)
            if (!Cap.Utils.inputExists(inputs.province) && iType !== 0 && sLieuDit !== "") {
                cploc += (cploc !== "") ? " " : ""
                cploc += "(" + sLieuDit + ")";
            }

            inputs.city.val(cploc);
        }
    }

    /**
     * On place le lieudit dans le champ "Service distribution/lieu-dit", s'il existe
     * Et que si le iType != 0 (même si le champ Lieudit est renseigné)
     */
    if (Cap.Utils.inputExists(inputs.province) && iType !== 0 && sLieuDit !== "") {
        inputs.province.val(sLieuDit);
    }

    _this.propChoisie[instance] = Hp;

    // S'il y a un champ insee on enregistre le code INSEE
    if (Cap.Utils.inputExists(inputs.zipId)) {
        inputs.zipId.val(Cap.Utils.nonDefini(_this.propChoisie[instance].sInsee));
    }

    // cploc validé (mais encore aucune info pour voie et numéro de voie). Code qualité à 42 sauf si iType = 3 (CEDEX non attribué ou ARMEES)
    if (iType === 3) {
        cqa = "00";
    }
    else {
        cqa = "42";
    }

    Cap.SaisieFR.majCQA(cqa);

    if (Cap.Utils.nonDefini(event) !== "") {
        event.preventDefault();
    }

    /**
     * On récupère l'input sur lequel on est
     * Pour pouvoir placer le focus sur le bon champ
     */
    // S'il n'y a qu'un seul champ pour le couple code postal / localité
    if (Cap.Utils.inputExists(inputs.zipcity)) {
        jQinput = inputs.zipcity;
    }
    // Sinon, ce sont deux champs séparés
    else {
        // Si le champ code postal existe et qu'il a le focus alors on le récupère
        if (Cap.Utils.inputExists(inputs.zip) && inputs.zip.is(":focus")) {
            jQinput = inputs.zip;
        }

        // Si le champ ville existe et qu'il a le focus alors on le récupère
        if (Cap.Utils.inputExists(inputs.city) && inputs.city.is(":focus")) {
            jQinput = inputs.city;
        }
    }

    // Si le champ existe, on place le focus sur le suivant
    if (Cap.Utils.inputExists(jQinput)) {
        Cap.SaisieFR.putFocusOnNextInput(jQinput);
    }

    return false;
}

/**
 * Initialisation des listes de propositions de CP / Localités qui s'affichent sous les input text (grace à jQueryUI)
 */
Cap.SaisieFR.zipcity.autocompleteInit = function() {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // Création des options qu'on va envoyé à la fonction autocomplete de jQuery UI
        options = {
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet de lancer la recherche à la main, sans critères
            minLength: 0,
            // Permet d'annuler le changement du input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'un cp/loc
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.Hp, event);
                }

                return false;
            }
        };

    // Si le champ cp / loc n'est qu'un seul champ
    if (Cap.Utils.inputExists(inputs.zipcity)) {
        inputs.zipcity.autocomplete(options);
    }
    // Sinon, les champs cp et loc sont deux champs séparés
    else {

        if (Cap.Utils.inputExists(inputs.zip)) {
            inputs.zip.autocomplete(options);
        }

        if (Cap.Utils.inputExists(inputs.city)) {
            inputs.city.autocomplete(options);
        }
    }
};

/**
 * Permet de récupérer la variable iType
 *
 * @param  {integer} instance Instance dans laquelle on se trouve
 * @return {integer}          iType récupéré
 */
Cap.SaisieFR.zipcity.getIType = function( instance ) {

    var _this = this,
        instance = Cap.Utils.isNum(instance) ? parseInt(instance) : 0,
        propChoisie = _this.propChoisie[instance],
        iType = 3;

    if (Cap.Utils.isNum(propChoisie.iType)) {
        iType = parseInt(propChoisie.iType);
    }
    else if (Cap.Utils.nonDefini(propChoisie.sInsee) !== "") {
        iType = 0;
    }

    return iType;
};



/**
 * Appel de SearchVOIE (pour récupérer la voie)
 *
 * @param  {object} event Touche appuyée
 * @return {void}
 */
Cap.SaisieFR.street.search = function( event, checkStreet ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère la valeur du champ voie
        sInput = Cap.Utils.getInputValue(inputs.street),
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance]),
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        sCp = "",
        // On récupère le code INSEE choisi
        sInsee = Cap.Utils.nonDefini(zipcityPropChoisie.sInsee),
        toucheSaisie = Cap.Utils.getTouche(event);

    Cap.SaisieFR.destroyAutocomplete("voie");

    if (Cap.Utils.nonDefini(checkStreet) === "") {
        checkStreet = false;
    }

    // Lancement du traitement uniquement si ce n'est pas une flèche qui a été saisie, ou Echap... et que si la localité possède des voies
    if (Cap.Utils.toucheAutorisee(toucheSaisie) && iType !== 3 && sInsee !== "") {
        // On re-initialise les objets dans le cas où on modifie une voie qui a déjà été validée
        Cap.SaisieFR.reset("voie");

        if (sInput === "") {
            // Suppression du message d'erreur
            Cap.Utils.afficherMessage(inputs.street);

            _this.propositions = [];
            _this.autocompleteInit();
        }
        else {

            if (Cap.Utils.nonDefini(zipcityPropChoisie.sCp) !== "") {
                sCp = zipcityPropChoisie.sCp;
            }
            else if (inputs.zip !== "") {
                sCp = inputs.zip.val();
            }

            sInsee += sCp;

            Cap.Utils.abortAjaxRequest(_this.appelAjax);

            // Appel ajax (via jQuery)
            _this.appelAjax = $.ajax({
                dataType: "json",
                url: capSaisieFRPath + "search",
                data: {
                    request: "voie",
                    showMessage: settings.errorMessages.showMessage,
                    countryCode: Cap.Utils.countryCode[instance],
                    params: {
                        sInput: sInput,
                        sInsee: sInsee,
                        iType: iType
                    }
                }
            }).done(function(data) {
                if (checkStreet) {
                    _this.check(data);
                }
                else {
                    _this.list(data);
                }
            }).always(function(data) {
                _this.appelAjax = null;
            });
        }
    }
};

Cap.SaisieFR.street.check = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance]),
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // On récupère le code retour de la fonction
        iRet = parseInt(response.iRet),
        jQinput = inputs.street,
        Hv;

    // Affichage du message d'erreur
    if (iRet > 0 && Cap.Utils.inputExists(jQinput)) {
        jQinput.val("");
    }
    else if (iRet === 0 && Cap.Utils.inputExists(jQinput)) {
        // Suppression du message d'erreur
        Cap.Utils.afficherMessage(jQinput);

        if (Cap.Utils.nonDefini(response.ptrTabHv) !== "" && Cap.Utils.nonDefini(response.ptrTabHv.Hv) !== "") {

            if (response.ptrTabHv.Hv.length === 1) {

                $.each(response.ptrTabHv.Hv, function(index, value) {
                    Hv = value;

                    if (Cap.Utils.nonDefini(Hv.sCp) == Cap.Utils.nonDefini(zipcityPropChoisie.sCp)) {

                        if (Cap.Utils.nonDefini(Hv.sMat) !== "") {
                            _this.choisirProposition(Hv, $.Event("click"));
                        }
                    }
                    else if (iType !== 2 && iType !== 3) {
                        jQinput.val("");
                    }
                });
            }
            else {
                jQinput.val("");
            }
        }
    }
};

/**
 * Affiche la liste des propositions, en cas de succès à l'appel
 * Pour les voies
 *
 * @param  {object} response Objet JSON renvoyé par SearchVOIE
 * @return {void}
 */
Cap.SaisieFR.street.list = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les paramètres
        settings = Cap.Utils.nonDefini(Cap.SaisieFR.settings[instance]),
        // On récupère le champ voie
        jQinput = Cap.SaisieFR.inputs[instance].street,
        // On récupère le code retour de la fonction
        iRet = parseInt(response.iRet),
        Hv = "",
        valeur = "",
        proposition = {};

    // Affichage du message d'erreur
    if (iRet > 0 && settings.errorMessages.showMessage && Cap.Utils.inputExists(jQinput)) {
        Cap.Utils.afficherMessage(jQinput, Cap.Utils.nonDefini(response.message), settings.errorMessages.position);
    }
    // Suppression du message d'erreur
    else if (iRet === 0 && Cap.Utils.inputExists(jQinput)) {
        Cap.Utils.afficherMessage(jQinput);
    }

    _this.propositions = [];

    if (Cap.Utils.nonDefini(response.ptrTabHv) !== "" && Cap.Utils.nonDefini(response.ptrTabHv.Hv) !== "") {

        $.each(response.ptrTabHv.Hv, function(index, value) {

            Hv = value;
            valeur = _this.afficherProposition(Hv);
            proposition = {
                value: valeur,
                label: valeur,
                Hv: Hv
            };

            _this.propositions.push(proposition);
        });
    }

    if (Cap.Utils.inputExists(jQinput)) {
        _this.autocompleteInit();
        jQinput.autocomplete("search", "");
    }
};

/**
 * Affichage de la voie dans la liste des propositions
 *
 * @param  {object} Hv Objet contenant toutes les informations de la voie sélectionnée
 * @return {string}    Ligne à afficher dans la liste déroulante
 */
Cap.SaisieFR.street.afficherProposition = function( Hv ) {

    var instance = Cap.SaisieFR.instance,
        // On récupère la proposition choisie du cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        ligne4 = "",
        cploc = "";

    if (Cap.Utils.nonDefini(Hv.sOldL4) !== "") {

        if (Cap.Utils.convertsTypeV(Hv.sTypeV) == "$") {
            ligne4 = Hv.sOldL4 + " (ANCIENNE VOIE)";
        }
        else if (Cap.Utils.convertsTypeV(Hv.sTypeV) == "%") {
            ligne4 = Cap.Utils.nonDefini(Hv.sL4) + " (ANCIENNEMENT " + Hv.sOldL4 + ")";
        }
        else if (Cap.Utils.convertsTypeV(Hv.sTypeV) == "§") {
            ligne4 = Hv.sOldL4 + " (ANCIEN SYNONYME)";
        }
        else {
            ligne4 = Hv.sOldL4 + " (DENOMINATION USUELLE)";
        }
    }
    else {
        ligne4 = Cap.Utils.nonDefini(Hv.sL4);
    }

    // Si jamais le Code postal et/ou la localité est différent de celui qui a été choisi à l'étape précédente
    if (Cap.Utils.nonDefini(Hv.sCp) !== "" && Cap.Utils.nonDefini(Hv.sCp) !== Cap.Utils.nonDefini(zipcityPropChoisie.sCp)) {
        cploc += " (" + Hv.sCp;
    }

    if (Cap.Utils.nonDefini(Hv.sLoc) !== "" && Cap.Utils.nonDefini(Hv.sLoc) !== Cap.Utils.nonDefini(zipcityPropChoisie.sLoc)) {
        cploc += (cploc !== "") ? " " + Hv.sLoc : " (" + Hv.sLoc;
    }
    else if (Cap.Utils.nonDefini(Hv.sLieuDit) !== "" && Cap.Utils.nonDefini(Hv.sLieuDit) !== Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit)) {
        cploc += (cploc !== "") ? " " + Hv.sLieuDit : " (" + Hv.sLieuDit;
    }

    if (cploc !== "") {
        cploc += ")";
    }

    ligne4 += cploc;

    return ligne4;
};

/**
 * Fonction appelée lorsqu'on choisit une proposition de voie
 *
 * @param  {object}  Hv    Objet contenant toutes les informations de la voie sélectionnée
 * @param  {object}  event Touche appuyée lors du choix
 * @return {boolean}
 */
Cap.SaisieFR.street.choisirProposition = function( Hv, event ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le champ voie
        jQinput = Cap.SaisieFR.inputs[instance].street,
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // Variable contenant ce qu'on doit afficher dans le champs cploc (ou loc si les champs sont séparés)
        cploc = "",
        // Variable contenant ce qu'on doit afficher dans le champs voie
        voie = "",
        // On récupère le numéro qui a été saisi soit via le champ Numéro soit via ce qui a été récupéré grâce à SearchVOIE
        sNumIn = "";

    // Suppression du message d'erreur
    Cap.Utils.afficherMessage(jQinput);

    // On vide le champ voie pour le re-remplir après avec les bonnes valeurs
    jQinput.val("");

    /**
     * S'il y a un champ Numéro alors on ne remplit que le champ voie
     * Le champ numéro sera rempli dans la fonction Cap.SaisieFR.num.choisirProposition
     */
    if (Cap.Utils.inputExists(inputs.num)) {
        voie = Cap.Utils.nonDefini(Hv.sL4);
    }
    else {

        if (Cap.Utils.nonDefini(Hv.sNum) !== "") {
            voie = Cap.SaisieFR.num.afficherProposition(Hv.sNum, Cap.Utils.nonDefini(Hv.sCpl));
        }

        if (Cap.Utils.nonDefini(Hv.sL4) !== "") {
            voie += (voie !== "") ? " ": "";
            voie += Hv.sL4;
        }
    }

    jQinput.val(voie);

    // Ajout de l'ancienne dénomination de voie dans le champ Complément (s'il existe)
    if (Cap.Utils.inputExists(inputs.add1) && Cap.Utils.convertsTypeV(Hv.sTypeV) == "§") {
        inputs.add1.val(Cap.Utils.nonDefini(Hv.sOldL4));
    }

    if (iType < 2) {
        // Si le CP est différent de celui préalablement choisi
        if (Cap.Utils.nonDefini(Hv.sCp) !== "" && Hv.sCp !== Cap.Utils.nonDefini(zipcityPropChoisie.sCp)) {
            // On sauvegarde le nouveau Code Postal
            Cap.SaisieFR.zipcity.propChoisie[instance].sCp = Hv.sCp;
        }

        // Si la LOC est différente de celle préalablement choisie
        if (Cap.Utils.nonDefini(Hv.sLoc) !== "" && Hv.sLoc !== Cap.Utils.nonDefini(zipcityPropChoisie.sLoc)) {
            // On sauvegarde la nouvelle localité
            Cap.SaisieFR.zipcity.propChoisie[instance].sLoc = Hv.sLoc;
        }

        // Si le lieudit est différent de celui préalablement choisi
        if (Cap.Utils.nonDefini(Hv.sLieuDit) !== "" && Hv.sLieuDit !== Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit)) {
            // On sauvegarde le nouveau lieudit
            Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit = Hv.sLieuDit;
        }

        /**
         * On rerécupère la proposition choisie
         * Pour que les prochains tests se fasse sur cette variable
         *     et non pas sur Cap.SaisieFR.zipcity.propChoisie[instance] qui est trop longue
         */
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance];
    }

    /**
     * On ne fait la modification que si un numéro n'a pas été saisi
     * Sinon, le code postal peut changer deux fois et il y a comme un "flash"
     * Idem pour le lieudit
     */
    if (Cap.Utils.nonDefini(Hv.sNum) === "") {
        // On modifie le formulaire en conséquence

        // Si le champ CP / Loc n'est qu'un seul champ
        if (Cap.Utils.inputExists(inputs.zipcity)) {
            // On récupère le cp
            cploc = Cap.Utils.nonDefini(zipcityPropChoisie.sCp);

            // On ajoute la localité
            if (Cap.Utils.nonDefini(zipcityPropChoisie.sLoc) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += zipcityPropChoisie.sLoc;
            }

            // Si le champ Lieu-dit n'existe pas et que le Lieu-dit est renseigné
            if (!Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += "(" + zipcityPropChoisie.sLieuDit + ")";
            }

            if (cploc !== "") {
                inputs.zipcity.val(cploc);
            }
        }
        // Sinon, les champs CP et Loc sont deux champs séparés
        else {

            if (Cap.Utils.inputExists(inputs.zip) && Cap.Utils.nonDefini(zipcityPropChoisie.sCp) !== "") {
                inputs.zip.val(zipcityPropChoisie.sCp);
            }

            // On récupère la localité
            cploc = Cap.Utils.nonDefini(zipcityPropChoisie.sLoc);

            // Si le champ Lieu-dit n'existe pas et que le Lieu-dit est renseigné
            if (!Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += "(" + zipcityPropChoisie.sLieuDit + ")";
            }

            if (Cap.Utils.inputExists(inputs.city) && cploc !== "") {
                inputs.city.val(cploc);
            }
        }

        // On remplace le lieudit s'il existe et qu'il y a un champ lieudit sur le fomulaire
        if (Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit) !== "") {
            inputs.province.val(zipcityPropChoisie.sLieuDit);
        }
    }

    _this.propChoisie[instance] = Hv;

    // S'il y a un champ matricule voie on enregistre le matricule de voie
    if (Cap.Utils.inputExists(inputs.streetId)) {
        inputs.streetId.val(Cap.Utils.nonDefini(_this.propChoisie[instance].sMat));
    }

    // Voie validée. Donc cploc également (mais encore aucune info pour numéro de voie). Code qualité à 53
    Cap.SaisieFR.majCQA("53");

    if (Cap.Utils.nonDefini(Hv.sNum) !== "" || !Cap.Utils.inputExists(inputs.num)) {

        // On récupère le numéro pour l'envoyer à IsNumExist
        sNumIn = Cap.SaisieFR.num.afficherProposition(Cap.Utils.nonDefini(Hv.sNum), Cap.Utils.nonDefini(Hv.sCpl));

        /**
         * Si le champ numéro existe, on considère que la voie est valide
         * Donc on enlève le message d'erreur ou on met un contour vert autour du champ
         */
        if (Cap.Utils.inputExists(inputs.num)) {

            inputs.num.val(sNumIn);

            // Suppression du message d'erreur
            if (settings.errorMessages.showMessage) {
                Cap.Utils.afficherMessage(jQinput);
            }
        }

        if (Cap.Utils.nonDefini(event) !== "") {
            event.preventDefault();
        }

        /**
         * Test que le numéro existe dans la voie
         * On déplace le focus sur un objet neutre (pour pouvoir le remettre ensuite sur le bon champ en fonction du résultat de IsNumExist)
         */
        if (Cap.Utils.inputExists(inputs.add2)) {
            inputs.add2.focus();
        }

        Cap.Utils.abortAjaxRequest(_this.appelAjax);

        _this.appelAjax = $.ajax({
            dataType: "json",
            url: capSaisieFRPath + "search",
            data: {
                request: "numexist",
                showMessage: settings.errorMessages.showMessage,
                countryCode: Cap.Utils.countryCode[instance],
                params: {
                    sNumIn: sNumIn,
                    sInsee: Cap.Utils.nonDefini(zipcityPropChoisie.sInsee),
                    sMat: Cap.Utils.nonDefini(Cap.SaisieFR.street.propChoisie[instance].sMat)
                }
            }
        }).done(function(data) {
            Cap.SaisieFR.num.validate(data);
        }).always(function() {
            _this.appelAjax = null;
        });
    }
    else {
        // Suppression du message d'erreur
        if (settings.errorMessages.showMessage) {
            Cap.Utils.afficherMessage(jQinput);
        }

        if (Cap.Utils.nonDefini(event) !== "") {
            event.preventDefault();
        }

        Cap.SaisieFR.putFocusOnNextInput(jQinput);
    }

    return false;
};

/**
 * Intialisation des listes de propositions de voies qui s'affichent sous les input text (grace à jQueryUI)
 */
Cap.SaisieFR.street.autocompleteInit = function() {

    var _this = this,
        instance = Cap.SaisieFR.instance,
        jQinput = Cap.Utils.nonDefini(Cap.SaisieFR.inputs[instance].street);

    if (Cap.Utils.inputExists(jQinput)) {
        jQinput.autocomplete({
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet de lancer la recherche à la main, sans critères
            minLength: 0,
            // Permet d'annuler le changement du input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'une voie
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.Hv, event);
                }

                return false;
            }
        });
    }
};



/**
 * Appel de SearchNum (pour récupérer le numéro de voie)
 *
 * @param  {object} event Touche saisie par l'utilisateur
 * @return {void}
 */
Cap.SaisieFR.num.search = function( event ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        // On récupère le code INSEE
        sInsee = Cap.Utils.nonDefini(zipcityPropChoisie.sInsee),
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // On récupère la proposition choisie pour la voie
        streetPropChoisie = Cap.SaisieFR.street.propChoisie[instance],
        // On récupère le matricule de voie
        sMat = Cap.Utils.nonDefini(streetPropChoisie.sMat),
        toucheSaisie = Cap.Utils.getTouche(event);

    Cap.SaisieFR.destroyAutocomplete("num");

    // Lancement du traitement uniquement si ce n'est pas une flèche qui a été saisie, ou Echap... et que si la localité possède des voies
    if (Cap.Utils.toucheAutorisee(toucheSaisie) && iType !== 3 && sInsee !== "" && sMat !== "") {

        Cap.SaisieFR.reset("num");

        Cap.SaisieFR.num.sNumIn[instance] = Cap.SaisieFR.inputs[instance].num.val();

        Cap.Utils.abortAjaxRequest(_this.appelAjax);

        _this.appelAjax = $.ajax({
            dataType: "json",
            url: capSaisieFRPath + "search",
            data: {
                request: "num",
                showMessage: settings.errorMessages.showMessage,
                countryCode: Cap.Utils.countryCode[instance],
                params: {
                    sNumIn: Cap.SaisieFR.num.sNumIn[instance],
                    sInsee: sInsee,
                    sMat: sMat,
                    iType: iType
                }
            }
        }).done(function(data) {
            _this.list(data);
        }).always(function() {
            _this.appelAjax = null;
        });
    }
};

/**
 * Affiche la liste des propositions, en cas de succès à l'appel
 * Pour les Numéros de voie
 *
 * @param  {object} response Objet JSON renvoyé par SearchNum
 * @return {void}
 */
Cap.SaisieFR.num.list = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les inputs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le champ numéro
        jQinput = inputs.num,
        // On récupère sa valeur
        nouvelInput = Cap.Utils.getInputValue(jQinput),
        // On récupère le code retour de la fnction
        iRet = parseInt(response.iRet),
        Hc = "",
        valeur = "",
        proposition = {};

    if (nouvelInput == Cap.SaisieFR.num.sNumIn[instance]) {

        // Affichage du message d'erreur
        if (iRet > 0 && iRet !== 1 && settings.errorMessages.showMessage && jQinput !== "") {
            Cap.Utils.afficherMessage(jQinput, Cap.Utils.nonDefini(response.message), settings.errorMessages.position);
        }
        // Le numéro n'est pas référencé donc on positionne le code qualité à "00"
        else if (iRet === 1) {
            Cap.SaisieFR.majCQA("00");
        }
        // Suppression du message d'erreur
        else if (iRet === 0 && jQinput !== "") {
            Cap.Utils.afficherMessage(jQinput);
        }

        _this.propositions = [];

        if (Cap.Utils.nonDefini(response.ptrTabHc) !== "" && Cap.Utils.nonDefini(response.ptrTabHc.Hc) !== "") {

            $.each(response.ptrTabHc.Hc, function(index, value) {
                Hc = value;
                valeur = _this.afficherProposition(Cap.Utils.nonDefini(Hc.sNum), Cap.Utils.nonDefini(Hc.sCplt));
                proposition = {
                    value: valeur,
                    label: valeur,
                    Hc: Hc
                };

                _this.propositions.push(proposition);
            });
        }

        if (Cap.Utils.inputExists(jQinput)) {
            _this.autocompleteInit();
            jQinput.autocomplete("search", "");
        }
    }
};

/**
 * Appel de IsNumExist (pour tester le numéro de voie)
 * Appelée uniquement lorsque le champ Numéro perd le focus
 *
 * @return {void}
 */
Cap.SaisieFR.num.check = function() {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère la valeur du champ numéro
        sNumIn = Cap.Utils.getInputValue(inputs.num),
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        // On récupère le code INSEE
        sInsee = Cap.Utils.nonDefini(zipcityPropChoisie.sInsee),
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // On récupère la proposition choisie pour la voie
        streetPropChoisie = Cap.SaisieFR.street.propChoisie[instance],
        // On récupère le matricule de voie
        sMat = Cap.Utils.nonDefini(streetPropChoisie.sMat);

    if (sNumIn !== "" && iType !== 3 && sInsee !== "" && sMat !== "") {

        // On remet le code qualité par défaut
        Cap.SaisieFR.majCQA("53");

        Cap.Utils.abortAjaxRequest(_this.appelAjax);

        _this.appelAjax = $.ajax({
            dataType: "json",
            url: capSaisieFRPath + "search",
            data: {
                request: "numexist",
                showMessage: settings.errorMessages.showMessage,
                countryCode: Cap.Utils.countryCode[instance],
                params: {
                    sNumIn: sNumIn,
                    sInsee: sInsee,
                    sMat: sMat
                }
            }
        }).done(function(data) {
            _this.validate(data);
        }).always(function() {
            _this.appelAjax = null;
        });
    }
};

/**
 * Test du numéro de voie
 *
 * @param  {object} response Objet JSON renvoyé par la fonction IsNumExist
 * @return {void}
 */
Cap.SaisieFR.num.validate = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le code retour de la fonction
        iRet = parseInt(response.iRet),
        // On récupère le champ numéro
        jQinput = Cap.Utils.nonDefini(inputs.num),
        sNum = "",
        sCplt = "",
        Hc = {},
        estNumValide = false;

    Cap.SaisieFR.num.dejaTeste[instance] = true;

    // Affichage du message d'erreur
    if (iRet > 0 && settings.errorMessages.showMessage && jQinput !== "") {
        Cap.Utils.afficherMessage(jQinput, Cap.Utils.nonDefini(response.message), settings.errorMessages.position);
    }
    // Le numéro n'est pas référencé donc on positionne le code qualité à "00"
    else if (iRet === 1) {
        Cap.SaisieFR.majCQA("00");
    }
    // Suppression du message d'erreur
    else if (iRet === 0 && jQinput !== "") {
        Cap.Utils.afficherMessage(jQinput);
    }

    // Récupération du numéro de voie
    if (Cap.Utils.nonDefini(Cap.SaisieFR.street.propChoisie[instance].sNum) !== "") {
        sNum = Cap.SaisieFR.street.propChoisie[instance].sNum
    }
    else if (Cap.Utils.nonDefini(Cap.SaisieFR.num.propChoisie[instance].sNum) !== "") {
        sNum = Cap.SaisieFR.num.propChoisie[instance].sNum;
    }
    else if (Cap.Utils.inputExists(jQinput)) {
        sNum = Cap.Utils.getInputValue(jQinput);
    }

    // Récupération du complément de numéro
    if (Cap.Utils.nonDefini(Cap.SaisieFR.street.propChoisie[instance].sCpl) !== "") {
        sCplt = Cap.SaisieFR.street.propChoisie[instance].sCpl;
    }
    else if (Cap.Utils.nonDefini(Cap.SaisieFR.num.propChoisie[instance].sCplt) !== "") {
        sCplt = Cap.SaisieFR.num.propChoisie[instance].sCplt;
    }

    Hc.sCp = Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sCp);
    Hc.sNum = sNum;
    Hc.sCplt = sCplt;
    Hc.sHcNum = "";

    if (Cap.Utils.nonDefini(response.ptrTabHc) !== "" && Cap.Utils.nonDefini(response.ptrTabHc.Hc) !== "") {

        $.each(response.ptrTabHc.Hc, function(index, value) {
            Hc = value;
        });
    }

    // Si iRet vaut 1, ça veut dire que la voie ne contient pas de numéro donc on le considère valide
    estNumValide = (iRet === 0 || iRet === 1);

    _this.choisirProposition(Hc, estNumValide);
};

/**
 * Affichage dans la liste des propositions
 *
 * @param  {string} num  Numéro de voie
 * @param  {string} cplt Complément du numéro
 * @return {string}      Chaîne de caractère à afficher à l'utilisateur (dans la liste)
 */
Cap.SaisieFR.num.afficherProposition = function( num, cplt ) {

    var num = Cap.Utils.nonDefini(num),
        cplt = Cap.Utils.nonDefini(cplt);

    if (cplt === "") {
        return num;
    }
    else if (num.length <= 4) {
        return num + " " + cplt;
    }
    else {
        return num + cplt;
    }
};

/**
 * Traitement lorsqu'on choisit un numéro de voie dans la liste des propositions
 * Enregistrement des données choisies
 * Affichage des bonnes informations dans les bons champs
 * Passage au champ suivant
 *
 * @param  {object}  Hc           Objet contenant les informations du numéro sélectionné
 * @param  {boolean} estNumValide Permet de savoir si c'est un numéro valide ou non
 * @param  {object}  event        Touche saisie par l'utilisateur
 * @return {boolean}
 */
Cap.SaisieFR.num.choisirProposition = function( Hc, estNumValide, event ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        jQinput = inputs.num,
        // Variable servant à l'affichage
        cploc = "";

    // Suppression message d'erreur
    if (Cap.Utils.inputExists(jQinput)) {
        Cap.Utils.afficherMessage(jQinput);
    }

    _this.dejaTeste[instance] = true;

    /**
     * Changement du CP uniquement si celui-ci est différent de celui déjà choisi
     * Et si le iType est inférieur à 2
     */
    if (iType < 2) {

        // On sauvegarde le nouveau CP via le numéro
        if (Cap.Utils.nonDefini(Hc.sCp) !== "") {
            Cap.SaisieFR.zipcity.propChoisie[instance].sCp = Hc.sCp;
            Cap.SaisieFR.street.propChoisie[instance].sCp = Hc.sCp;
        }
        // Ou via la voie si le numéro n'a pas de champ CP
        else if (Cap.Utils.nonDefini(Cap.SaisieFR.street.propChoisie[instance].sCp) !== "") {
            Cap.SaisieFR.zipcity.propChoisie[instance].sCp = Cap.SaisieFR.street.propChoisie[instance].sCp;
        }

        // On sauvegarde la nouvelle localité via le numéro
        if (Cap.Utils.nonDefini(Hc.sLoc) !== "") {
            Cap.SaisieFR.zipcity.propChoisie[instance].sLoc = Hc.sLoc;
            Cap.SaisieFR.street.propChoisie[instance].sLoc = Hc.sLoc;
        }
        // Ou via la voie si le numéro n'a pas de champ Localité
        else if (Cap.Utils.nonDefini(Cap.SaisieFR.street.propChoisie[instance].sLoc) !== "") {
            Cap.SaisieFR.zipcity.propChoisie[instance].sLoc = Cap.SaisieFR.street.propChoisie[instance].sLoc;
        }

        // Si le champ CP / Loc n'est qu'un seul champ
        if (Cap.Utils.inputExists(inputs.zipcity)) {
            // On récupère le cp
            cploc = Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sCp);

            // On ajoute la localité
            if (Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sLoc) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += Cap.SaisieFR.zipcity.propChoisie[instance].sLoc;
            }

            // Si le champ Lieu-dit n'existe pas et que le Lieu-dit est renseigné
            if (!Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += "(" + Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit + ")";
            }

            if (cploc !== "") {
                inputs.zipcity.val(cploc);
            }
        }
        // Sinon, les champs CP et Loc sont deux champs séparés
        else {

            if (Cap.Utils.inputExists(inputs.zip) && Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sCp) !== "") {
                inputs.zip.val(Cap.SaisieFR.zipcity.propChoisie[instance].sCp);
            }

            if (Cap.Utils.inputExists(inputs.city)) {
                // On récupère la localité
                cploc = Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sLoc);

                // Si le champ Lieu-dit n'existe pas et que le Lieu-dit est renseigné
                if (!Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit) !== "") {
                    cploc += (cploc !== "") ? " " : "";
                    cploc += "(" + Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit + ")";
                }

                if (cploc !== "") {
                    inputs.city.val(cploc);
                }
            }
        }

        // On remplace le lieudit s'il existe et qu'il y a un champ lieudit sur le fomulaire
        if (Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit) !== "") {
            inputs.province.val(Cap.SaisieFR.zipcity.propChoisie[instance].sLieuDit);
        }
    }

    // S'il y a un champ Numéro, alors on le remplit
    if (Cap.Utils.inputExists(jQinput)) {
        jQinput.val(Cap.SaisieFR.num.afficherProposition(Cap.Utils.nonDefini(Hc.sNum), Cap.Utils.nonDefini(Hc.sCplt)));
    }

    _this.propChoisie[instance] = Hc;

    // S'il y a un champ hexaclé on enregistre le code Hexaclé du numéro de voie
    if (Cap.Utils.inputExists(inputs.numId)) {
        inputs.numId.val(Cap.Utils.nonDefini(_this.propChoisie[instance].sHcNum));
    }

    if (estNumValide) {
        // Numéro de voie validée. Donc CPLOC et VOIE également. Code qualité à 00
        Cap.SaisieFR.majCQA("00");
    }

    if (Cap.Utils.nonDefini(event) !== "") {
        event.preventDefault();
    }

    if (Cap.Utils.inputExists(jQinput)) {
        Cap.SaisieFR.putFocusOnNextInput(jQinput);
    }
    else {
        Cap.SaisieFR.putFocusOnNextInput(inputs.street);
    }

    return false;
};

/**
 * Intialisation des listes de propositions de numéros qui s'affichent sous les input text (grace à jQueryUI)
 */
Cap.SaisieFR.num.autocompleteInit = function() {

    var _this = this,
        instance = Cap.SaisieFR.instance,
        jQinput = Cap.Utils.nonDefini(Cap.SaisieFR.inputs[instance].num);

    if (Cap.Utils.inputExists(jQinput)) {
        jQinput.autocomplete({
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet de lancer la recherche à la main, sans critères
            minLength: 0,
            // Permet d'annuler le changement du input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'une voie
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.Hc, true, event);
                }

                return false;
            }
        });

        // Si jamais on quitte le champ sans avoir sélectionné de proposition
        // On n'utilise pas onblur car il est appelé AVANT que l'item de la liste ne soit sélectionné
        jQinput.bind("autocompletechange", function(event, ui) {

            if ((Cap.Utils.countryCode[instance].toUpperCase() === "FR" || Cap.Utils.countryCode[instance].toUpperCase() === "FRA") && jQinput.val() !== "") {
                _this.check();
            }
        });
    }
};

/**
 * Appel de SearchL3 (pour récupérer le complément de d'adresse)
 *
 * @param  {object} event Touche saisie par l'utilisateur
 * @return {void}
 */
Cap.SaisieFR.add1.search = function( event ) {

    var _this = this,
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        // On récupère les paramètres
        settings = Cap.SaisieFR.settings[instance],
        // On récupère la proposition choisie pour le cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // On récupère le code INSEE
        sInsee = Cap.Utils.nonDefini(zipcityPropChoisie.sInsee),
        // On récupère la proposition choisie pour la voie
        streetPropChoisie = Cap.SaisieFR.street.propChoisie[instance],
        // On récupère le matricule de voie
        sMat = Cap.Utils.nonDefini(streetPropChoisie.sMat),
        // On récupère la proposition choisie pour le numéro
        numPropChoisie = Cap.SaisieFR.num.propChoisie[instance],
        // On récupère le code hexaclé
        sHexacle = Cap.Utils.nonDefini(numPropChoisie.sHcNum),
        // On récupère le numéro choisi
        sNum = Cap.Utils.nonDefini(numPropChoisie.sNum),
        // On récupère le complément de numéro
        sCplt = Cap.Utils.nonDefini(numPropChoisie.sCplt),
        toucheSaisie = Cap.Utils.getTouche(event);

    // Lancement du traitement uniquement si ce n'est pas une flèche qui a été saisie, ou Echap... et que si la localité possède des voies
    if (Cap.Utils.toucheAutorisee(toucheSaisie) && iType !== 3 && sInsee !== "" && sMat !== "") {

        Cap.SaisieFR.reset("l3");

        Cap.SaisieFR.add1.sInput[instance] = inputs.add1.val();

        Cap.Utils.abortAjaxRequest(_this.appelAjax);

        _this.appelAjax = $.ajax({
            dataType: "json",
            url: capSaisieFRPath + "search",
            data: {
                request: "ligne3",
                showMessage: settings.errorMessages.showMessage,
                countryCode: Cap.Utils.countryCode[instance],
                params: {
                    sInput: Cap.SaisieFR.add1.sInput[instance],
                    sInsee: sInsee,
                    sMat: sMat,
                    sHexacle: sHexacle,
                    sNum: sNum,
                    sCplt: sCplt
                }
            }
        }).done(function(data) {
            _this.list(data);
        }).always(function() {
            _this.appelAjax = null;
        });
    }
};

/**
 * Affiche la liste des propositions, en cas de succès à l'appel
 * Pour les Compléments d'adresse
 *
 * @param  {object} response Objet JSON renvoyé par la fonction SearchL3
 * @return {void}
 */
Cap.SaisieFR.add1.list = function( response ) {

    var _this = this,
        // On récupère l'instance
        instance = Cap.SaisieFR.instance,
        // On récupère le champ complément d'adresse 1
        jQinput = Cap.SaisieFR.inputs[instance].add1,
        // On récupère sa valeur
        nouvelInput = Cap.Utils.getInputValue(jQinput),
        Hl = "",
        valeur = "",
        proposition = {};

    if (nouvelInput == Cap.SaisieFR.add1.sInput[instance]) {

        _this.propositions = [];

        if (Cap.Utils.nonDefini(response.ptrTabHl) !== "" && Cap.Utils.nonDefini(response.ptrTabHl.Hl) !== "") {

            $.each(response.ptrTabHl.Hl, function(index, value) {
                Hl = value;

                if (Cap.Utils.nonDefini(Hl.sLibL3) !== "") {
                    valeur = Hl.sLibL3;
                    proposition = {
                        value: valeur,
                        label: valeur,
                        Hl: Hl
                    };
                }

                _this.propositions.push(proposition);
            });
        }

        if (Cap.Utils.inputExists(jQinput)) {
            _this.autocompleteInit();
            jQinput.autocomplete("search", "");
        }
    }
};

/**
 * Traitement lorsqu'on choisit un complément d'adresse dans la liste des propositions
 * Enregistrement des données choisies
 * Affichage des bonnes informations dans les bons champs
 * Passage au champ suivant
 *
 * @param  {object}  Hl    Objet contenant les informations du complément sélectionné
 * @param  {object}  event Touche saisie par l'utilisateur
 * @return {boolean}
 */
Cap.SaisieFR.add1.choisirProposition = function( Hl, event ) {

    var _this = this,
        instance = Cap.SaisieFR.instance,
        // On récupère les champs
        inputs = Cap.SaisieFR.inputs[instance],
        jQinput = inputs.add1,
        // On récupère la proposition choisie du cploc
        zipcityPropChoisie = Cap.SaisieFR.zipcity.propChoisie[instance],
        // On récupère le iType
        iType = Cap.SaisieFR.zipcity.getIType(instance),
        // Variable destinée à l'affichage
        cploc = "";

    // Changement du CP uniquement si celui-ci est différent de celui déjà choisi
    // Et si le iType est inférieur à 2
    if (Cap.Utils.nonDefini(Hl.sCp) !== "" && Cap.Utils.nonDefini(Hl.sCp) !== Cap.Utils.nonDefini(zipcityPropChoisie.sCp) && iType < 2) {

        // Si le champ CP / Loc n'est qu'un seul champ
        if (Cap.Utils.inputExists(inputs.zipcity)) {
            cploc += Hl.sCp;
            cploc += (cploc !== "") ? " " : "";
            cploc += Cap.Utils.nonDefini(zipcityPropChoisie.sLoc);

            // Si le champ Lieu-dit n'existe pas et que le Lieu-dit est renseigné
            if (!Cap.Utils.inputExists(inputs.province) && Cap.Utils.nonDefini(zipcityPropChoisie.sLieuDit) !== "") {
                cploc += (cploc !== "") ? " " : "";
                cploc += "(" + zipcityPropChoisie.sLieuDit + ")";
            }

            if (cploc !== "") {
                inputs.zipcity.val(cploc);
            }

        }
        // Sinon, les champs CP et Loc sont deux champs séparés
        else if (Cap.Utils.inputExists(inputs.zip) && Cap.Utils.nonDefini(Hl.sCp) !== "") {
            inputs.zip.val(Hl.sCp);
        }

        Cap.SaisieFR.num.propChoisie[instance].sCp = Hl.sCp;
        Cap.SaisieFR.street.propChoisie[instance].sCp = Hl.sCp;
        Cap.SaisieFR.zipcity.propChoisie[instance].sCp = Hl.sCp;
    }

    if (Cap.Utils.nonDefini(Hl.sNum) !== "" && Cap.Utils.nonDefini(Hl.sNum) !== Cap.Utils.nonDefini(Cap.SaisieFR.num.propChoisie[instance].sNum)) {
        Cap.SaisieFR.num.propChoisie[instance].sNum = Hl.sNum;
        Cap.SaisieFR.num.propChoisie[instance].sCplt = Cap.Utils.nonDefini(Hl.sCplt);
        Cap.SaisieFR.num.propChoisie[instance].sHcNum = Cap.Utils.nonDefini(Hl.sHcNum);
    }

    jQinput.val(Cap.Utils.nonDefini(Hl.sLibL3));

    _this.propChoisie[instance] = Hl;

    if (Cap.Utils.nonDefini(event) !== "") {
        event.preventDefault();
    }

    Cap.SaisieFR.putFocusOnNextInput(jQinput);

    return false;
};

/**
 * Intialisation des listes de propositions de compléments qui s'affichent sous les input text (grace à jQueryUI)
 */
Cap.SaisieFR.add1.autocompleteInit = function() {

    var _this = this,
        instance = Cap.SaisieFR.instance,
        jQinput = Cap.SaisieFR.inputs[instance].add1;

    if (Cap.Utils.inputExists(jQinput)) {
        jQinput.autocomplete({
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet de lancer la recherche à la main, sans critères
            minLength: 0,
            // Permet d'annuler le changement du input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'une voie
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.Hl, event);
                }

                return false;
            }
        });
    }
};

/**
 * Permet de mettre à jour le CQA
 *
 * @param  {string} cqa Nouveau CQA
 * @return {void}
 */
Cap.SaisieFR.majCQA = function( cqa ) {

    var _this = this,
        instance = _this.instance,
        inputs = _this.inputs[instance];

    _this.cqa[instance] = Cap.Utils.nonDefini(cqa);

    Cap.Utils.updateInputValue(inputs.cqa, _this.cqa[instance]);
};



Cap.SaisieFR.validate = function() {

    var _this = this,
        instance = Cap.SaisieFR.instance;

    if (!_this.validated) {
        Cap.Utils.abortAjaxRequest(_this.appelAjax);

        _this.appelAjax = $.ajax({
            async: false,
            dataType: "json",
            url: capSaisieFRPath + "validate",
            data: {
                countryCode: Cap.Utils.countryCode[Cap.SaisieFR.instance],
                params: {
                    sCQA: Cap.SaisieFR.cqa[instance]
                }
            }
        }).done(function() {
            _this.validated = true;
        }).always(function() {
            _this.appelAjax = null;
        });
    }
};




// Ajout de l'objet dans le DOM
window.Cap = Cap;

$(document).ready(function() {

    // Récupération du formulaire pour empêcher sa validation et ainsi appeler ValidateForm avant de soumettre le formulaire
    var closestForm;

    $.each(Cap.SaisieFR.inputs, function(index, value) {

        $.each(value, function(inputName, inputValue) {

            closestForm = (inputValue !== "") ? inputValue.closest("form") : "";

            if (closestForm.length && closestForm.attr("id") !== "") {
                Cap.Utils.form[closestForm.attr("id")] = closestForm;
            }
        });
    });

    $.each(Cap.SaisieFR.inputs, function(index) {
        if (Cap.SaisieFR.inputs[index].divContent !== "") {
            // On utilise le change sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX
            Cap.SaisieFR.inputs[index].divContent.on("change", ":input", function(event) {
                // On récupère l'ID de l'input en cours
                var inputID = $(this).prop("id");

                if (inputID == Cap.SaisieFR.settings[index].countriesDropD_ID) {
                    Cap.SaisieFR.instance = index;
                    // On récupère le code pays qui a été choisi
                    if (Cap.SaisieFR.inputs[index].countriesDropD.val() !== "") {
                        Cap.Utils.countryCode[index] = Cap.SaisieFR.inputs[index].countriesDropD.val();
                    }

                    // On supprime tous les messages d'erreur
                    Cap.Utils.effacerMessages();
                }
            });

            // On utilise le keyup sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX
            Cap.SaisieFR.inputs[index].divContent.on("keyup", ":input", function(event) {
                // On récupère l'ID de l'input en cours
                var inputID = $(this).prop("id");

                // On lance la recherche en fonction de l'input sur lequel on est.
                if (inputID == Cap.SaisieFR.settings[index].zipcity_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.zipcity.search(event);
                }
                else if (inputID == Cap.SaisieFR.settings[index].zip_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.zipcity.search(event, Cap.SaisieFR.inputs[index].zip);
                }
                else if (inputID == Cap.SaisieFR.settings[index].city_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.zipcity.search(event, Cap.SaisieFR.inputs[index].city);
                }
                else if (inputID == Cap.SaisieFR.settings[index].street_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.street.search(event);
                }
                else if (inputID == Cap.SaisieFR.settings[index].num_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.num.search(event);
                }
                else if (inputID == Cap.SaisieFR.settings[index].add1_ID && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.add1.search(event);
                }
            });

            // On utilise le focus sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX
            Cap.SaisieFR.inputs[index].divContent.on("focus", ":input", function(event) {
                // On récupère l'input en cours
                var $this = $(this),
                // On récupère l'ID de l'input en cours
                    inputID = $(this).prop("id");

                // On lance la recherche en fonction de l'input sur lequel on est.
                if (inputID == Cap.SaisieFR.settings[index].num_ID && $this.val() === "" && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.num.search(event);
                }
                else if (inputID == Cap.SaisieFR.settings[index].add1_ID && $this.val() === "" && (Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                    Cap.SaisieFR.instance = index;
                    Cap.SaisieFR.add1.search(event);
                }
            });
        }
        else {
            if (Cap.SaisieFR.inputs[index].countriesDropD !== "") {

                // On récupère le code pays au chargement
                if (Cap.SaisieFR.inputs[index].countriesDropD.val() !== "") {
                    Cap.Utils.countryCode[index] = Cap.SaisieFR.inputs[index].countriesDropD.val();
                }

                // Capture du changement de pays dans la liste déroulante
                Cap.SaisieFR.inputs[index].countriesDropD.on("change", function() {
                    Cap.SaisieFR.instance = index;
                    // On récupère le code pays qui a été choisi
                    if (Cap.SaisieFR.inputs[index].countriesDropD.val() !== "") {
                        Cap.Utils.countryCode[index] = Cap.SaisieFR.inputs[index].countriesDropD.val();
                    }

                    // On supprime tous les messages d'erreur
                    Cap.Utils.effacerMessages();
                });
            }

            // Il n'y a qu'un seul champ code postal / localité
            if (Cap.SaisieFR.inputs[index].zipcity !== "") {
                // Capture de l'évènement keyup sur le champ cploc
                Cap.SaisieFR.inputs[index].zipcity.on("keyup", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.zipcity.search(event);
                    }
                });

            }
            // Les champs code postal et localité sont deux champs séparés
            else {

                if (Cap.SaisieFR.inputs[index].zip !== "") {
                    // Capture de l'évènement keyup sur le champ CP pour lancer la recherche
                    Cap.SaisieFR.inputs[index].zip.on("keyup", function(event) {
                        if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                            Cap.SaisieFR.instance = index;
                            Cap.SaisieFR.zipcity.search(event, Cap.SaisieFR.inputs[index].zip);
                        }
                    });

                    // Capture du focus sur le champ CP pour supprimer le message du champ Loc
                    Cap.SaisieFR.inputs[index].zip.on("focus", function() {
                        if (Cap.SaisieFR.inputs[index].city !== "") {
                            Cap.Utils.afficherMessage(Cap.SaisieFR.inputs[index].city);
                        }
                    });
                }

                if (Cap.SaisieFR.inputs[index].city !== "") {
                    // Capture de l'évènement keyup sur le champ Loc pour lancer la recherche
                    Cap.SaisieFR.inputs[index].city.on("keyup", function(event) {
                        if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                            Cap.SaisieFR.instance = index;
                            Cap.SaisieFR.zipcity.search(event, Cap.SaisieFR.inputs[index].city);
                        }
                    });

                    // Capture du focus sur le champ Loc pour supprimer le message du champ CP
                    Cap.SaisieFR.inputs[index].city.on("focus", function() {
                        if (Cap.SaisieFR.inputs[index].zip !== "") {
                            Cap.Utils.afficherMessage(Cap.SaisieFR.inputs[index].zip);
                        }
                    });
                }
            }

            if (Cap.SaisieFR.inputs[index].street !== "") {
                // Capture de l'évènement keyup sur le champ voie pour lancer la recherche
                Cap.SaisieFR.inputs[index].street.on("keyup", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.street.search(event);
                    }
                });
            }

            if (Cap.SaisieFR.inputs[index].add1 !== "") {
                // Capture de l'évènement keyup sur le champ complément pour lancer la recherche
                Cap.SaisieFR.inputs[index].add1.on("keyup", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.add1.search(event);
                    }
                });

                // Capture de l'évènement focus sur le champ complément pour lancer la recherche (uniquement si le champ est vide
                Cap.SaisieFR.inputs[index].add1.on("focus", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA") && Cap.SaisieFR.inputs[index].add1.val() === "") {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.add1.search(event);
                    }
                });
            }

            if (Cap.SaisieFR.inputs[index].num !== "") {
                // Capture de l'évènement keyup sur le champ numéro pour lancer la recherche
                Cap.SaisieFR.inputs[index].num.on("keyup", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA")) {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.num.search(event);
                    }
                });

                // Capture de l'évènement focus sur le champ numéro pour lancer la recherche (uniquement si le champ est vide)
                Cap.SaisieFR.inputs[index].num.on("focus", function(event) {
                    if ((Cap.Utils.countryCode[index].toUpperCase() === "FR" || Cap.Utils.countryCode[index].toUpperCase() === "FRA") && Cap.SaisieFR.inputs[index].num.val() === "") {
                        Cap.SaisieFR.instance = index;
                        Cap.SaisieFR.num.search(event);
                    }
                });
            }
        }
    });
});

})(jQuery);
