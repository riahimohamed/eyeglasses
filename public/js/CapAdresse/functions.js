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
 * Création de l'objet contenant l'application
 * @type {object}
 */
var Cap = Cap || {};

/**
 * Objet contenant les fonctions / variables utilitaires
 * @type {object}
 */
Cap.Utils = Cap.Utils || {};

/**
 * Code pays que l'on va envoyer à Cap Saisie (International)
 * @type {string}
 */
Cap.Utils.countryCode = ["FRA"];

/**
 * Objet contenant les solutions disponibles
 * @type {object}
 */
Cap.Utils.solutions = {};

/**
 * Permet de savoir combien de solutions sont activées (donc disponibles)
 * @type {number}
 */
Cap.Utils.nbSolutions = 0;


/**
 * Variable contenant le formulaire dans lequel on se trouve
 * @type {string}
 */
Cap.Utils.form = {};

/**
 * Variable contenant le bouton submit du formulaire
 * Pour pouvoir capturer l'évènement click et ainsi court-circuiter l'évènement blur de Cap Phone
 * @type {string}
 */
Cap.Utils.submitButton = "";

/**
 * Lance l'initialisation
 * Pour récupérer les solutions qui ont été initialisées
 *
 * @return {void}
 */
Cap.Utils.init = function() {

    var _this = this;

    _this.nbSolutions = 0;

    // Parcours l'objet Cap pour savoir quelles solutions sont présentes
    $.each(Cap, function(index, value) {

        if (_this.nonDefini(value.isSolution)) {
            _this.nbSolutions++;
            _this.solutions[index] = {
                validated: false
            };
        }
    });
};

/**
 * Permet de placer le focus sur le champ situé à la position X après le champ passé en paramètre
 * X correspond à l'index passé en paramètre (par défaut, on le positionne à 1)
 *
 * @param  {object}  jQinput Input récupéré via $(".class") | $("#id") | $(this)
 * @param  {number} index   Numéro du champ, après celui en cours, sur lequel on veut mettre le focus
 * @return {void}
 */
Cap.Utils.putFocusOnNextInput = function( jQinput, index ) {

    $input = Cap.Utils.nonDefini(jQinput);
    index = parseInt(index) || 1;

    // On récupère l'input à l'index situé après l'input récupéré
    var nextInput = $(":input:eq(" + ($(":input").index($input) + index) + ")");

    // S'il s'agit d'un input type text, password, tel ou email alors on place le focus dessus
    if (nextInput.attr("type") == "text" || nextInput.attr("type") == "password" || nextInput.attr("type") == "tel" || nextInput.attr("type") == "email") {
        nextInput.focus();
    }
};

/**
 * Permet d'arrêter l'appel Ajax
 * Pour ne pas faire d'appels multiples et surcharger le serveur
 *
 * @param  {mixed} ajaxRequest La requête qu'on veut stoper
 * @return {void}
 */
Cap.Utils.abortAjaxRequest = function( ajaxRequest ) {

    if (ajaxRequest != null) {
        ajaxRequest.abort();
    }
};

/**
 * Récuperation de la touche qui vient d'être appuyée
 *
 * @param  {object} event Touche tapée au clavier
 * @return {string}       Numéro de la touche saisie
 */
Cap.Utils.getTouche = function( event ) {

    var toucheSaisie = "0";

    /**
     * On test si l'évènement window.event existe
     * Correspond à IE
     */
    if (window.event) {
        toucheSaisie = event.keyCode;
    } else if (event != undefined) {
        if (event.which != "0") {
            /**
             * Si on appuie sur tab + shift, on remonte le formulaire au clavier
             * Donc, pour éviter de lancer les recherches,
             *       on assigne une touche non autorisée par la fonction toucheAutorisee
             * (N'importe quelle touche non autorisée fonctionne)
             */
            if (event.which == "9" && event.shiftKey) {
                toucheSaisie = "37";
            } else {
                toucheSaisie = event.which;
            }
        } else {
            toucheSaisie = event.keyCode;
        }
    }

    return toucheSaisie;
};

/**
 * Décide si une touche est considérée comme valide ou non pour lancer une recherche
 *
 * @param  {string}  toucheSaisie Touche qui a été tapée au clavier
 * @param  {boolean} allowEnter   Pour savoir si on considère la touche Entrée comme une touche autorisée ou non
 *                                Par défaut à false, utilisé uniquement pour la recherche de société
 *                                Pour que l'appui sur la touche Entrée relance la recherche
 * @return {boolean}              True si c'est une touche valide, false dans le cas contraire
 */
Cap.Utils.toucheAutorisee = function( toucheSaisie, allowEnter ) {

    var toucheOk = true;

    if (Cap.Utils.nonDefini(allowEnter) === "") {
        allowEnter = false;
    }

    // Fleches
    if ((toucheSaisie == "37") || (toucheSaisie == "38") || (toucheSaisie == "39") || (toucheSaisie == "40")) {
        toucheOk = false;
    }

    // Shift, Ctrl et Alt
    if ((toucheSaisie == "16") || (toucheSaisie == "17") || (toucheSaisie == "18")) {
        toucheOk = false;
    }

    // Fin, Home, Page up, Page down
    if ((toucheSaisie == "35") || (toucheSaisie == "36") || (toucheSaisie == "33") || (toucheSaisie == "34")) {
        toucheOk = false;
    }

    // Echap
    if (toucheSaisie == "27") {
        toucheOk = false;
    }

    if (!allowEnter) {
        // Entree
        if (toucheSaisie == "13") {
            toucheOk = false;
        }
    }

    return toucheOk;
};

/**
 * Permet de vérifier si une variable est "undefined" ou non
 * Si oui, on la transforme en chaine vide
 *
 * @param  {mixed|string} variable Variable a tester
 * @return {mixed|string}
 */
Cap.Utils.nonDefini = function( variable ) {

    if (typeof variable == "undefined") {
        variable = "";
    }

    return variable;
};

/**
 * Permet de vérifier si une variable est de type "function" ou non
 *
 * @param  {mixed}   variable Variable à tester
 * @return {boolean}
 */
Cap.Utils.isFunction = function( variable ) {

    return (typeof variable == "function");
};

/**
 * Permet de vérifier si une variable est de type numérique ou non
 *
 * @param  {mixed}   variable Variable à tester
 * @return {boolean}
 */
Cap.Utils.isNum = function( variable ) {

    return (!isNaN(variable - 0) && variable !== null && variable !== "" && variable !== false);
};

/**
 * Permet de vérifier si une variable est de type "object" ou non
 *
 * @param  {mixed}   variable Variable a tester
 * @return {boolean}
 */
Cap.Utils.isObject = function( variable ) {

    return (typeof variable == "object");
};

/**
 * Permet de vérifier si une variable est de type "string" ou non
 *
 * @param  {mixed}   variable Variable a tester
 * @return {boolean}
 */
Cap.Utils.isString = function( variable ) {

    return (typeof variable == "string");
};

/**
 * Permet de calculer la taille d'un simple objet JS
 *
 * @param  {object} object Objet dont on veut connaitre la taille
 * @return {integer}       Taille de l'objet
 */
Cap.Utils.objectSize = function( object ) {

    var size = 0,
        key;

    for (key in object) {

        if (object.hasOwnProperty(key)) {
            size++;
        }
    }

    return size;
};

/**
 * Permet de tester si un champ existe et qu'il est bien du "type jQuery"
 * C'est à dire récupéré via $(this) | $(".classe") | $("#id")
 *
 * @param  {object}  $input Champ que l'on veut tester
 * @return {boolean}        True si le champ existe et qu'il a été récupéré via jQuery, false sinon
 */
Cap.Utils.inputExists = function( $input ) {

    var _this = this;

    return (_this.nonDefini($input) !== "" && _this.isObject($input) && parseInt($input.length) === 1);
};

/**
 * Permet de mettre à jour la valeur d'un champ
 *
 * @param  {object} $input Champ que l'on veut mettre à jour
 * @param  {string} value  Valeur que l'on veut mettre dans le champ
 * @return {void}
 */
Cap.Utils.updateInputValue = function( $input, value ) {

    var _this = this;

    $input = _this.nonDefini($input);

    if (_this.inputExists($input)) {
        $input.val(_this.nonDefini(value));
    }
};

/**
 * Permet de récupérer la valeur d'un champ
 *
 * @param  {object} $input Champ dont on veut récupérer la valeur
 * @return {string}        Valeur du champ (vide si le champ n'existe pas)
 */
Cap.Utils.getInputValue = function( $input ) {

    var _this = this;

    $input = _this.nonDefini($input);

    if (_this.inputExists($input)) {
        return $input.val();
    }

    return "";
};

/**
 * Permet de convertir le code ASCII en caractère
 * Pour faciliter la comparaison plutôt que de comparer avec un numéro
 *
 * @param  {char}   sTypeV Code ASCII du caractère
 * @return {string}        Caractère converti
 */
Cap.Utils.convertsTypeV = function( sTypeV ) {

    var sTypeVConverti = "";

    sTypeV = parseInt(sTypeV);

    if (parseInt(sTypeV) != "NaN") {

        // Si c'est négatif, on rajoute 256 pour avoir le bon caractère
        // Par exemple -89 est censé correspondre au caractère '§' or, ce n'est pas réellement le cas
        // Donc, en ajoutant 256, on arrive à 167 qui correspond réellement au caractère '§'
        if (parseInt(sTypeV) < 0) {
            sTypeV += 256;
        }

        sTypeVConverti = String.fromCharCode(sTypeV);
    }

    return sTypeVConverti;
};

Cap.Utils.afficherMessage = function( jQinput, message, position ) {

    var _this = this;

    message = _this.nonDefini(message);
    message = Translator.translate(message);
    position = _this.nonDefini(position);

    // On récupère la span qui affiche le message d'erreur
    var span = jQinput.parent().find("span#cap-error-msg");

    // Si elle existe et que le message n'est pas undefined, alors on remplace le message
    // Sinon, si elle existe et que le message est undefined, alors on la supprime (pour éviter qu'elles s'empilent)
    // Sinon, on la créé et on affiche le message
    if (span[0] && message !== "") {
        span.html(message);
    }  else if (span[0] && message === "") {
        span.remove();
    } else if (message !== "") {

        var spanMessage = '<span class="cap-error-msg" id="cap-error-msg">'+message+'</span>',
            inputParent = jQinput.parent();

        if (position == "top") {
            inputParent.prepend(spanMessage);
        } else if (position == "bottom") {
            inputParent.append(spanMessage);
        }
    }
};

/**
 * Fonction permettant de supprimer tous les messages d'un coup
 */
Cap.Utils.effacerMessages = function() {

    $(".cap-error-msg").remove();
};

/**
 * Permet d'appeler toutes les fonctions de validation et de soumettre le formulaire une fois que tout est fini
 * @param form
 */
Cap.Utils.soumetFormulaire = function( form ) {

    var _this = this;

    if (_this.nbSolutions > 0) {

        $.each(_this.solutions, function(index, value) {

            if(!value.validated && (typeof Cap[index].validate == "function" || typeof Cap[index].search == "function")) {

                if (index == "Phone" && !Cap[index].validated) {
                    Cap[index].search();
                    if (!Cap[index].validated) {
                        return false;
                    }
                }
                else if (index == "Email" && !Cap[index].validated) {
                    Cap[index].validate(form.id);
                    if (!Cap[index].validated) {
                        return false;
                    }
                }
                else if (index != "Phone" && index !== "Email" && !Cap[index].validated) {
                    Cap[index].validate();
                    if (!Cap[index].validated) {
                        return false;
                    }
                }

                if (Cap[index].validated) {
                    value.validated = true;
                    _this.nbSolutions--;
                }
            }
        });
    }

    // Si tout est OK on soumet le formulaire
    if (_this.nbSolutions === 0) {
        form.submit();
    }
};



Cap.Popup = Cap.Popup || {};

Cap.Popup.alreadyOpen = false;

Cap.Popup.defaults = {
    speed: 500,
    opacity: 0.7,
    // width: 333, /* largeur de cap-popup-body (dans le css) + les margin et padding */
    width: 605, /* largeur de cap-popup-body (dans le css) + les margin et padding */
    height: 0
}

Cap.Popup.init = function( settings ) {

    var _this = this;

    _this.settings = $.extend(true, _this.defaults, settings);

    $(window).resize(_this.redim);
};

Cap.Popup.open = function( titre, contenu, classe, body_classe ) {

    var _this = this;

    _this.alreadyOpen = true;
    _this.titre = Cap.Utils.nonDefini(titre);
    _this.contenu = Cap.Utils.nonDefini(contenu);
    _this.classe = (Cap.Utils.nonDefini(classe) !== "") ? " " + classe : "";
    _this.body_classe = (Cap.Utils.nonDefini(body_classe) !== "") ? " " + body_classe : "";


    // <div class="cap-popup" id="cap-popup">
    //     <div class="cap-popup-aplat" id="cap-popup-aplat"></div>
    //     <div class="cap-popup-conteneur" id="cap-popup-conteneur">
    //         <div class="cap-popup-main" id="cap-popup-main">
    //             <div class="cap-popup-close" id="cap-popup-close"></div>
    //             <div class="cap-popup-content" id="cap-popup-content">
    //                 <div class="cap-popup-head" id="cap-popup-head"></div>
    //                 <div class="cap-popup-body cap-popup-large" id="cap-popup-body">
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    // </div>



    $("body").append('<div class="cap-popup" id="cap-popup"><div class="cap-popup-aplat" id="cap-popup-aplat"></div><div class="cap-popup-conteneur" id="cap-popup-conteneur"><div class="cap-popup-main" id="cap-popup-main"><div class="cap-popup-content" id="cap-popup-content"><div class="cap-popup-head'+_this.classe+' '+ _this.body_classe +'" id="cap-popup-head"></div><div class="cap-popup-body'+_this.body_classe+'" id="cap-popup-body"></div></div></div></div></div>');
    $("#cap-popup-head").append(_this.titre);
    $("#cap-popup-conteneur").hide();
    $("#cap-popup-aplat").css("opacity", 0).fadeTo(_this.settings.speed, _this.settings.opacity);

    _this.anim();

    //$("#cap-popup-aplat").on("click", _this.close);
    $("#cap-popup-btn_fermer").on("click", _this.close);

    $(".cap-popup-li_result").on("click", function() {
        var $this = $(this);
        $this.addClass("cap-popup-li_result_selected");
        $this.siblings().removeClass("cap-popup-li_result_selected");
        $this.find(".cap-popup-radio").prop("checked", true);
    });
};

Cap.Popup.anim = function() {

    var _this = this,
        $cappopup_body = $("#cap-popup-body"),
        $cappopup_conteneur = $("#cap-popup-conteneur"),
        $cappopup_close = $("#cap-popup-close");

    $cappopup_body.html(_this.contenu);

    $cappopup_body.hide();
    $cappopup_close.hide();
    $cappopup_conteneur.show();

    _this.settings.height = $("#cap-popup-head").outerHeight(true) + $cappopup_body.outerHeight(true);

    _this.redim();

    $cappopup_conteneur.fadeIn(function() {
        $cappopup_body.fadeIn();
        $cappopup_close.fadeIn();
    });

    // $('#cap-popup-conteneur').animate({ width : _this.settings.largeur }, _this.settings.speed).animate({ height : _this.settings.hauteur }, 'linear', function(){
    //   $('#cap-popup-body').fadeIn();
    //   $('#cap-popup-close').fadeIn();
    // });
};

Cap.Popup.redim = function() {

    var _this = Cap.Popup,
        $cappopup_conteneur = $("#cap-popup-conteneur");

    $cappopup_conteneur.css("left", (_this.windowW() - _this.settings.width) / 2+'px');
    $cappopup_conteneur.css("top", (_this.windowH() - _this.settings.height) / 2+'px');
};

Cap.Popup.close = function() {

    var _this = Cap.Popup,
        $cappopup = $("#cap-popup");

    $cappopup.fadeOut(_this.settings.speed / 2, function() {
        $cappopup.remove();
        _this.alreadyOpen = false;
    });
};

Cap.Popup.windowH = function() {

    if (window.innerHeight) {
        return window.innerHeight;
    } else {
        return $(window).height();
    }
};

Cap.Popup.windowW = function() {

    if (window.innerWidth) {
        return window.innerWidth;
    } else {
        return $(window).width();
    }
};



// Ajout de l'objet dans le DOM
window.Cap = Cap;

$(window).load(function() {

    Cap.Utils.init();

    // On empêche la soumission par défaut du formulaire pour pouvoir lancer les validations de Cap Adresse et soumettre le formulaire si tout est OK
    if (Cap.Utils.objectSize(Cap.Utils.form) > 0) {

        $.each(Cap.Utils.form, function(id, form) {

            form.on("submit", function(event) {
                event.preventDefault();

                Cap.Utils.soumetFormulaire(this);

                return false;
            });
        });
    }
});

})(jQuery);
