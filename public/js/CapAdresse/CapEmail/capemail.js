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
 * Objet contenant les fonctions / variables pour Cap Email
 * @type {object}
 */
Cap.Email = Cap.Email || {};

/**
 * Simple chaîne de caractère contenant le numéro de version
 * @type {string}
 */
Cap.Email.version = "2.1.2";

/**
 * Permet de savoir si la solution a été initialisée
 * @type {boolean}
 */
Cap.Email.isSolution = false;

/**
 * Options par défaut
 * @type {object}
 */
Cap.Email.defaults = {
    // Gestion des messages d'erreur
    errorMessages: {
        // Pour afficher les messages d'erreur lors de la saisie
        showMessage: true,
        // Positionne le message d'erreur au dessus ou en dessous de l'input text (2 valeurs : "top" || "bottom")
        position: "top"
    },

    // Gestion des messages pour la popup
    popupMessages: {
        // Titre de la popup quand l'email est erroné
        errorTitle: "Veuillez modifier votre saisie",
        // Message affiché avant le message d'erreur renvoyé par le service web
        errorMessage: "Erreur dans l'adresse email : ",
        // Titre de la popup quand l'email est litigieux
        warningTitle: "Voulez-vous conserver cet email ?",
        // Texte du bouton pour annuler et modifier son email (lorsqu'il est litigieux)
        warningBtnCancel: "Modifier",
        // Texte du bouton pour valider son email (lorsqqu'il est litigieux)
        warningBtnOk: "Conserver",
        // Message affiché avant l'email qui a été saisi
        recapMessage: "Adresse saisie : "
    },

    // Pour savoir si on fait la vérification de l'email ou non
    checkMail: true,
    // Permet d'enregistrer le Code Qualité Email
    cqe_ID: "",

    // Les identifiants des champs sont nécessaires pour pouvoir les récupérer via jQuery et activer l'autocomplétion
    // ID de la div qui affiche le message d'erreur si le service est HS
    divError_ID: "messageInfo",
    // ID de la div qui contiendra le formulaire de l'adresse (si celui-ci est chargé en Ajax)
    divContent_ID: "",

    // ID de la liste déroulante pour la civilité (si ce ne sont pas des radios boutons)
    civiliteDropD_ID: "",
    // ID du radio bouton pour la civilité Mr (si ce n'est pas une liste déroulante)
    civiliteMr_ID: "",
    // ID du radio bouton pour la civilité Mme (si ce n'est pas une liste déroulante)
    civiliteMme_ID: "",
    // ID du champ prénom
    firstName_ID: "firstname",
    // ID du champ nom
    lastName_ID: "lastname",
    // ID du champ email
    email_ID: "email",

    // Bouton
    // ID du bouton "Effacer"
    btnEffacer_ID: ""
};

/**
 * Objet où seront stockés les différents champs (via jQuery)
 * C'est grâce à ces éléments qu'on pourra activer l'autocomplétion
 * @type {object}
 */
Cap.Email.inputs = [{
    // Div qui affiche le message d'erreur si le service est HS
    divError: "",
    // Div qui contiendra le formulaire de l'adresse (si celui-ci est chargé en Ajax)
    divContent: "",

    // Champ Code Qualité Email
    cqe: "",
    // Liste déroulante pour la civilité (si ce ne sont pas des radios boutons)
    civiliteDropD: "",
    // Radio bouton pour la civilité Mr (si ce n'est pas une liste déroulante)
    civiliteMr: "",
    // Radio bouton pour la civilité Mme (si ce n'est pas une liste déroulante)
    civiliteMme: "",
    // Champ prénom
    firstName: "",
    // Champ nom
    lastName: "",
    // Champ email
    email: "",

    // Bouton
    // Bouton "Effacer"
    btnEffacer: ""
}];

/**
 * Variable permettant de stoper les appels Ajax multiples
 * @type {null}
 */
Cap.Email.appelAjax = null;

/**
 * Permet de savoir si l'email est ok ou non
 * @type {boolean}
 */
Cap.Email.validated = false;

/**
 * Permet de savoir si le service ne répond plus
 * @type {boolean}
 */
Cap.Email.serviceHS = false;

/**
 * Permet de savoir si la fonction CheckMail a déjà été appelée ou non
 * @type {array}
 */
Cap.Email.called = [false];

/**
 * Tableau contenant les différents code qualité
 * Un pour chaque formulaire
 * @type {array}
 */
Cap.Email.cqe = [""];

/**
 * Tableau contenant les différentes configurations
 * Une pour chaque formulaire différent
 * @type {array}
 */
Cap.Email.settings = [];

/**
 * Pour savoir sur quel formulaire on se situe
 * @type {integer}
 */
Cap.Email.instance = 0;

/**
 * Nombre d'email validés
 * Pour pouvoir valider tous les emails s'il y a plusieurs formulaire
 * @type {array}
 */
Cap.Email.emailValidated = [false];

/**
 * Nombre de champs email
 * Pour savoir la limite à ne pas dépasser lors de la validation
 * @type {integer}
 */
Cap.Email.nbInputs = 0;

/**
 * Tableau contenant les emails à valider
 * @type {array}
 */
Cap.Email.sMails = [];


Cap.Email.email = Cap.Email.email || {};

/**
 * Tableau contenant les propositions à afficher
 * @type {array}
 */
Cap.Email.email.propositions = [];

Cap.Email.email.appelAjax = null;


Cap.Email.firstName = Cap.Email.firstName || {};

/**
 * Tableau contenant les propositions à afficher
 * @type {array}
 */
Cap.Email.firstName.propositions = [];

Cap.Email.firstName.appelAjax = null;



/**
 * Initialisation de l'application
 * On récupère les champs du formulaire via leur ID
 *
 * @param  {object} settings Paramètres de l'utilisateur
 * @return {void}
 */
Cap.Email.init = function( settings ) {

    var _this = this,
        settingsLength = 1,
        i;

    _this.isSolution = true;

    if (!$.isArray(settings)) {
        _this.settings.push($.extend(true, _this.defaults, settings));
    }
    else {
        settingsLength = settings.length;
        $.each(settings, function(index, setting) {
            _this.settings.push($.extend(true, {}, _this.defaults, setting));
        });
    }

    _this.nbInputs = settingsLength;

    for (i = 0; i < settingsLength; i++) {

        if (i > 0) {
            _this.inputs.push($.extend({}, _this.inputs[i - 1]));
        }

        $.each(_this.inputs[i], function(index) {
            _this.inputs[i][index] = document.getElementById(_this.settings[i][index+"_ID"]) !== null ? $("[id='"+_this.settings[i][index+"_ID"]+"']") : "";

            // On réinitialise toutes les données de chaque Champs
            if (Cap.Utils.nonDefini(_this[index]) !== "") {
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

        // Initialisation par défaut
        _this.emailValidated[i] = false;
        _this.called[i] = false;
        _this.cqe[i] = "";
    }
};

Cap.Email.serviceDown = function() {

    var _this = this,
        instance = _this.instance;

    _this.serviceHS = true;

    // On met le code qualité à vide car on ne peut pas traiter correctement l'adresse
    _this.updateCQE();
};

/**
 * Fonction appelée lorsqu'on clique sur l'un des radios boutons de la civilité
 *
 * @return {void}
 */
Cap.Email.firstName.putFocusOnInput = function() {

    var _this = Cap.Email,
        instance = _this.instance,
        inputs = _this.inputs[instance];

    if (inputs.firstName !== "") {
        inputs.firstName.focus();

        if (inputs.firstName.val() !== "" && !inputs.firstName.prop("disabled")) {
            _this.firstName.search();
        }
    }
    else if (inputs.lastName !== "") {
        inputs.lastName.focus();
    }
};

Cap.Email.firstName.getCivilite = function() {

    var _this = Cap.Email,
        instance = _this.instance,
        inputs = _this.inputs[instance];

    // Si la civilité est gérée sous forme de liste déroulante
    if (inputs.civiliteDropD !== "" && inputs.civiliteDropD.val() !== "") {
        return inputs.civiliteDropD.val();
    }
    else if (inputs.civiliteMr !== "" && inputs.civiliteMr.prop("checked")) {
        return "M";
    }
    else if (inputs.civiliteMme !== "" && inputs.civiliteMme.prop("checked")) {
        return "F";
    }
    else {
        return "I";
    }
};

Cap.Email.firstName.getLibelleCivilite = function() {

    var _this = Cap.Email,
        instance = _this.instance,
        inputs = _this.inputs[instance],
        civilite = "";

    // Si la civilité est gérée sous forme de liste déroulante
    if (inputs.civiliteDropD !== "") {

        // On récupère la valeur de la liste
        civilite = inputs.civiliteDropD.val();

        if (civilite == "M") {
            return "Monsieur";
        }
        else if (civilite == "F") {
            return "Madame";
        }
        else {
            return "";
        }
    }
    else if (inputs.civiliteMr !== "" && inputs.civiliteMr.prop("checked")) {
        return "Monsieur";
    }
    else if (inputs.civiliteMme !== "" && inputs.civiliteMme.prop("checked")) {
        return "Madame";
    }
    else {
        return "";
    }
};

Cap.Email.firstName.search = function( event ) {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance],
        toucheSaisie = Cap.Utils.getTouche(event),
        sInput = "",
        sCiv = "";

    // Lancement du traitement uniquement s'il s'agit d'une touche autorisée (voir la fonction pour plus de détails)...
    if (Cap.Utils.toucheAutorisee(toucheSaisie)) {
        sInput = inputs.firstName !== "" ? inputs.firstName.val() : "";
        sCiv = _this.getCivilite();

        if (sInput === "") {
            _this.propositions = [];
            _this.autocompleteInit();

            // Suppression du message d'erreur
            if (inputs.firstName !== "") {
                Cap.Utils.afficherMessage(inputs.firstName);
            }
        }
        else if (!Cap.Email.serviceHS) {

            Cap.Utils.abortAjaxRequest(_this.appelAjax);

            _this.appelAjax = $.ajax({
                dataType: "json",
                url: capEmailPath + "search",
                data: {
                    request: "firstname",
                    sInput: sInput,
                    sCiv: sCiv,
                    sPays: Cap.Utils.countryCode[instance]
                }
            }).done(function (data) {

                if (Cap.Utils.nonDefini(data.faultError) !== true && Cap.Utils.nonDefini(data.error) !== true) {
                    _this.list(data);
                }
                else {
                    Cap.Email.serviceDown();
                }

                _this.appelAjax = null;
            });
        }
    }
};

Cap.Email.firstName.list = function( response ) {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance],
        settings = Cap.Email.settings[instance],
        sPrenom = "",
        proposition = {};

    // Affichage du message d'erreur
    if (settings.errorMessages.showMessage && inputs.firstName !== "" && parseInt(response.iRet) > 0) {
        Cap.Utils.afficherMessage(inputs.firstName, Cap.Utils.nonDefini(response.sMessage), settings.errorMessages.position);
    }
    // Suppression du message d'erreur
    else if (inputs.firstName !== "" && parseInt(response.iRet) === 0) {
        Cap.Utils.afficherMessage(inputs.firstName);
    }

    _this.propositions = [];

    if (Cap.Utils.nonDefini(response.Civ) !== "") {

        $.each(response.Civ, function(index, value) {
            sPrenom = Cap.Utils.nonDefini(value.sPrenom);
            proposition = {
                value: sPrenom,
                label: sPrenom,
                Civ: value
            };

            _this.propositions.push(proposition);
        });
    }

    _this.autocompleteInit();

    if (inputs.firstName !== "") {
        inputs.firstName.autocomplete("search", "");
    }
};

Cap.Email.firstName.choisirProposition = function( Civ, event ) {

    var _this = Cap.Email,
        instance = _this.instance,
        inputs = _this.inputs[instance],
        civilite = Cap.Utils.nonDefini(Civ.sCiv);

    // Si la civilité est gérée sous forme de liste déroulante
    if (inputs.civiliteDropD !== "" && civilite !== "" && civilite !== "I") {
        inputs.civiliteDropD.val(civilite);
    }
    else if (inputs.civiliteMr !== "" && civilite == "M" && _this.firstName.getCivilite() != "M") {
        inputs.civiliteMr.prop("checked", true);
    }
    else if (inputs.civiliteMme !== "" && civilite == "F" && _this.firstName.getCivilite() != "F") {
        inputs.civiliteMme.prop("checked", true);
    }

    inputs.firstName.val(Cap.Utils.nonDefini(Civ.sPrenom));

    // On bloque le comportement par défaut de la touche appuyée
    // Pour pouvoir placer le focus sur le champ suivant
    event.preventDefault();

    Cap.Utils.putFocusOnNextInput(inputs.firstName);

    return false;
};

Cap.Email.firstName.autocompleteInit = function() {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance];

    if (inputs.firstName !== "") {
        inputs.firstName.autocomplete({
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet d'afficher les propositions même si rien n'est saisi
            minLength: 0,
            // Permet d'annuler le changement de l'input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'un prénom
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.Civ, event);
                }

                return false;
            }
        });
    }
};

/**
 * Lance l'appel à la recherche de l'email
 *
 * @param  {object} event Touche appuyée par l'utilisateur
 * @return {void}
 */
Cap.Email.email.search = function( event ) {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance],
        toucheSaisie = Cap.Utils.getTouche(event),
        sInput = "",
        sNom = "",
        sPrenom = "";

    // Lancement du traitement uniquement s'il s'agit d'une touche autorisée (voir la fonction pour plus de détails)...
    if (Cap.Utils.toucheAutorisee(toucheSaisie)) {
        sInput = inputs.email !== "" ? inputs.email.val() : "";
        sNom = inputs.lastName !== "" ? inputs.lastName.val() : "";
        sPrenom = inputs.firstName !== "" ? inputs.firstName.val() : "";

        // Si on repasse ici, c'est qu'on modifie un email qui a été validé
        Cap.Email.called[instance] = false;
        Cap.Email.validated = false;

        Cap.Email.updatedNbEmailValidated(instance);

        // On réinitialise le Code Qualité Email
        Cap.Email.updateCQE();

        if (sInput === "") {
            _this.propositions = [];
            _this.autocompleteInit();

            // Suppression du message d'erreur
            if (inputs.email !== "") {
                Cap.Utils.afficherMessage(inputs.email);
            }
        }
        else {

            Cap.Utils.abortAjaxRequest(_this.appelAjax);

            _this.appelAjax = $.ajax({
                dataType: "json",
                url: capEmailPath + "search",
                data: {
                    request: "email",
                    sInput: sInput,
                    sNom: sNom,
                    sPrenom: sPrenom
                }
            }).done(function (data) {

                if (Cap.Utils.nonDefini(data.faultError) !== true && Cap.Utils.nonDefini(data.error) !== true) {
                    _this.list(data);
                }
                else {
                    Cap.Email.serviceDown();
                }

                _this.appelAjax = null;
            });
        }
    }
};

/**
 * Créé la liste des propositions qui seront affichées sous le champ email grâce à jQueryUI
 *
 * @param  {object} response Objet JSON renvoyé par la recherche de l'email
 * @return {void}
 */
Cap.Email.email.list = function( response ) {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance],
        settings = Cap.Email.settings[instance],
        iRet = parseInt(response.iRet),
        sMail = "",
        proposition = {};

    // Affichage du message d'erreur
    if (settings.errorMessages.showMessage && inputs.email !== "" && iRet > 0) {
        Cap.Utils.afficherMessage(inputs.email, Cap.Utils.nonDefini(response.sMessage), settings.errorMessages.position);
    }
    // Suppression du message d'erreur
    else if (inputs.email !== "" && iRet === 0) {
        Cap.Utils.afficherMessage(inputs.email);
    }

    _this.propositions = [];

    if (Cap.Utils.nonDefini(response.Mail) !== "") {

        $.each(response.Mail, function(index, value) {
            sMail = Cap.Utils.nonDefini(value.sMail);
            proposition = {
                value: sMail,
                label: sMail,
                sMail: sMail
            };

            _this.propositions.push(proposition);
        });
    }

    _this.autocompleteInit();

    if (inputs.email !== "") {
        inputs.email.autocomplete("search", "");
    }
};

/**
 * Fonction appelée lors d'un choix dans la liste déroulante des emails
 * Remplis automatiquement l'input text avec la sélection choisie
 *
 * @param  {object} email Email choisi par l'utilisateur
 * @param  {object} event Touche saisie par l'utilisateur
 * @return {boolean}
 */
Cap.Email.email.choisirProposition = function( sMail, event ) {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance],
        mailRegex = new RegExp("[a-z0-9._-]+@[a-z0-9._-]+", "gi");

    if (Cap.Utils.nonDefini(event) !== "") {
        event.preventDefault();
    }

    // Suppression du message d'erreur
    if (inputs.email !== "") {
        Cap.Utils.afficherMessage(inputs.email);
    }

    if (mailRegex.test(sMail) && inputs.email !== "") {
        Cap.Utils.putFocusOnNextInput(inputs.email);
    }

    if (inputs.email !== "") {
        inputs.email.val(sMail);
    }

    return false;
};

/**
 * Lance l'appel à la vérification de l'email
 *
 * @return {boolean}
 */
Cap.Email.validate = function( formID ) {

    var _this = this,
        form_ID = Cap.Utils.nonDefini(formID),
        emailValidated = _this.getNbEmailValidated();

    $.each(_this.inputs, function(index, inputs) {
        _this.sMails[index] = inputs.email !== "" ? inputs.email.val() : "";
    });

    if (!_this.validated) {

        _this.checkMail(0, form_ID);
    }

    if (emailValidated === _this.nbInputs) {
        _this.validated = true;
    }
};

/**
 * Permet de vérifier la validité d'un email via le service web
 *
 * @param  {integer} index  Index de l'email qu'on veut tester
 * @param  {string}  formID ID du formulaire dans lequel on se trouve
 * @return {void}
 */
Cap.Email.checkMail = function( index, formID ) {

    var _this = this,
        settings = _this.settings,
        i = parseInt(index),
        sMail = Cap.Utils.nonDefini(_this.sMails[i]),
        inputFormID = Cap.Utils.nonDefini(_this.inputs[i]) !== "" ? Cap.Utils.nonDefini(_this.inputs[i].formID) : "",
        emailValidated = _this.getNbEmailValidated(),
        iRet,
        inputs = _this.inputs[i],
        popupConfirmeEmail,
        dialogOptions = {
            // closeText: "X",
            resizable: false,
            autoOpen: false,
            height: "auto",
            width: 400,
            modal: true,
            draggable: false,
            open: function() {
                $(".ui-widget-overlay").bind("click", function() {
                    $("#cap-popup-confirme-email").dialog("close");
                });
            },
            close: function() {
                // On remet la variable à false pour pouvoir relancer l'appel
                _this.called[i] = false;
            }
        },
        dialogButtons = {};

    if (emailValidated === _this.nbInputs) {

        _this.validated = true;

        if (Cap.Utils.nonDefini(Cap.Utils.form[formID]) !== "") {
            // On envoie l'index 0 car ça correspond au formulaire récupéré via this
            Cap.Utils.soumetFormulaire(Cap.Utils.form[formID][0]);
        }
    }
    else if (inputFormID === formID && i < _this.nbInputs && sMail !== "" && settings[i].checkMail && !_this.called[i]) {

        $.ajax({
            async: false,
            dataType: "json",
            url: capEmailPath + "check",
            data: {
                sMail: sMail
            }
        }).done(function(data) {

            if (!Cap.Utils.nonDefini(data.faultError) && !Cap.Utils.nonDefini(data.error)) {
                iRet = parseInt(data.iRet);

                _this.called[i] = true;

                // Message bloquant
                if (iRet === 1) {
                    $("#cap-spn-message").html(Translator.translate(settings[i].popupMessages.errorMessage) + " " + Translator.translate(Cap.Utils.nonDefini(data.sMessage)));
                    $("#cap-spn-adresse-saisie").html(sMail);
                    dialogOptions.title = Translator.translate(settings[i].popupMessages.errorTitle);
                    dialogOptions.buttons = {
                        "Ok": function() {
                            // Permet de modifier l'email
                            $(this).dialog("close");

                            if (inputs.email !== "") {
                                inputs.email.focus();
                            }
                        }
                    };

                    popupConfirmeEmail = $("#cap-popup-confirme-email").dialog(dialogOptions);
                    popupConfirmeEmail.dialog("open");

                    // On repositionne la popup au centre lorsqu'on change la taille de la fenêtre
                    $(window).resize(function() {
                        popupConfirmeEmail.dialog("option", "position", {my: "center", at: "center", of: window});
                    });
                }
                // Erreur possible dans l'adresse email, on demande à l'utilisateur s'il veut modifier/conserver sa saisie
                else if (iRet === 2) {
                    $("#cap-spn-message").html(Translator.translate(Cap.Utils.nonDefini(data.sMessage)));
                    $("#cap-spn-adresse-saisie").html(sMail);

                    _this.updateCQE(Cap.Utils.nonDefini(data.sCodeTraitement));

                    dialogOptions.title = Translator.translate(settings[i].popupMessages.warningTitle);
                    // Bouton permettant de modifier l'email
                    dialogButtons[Translator.translate(settings[i].popupMessages.warningBtnCancel)] = function() {
                        $(this).dialog("close");

                        if (inputs.email !== "") {
                            inputs.email.focus();
                        }
                    };
                    // Bouton permettant de valider l'email
                    dialogButtons[Translator.translate(settings[i].popupMessages.warningBtnOk)] = function() {
                        $(this).dialog("close");

                        _this.updatedNbEmailValidated(i, true);
                        _this.checkMail(i + 1, formID);
                    };

                    dialogOptions.buttons = dialogButtons;

                    popupConfirmeEmail = $("#cap-popup-confirme-email").dialog(dialogOptions);
                    popupConfirmeEmail.dialog("open");

                    // On repositionne la popup au centre lorsqu'on change la taille de la fenêtre
                    $(window).resize(function() {
                        popupConfirmeEmail.dialog("option", "position", {my: "center", at: "center", of: window});
                    });
                }
                // Si iRet == 0 : L'email est correct
                // Si iRet < 0 : Il y a eu une erreur donc on considère quand même l'email valide
                else if (iRet <= 0) {

                    _this.updateCQE(Cap.Utils.nonDefini(data.sCodeTraitement));

                    _this.updatedNbEmailValidated(i, true);
                    _this.checkMail(i + 1, formID);
                }
            }
            // Il y a eu une erreur, on considère l'email valide
            else {
                _this.updatedNbEmailValidated(i, true);
                _this.checkMail(i + 1, formID);
            }
        });
    }
    else if (inputFormID !== formID && i < _this.nbInputs) {
        _this.updatedNbEmailValidated(i, true);
        _this.checkMail(i + 1, formID);
    }
    else if ((sMail === "" || !settings[i].checkMail) && i < _this.nbInputs) {
        _this.updatedNbEmailValidated(i, true);
        _this.checkMail(i + 1, formID);
    }
};

/**
 * Initialise l'autocomplétion grâce à jQuery UI
 *
 * @return {void}
 */
Cap.Email.email.autocompleteInit = function() {

    var _this = this,
        instance = Cap.Email.instance,
        inputs = Cap.Email.inputs[instance];

    if (inputs.email !== "") {
        inputs.email.autocomplete({
            // Spécifie la source de données
            // On utilise une fonction pour empêcher jQuery de filtrer les résultats
            source: function(request, response) {
                response(_this.propositions);
            },
            // Permet de sélectionner automatiquement la première proposition
            autoFocus: true,
            // Permet d'afficher les propositions même si rien n'est saisi
            minLength: 0,
            // Permet d'annuler le changement du input text lors de la sélection d'une proposition au clavier
            focus: function() {
                return false;
            },
            // Action lors de la validation d'un email
            select: function(event, ui) {

                /**
                 * On test que la touche "shift" n'est pas appuyée
                 * Pour empêcher de sélectionner automatiquement la première proposition
                 * Et permettre de remonter les champs input avec "shift + tab"
                 */
                if (!event.shiftKey) {
                    _this.choisirProposition(ui.item.sMail, event);
                }

                return false;
            }
        });
    }
};

/**
 * Permet de mettre à jour le code qualité
 *
 * @param  {string} cqe Code qualité Email
 * @return {void}
 */
Cap.Email.updateCQE = function( cqe ) {

    var _this = this,
        instance = _this.instance,
        inputs = _this.inputs[instance];

    _this.cqe[instance] = Cap.Utils.nonDefini(cqe);

    if (inputs.cqe !== "") {
        inputs.cqe.val(_this.cqe[instance]);
    }
};

/**
 * Permet de récupérer le nombre d'email qui ont été validés
 *
 * @return {integer} Nombre d'email qui ont été validés
 */
Cap.Email.getNbEmailValidated = function() {

    var _this = this,
        i = 0,
        emailValidated = 0;

    for (; i < _this.nbInputs; i++) {

        if (_this.emailValidated[i]) {
            emailValidated++;
        }
    }

    return emailValidated;
};

/**
 * Permet de valider ou non un email
 *
 * @param {integer} index     Index de l'email qu'on veut valider ou non
 * @param {boolean} validated Permet de savoir si on valide ou non l'email
 *                            Si aucune valeur, alors c'est mis à false par défaut
 * @return {void}
 */
Cap.Email.updatedNbEmailValidated = function( index, validated ) {

    var _this = this,
        i = parseInt(index);

    if (Cap.Utils.nonDefini(validated) === '') {
        validated = false;
    }

    _this.emailValidated[i] = validated;
};



// Ajout de l'objet dans le DOM
window.Cap = Cap;

// Lorsque la page est chargée, on peut capturer l'évènement keyup
$(document).ready(function() {

    // Récupération du formulaire pour empêcher sa validation et ainsi appeler ValidateForm avant de soumettre le formulaire
    var closestForm;

    $.each(Cap.Email.inputs, function(index, value) {

        $.each(value, function(inputName, inputValue) {

            closestForm = (inputValue !== "") ? inputValue.closest("form") : "";

            if (closestForm.length && closestForm.attr("id") !== "") {
                Cap.Email.inputs[index].formID = (closestForm !== "") ? closestForm.attr("id") : "";
                Cap.Utils.form[closestForm.attr("id")] = closestForm;
            }
        });
    });

    $.each(Cap.Email.inputs, function(index) {

        if (Cap.Email.inputs[index].divContent !== "") {
            // On utilise le change sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX

            // Si la civilité est gérée sous forme de liste déroulante
            Cap.Email.inputs[index].divContent.on("change", ":input", function(event) {
                // On récupère l'ID de l'input en cours
                var inputID = $(this).prop("id");

                if (inputID == Cap.Email.settings[index].civiliteDropD_ID) {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                }
            });

            // On utilise le keyup sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX
            Cap.Email.inputs[index].divContent.on("keyup", ":input", function(event) {
                // On récupère l'ID de l'input en cours
                var inputID = $(this).prop("id");

                // On lance la recherche en fonction de l'input sur lequel on est.
                if (inputID == Cap.Email.settings[index].firstName_ID) {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.search(event);
                }
                else if (inputID == Cap.Email.settings[index].email_ID) {
                    Cap.Email.instance = index;
                    Cap.Email.email.search(event);
                }
            });

            // On utilise le click sur la div qui contient le formulaire de l'adresse
            // Car celui-ci est chargé dynamiquement en AJAX
            Cap.Email.inputs[index].divContent.on("click", ":input", function(event) {
                // On récupère l'input en cours
                var $this = $(this),
                // On récupère l'ID de l'input en cours
                    inputID = $(this).prop("id");

                // On lance la recherche en fonction de l'input sur lequel on est.
                if (inputID == Cap.Email.settings[index].civiliteMr_ID) {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                }
                else if (inputID == Cap.Email.settings[index].civiliteMme_ID) {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                }
            });
        }
        else {
            // Si la civilité est gérée sous forme de liste déroulante
            if (Cap.Email.inputs[index].civiliteDropD !== "") {
                Cap.Email.inputs[index].civiliteDropD.on("change", function() {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                });
            }

            // Lorsqu'on clique sur l'un des radio bouton
            if (Cap.Email.inputs[index].civiliteMr !== "") {
                Cap.Email.inputs[index].civiliteMr.on("click", function() {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                });
            }
            if (Cap.Email.inputs[index].civiliteMme !== "") {
                Cap.Email.inputs[index].civiliteMme.on("click", function() {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.putFocusOnInput();
                });
            }

            if (Cap.Email.inputs[index].firstName !== "") {
                Cap.Email.inputs[index].firstName.on("keyup", function(event) {
                    Cap.Email.instance = index;
                    Cap.Email.firstName.search(event);
                });
            }

            if (Cap.Email.inputs[index].email !== "") {
                // Capture de l'évènement keyup sur le champ email
                Cap.Email.inputs[index].email.on("keyup", function(event) {
                    Cap.Email.instance = index;
                    Cap.Email.email.search(event);
                });
            }
        }
    });

    if (Cap.Email.isSolution) {
        // Creation de la div qui contiendra la popup de confirmation pour l'email
        var divPopupEmail = "<div class='cap-alert-popup' id='cap-popup-confirme-email' title='' style='display: none'>"
                          + "  <span class='cap-alert-popup-title' id='cap-spn-message'></span><br />"
                          + "  "+ Translator.translate(Cap.Email.settings[0].popupMessages.recapMessage) + " " +" <span id='cap-spn-adresse-saisie'></span><br />"
                          + "</div>";

        // Ajout de la div à l'élément <body>
        $("body").append(divPopupEmail);
    }
});

})(jQuery);
