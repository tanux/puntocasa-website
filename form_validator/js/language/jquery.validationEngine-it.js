(function(a){a.fn.validationEngineLanguage=function(){};a.validationEngineLanguage={newLang:function(){a.validationEngineLanguage.allRules={required:{regex:"none",alertText:"* Campo richiesto",alertTextCheckboxMultiple:"* Per favore selezionare un'opzione",alertTextCheckbox:"* E' richiesta la selezione della casella"},minCheckbox:{regex:"none",alertText:"* Per favore selezionare ",alertText2:" opzioni"},phone:{regex:/^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/,alertText:"* Numero di telefono non corretto"},italian_phone:{regex:/[0-9\?]{9,10}/,alertText:"* Rispettare il formato del recapito telefonico come mostrato"},email:{regex:/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,alertText:"* Indirizzo non corretto"},number:{regex:/^[\-\+]?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)$/,alertText:"* Numero decimale non corretto"},onlyNumber:{regex:/^[0-9\ ]+$/,alertText:"* Solo numeri"},onlyLetter:{regex:/^[a-zA-Z\ \']+$/,alertText:"* Solo lettere"},onlyLetterSp:{regex:/^[a-zA-Z\ \']+$/,alertText:"* Caratteri permessi:lettere e apice"},noSpecialCharacters:{regex:/^[0-9a-zA-Z]+$/,alertText:"* Caratteri speciali non permessi"},ajaxUserCall:{file:"ajaxValidateFieldName",extraData:"name=eric",alertTextLoad:"* Caricamento, attendere per favore",alertText:"* Questo user � gi� stato utilizzato"},ajaxNameCall:{file:"ajaxValidateFieldName",alertText:"* Questo nome � gi� stato utilizzato",alertTextOk:"* Questo nome � disponibile",alertTextLoad:"* Caricamento, attendere per favore"}}}};a.validationEngineLanguage.newLang()})(jQuery);