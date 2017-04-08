// ** I18N
Calendar._DN = new Array
("неделя",
 "понеделник",
 "вторник",
 "сряда",
 "четвъртък",
 "петък",
 "събота",
 "неделя");
Calendar._MN = new Array
("януари",
 "февруари",
 "март",
 "април",
 "май",
 "юни",
 "юли",
 "август",
 "септември",
 "октомври",
 "ноември",
 "декември");

// tooltips
Calendar._TT = {};
Calendar._TT["TOGGLE"] = "Toggle first day of week";
Calendar._TT["PREV_YEAR"] = "Предишна година (задръж за меню)";
Calendar._TT["PREV_MONTH"] = "Предишен месец (задръж за меню)";
Calendar._TT["GO_TODAY"] = "ДНЕС";
Calendar._TT["NEXT_MONTH"] = "Следващ месец (задръж за меню)";
Calendar._TT["NEXT_YEAR"] = "Следваща година (задръж за меню)";
Calendar._TT["SEL_DATE"] = "Изберете дата";
Calendar._TT["DRAG_TO_MOVE"] = "Влачи за да преместиш";
Calendar._TT["PART_TODAY"] = " (днес)";
Calendar._TT["MON_FIRST"] = "Display Monday first";
Calendar._TT["SUN_FIRST"] = "Display Sunday first";
Calendar._TT["CLOSE"] = "затвори";
Calendar._TT["TODAY"] = "днес";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "dd.mm.y";
Calendar._TT["TT_DATE_FORMAT"] = "D, M d";

Calendar._TT["WK"] = "wk";


$(function () {
    $.format.locale({
        date: {
            format: 'dd.MM.yyyy',
            monthsFull: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            daysFull: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            timeFormat: 'hh:mm tt',
            shortDateFormat: 'dd.MM.yyyy',
            longDateFormat: 'dddd, MMMM dd, yyyy'
        },
        number: {
            format: '0.00',
            groupingSeparator: ',',
            decimalSeparator: '.'
        }
    });
});


(function ($) {
    var defaults = {
        num_edge_entries: 1
        , ellipse_text: "..."
        , prev_text: "Предишна"
        , next_text: "Следваща"
    };

    var old = $.fn.pagination
    $.fn.pagination = function (maxentries, opts) {
        old.call(this, maxentries, $.extend(defaults, opts));
    };
})(jQuery);


var STR_INCORRECT_FORMAT = "Некоректен формат: ";
var STR_DATE_FORMAT = "дд.мм.гггг";
var STR_AMOUNT_FORMAT_DESC = "От 1 до 11 цифри, десетична точка или запетая, от 0 до 2 цифри. \nПримери: '123,45', '6.15', '0.1'";
var STR_AMOUNT_RESTRICTION = "Сумата не може да бъде отрицателна или нула."
var STR_YES = "Да";
var STR_NO = "Не";

var STR_LOADING = "ЗАРЕЖДАНЕ";
var STR_INVALID_NUM_MVTS = "Трябва да изберете 1 или 2 движения.";
var STR_AT_LEAST_1_ACC = "Изберете поне една сметка.";
var STR_ONLY_1_ACC = "Изберете точно една сметка.";
var STR_ONLY_1_CNTR = "Изберете точно една страна.";
var STR_ONLY_1_TEMPL = "Изберете точно един шаблон.";
var STR_MUST_SEL_BAE = "Трябва да изберете банков клон.";
var STR_ONLY_1_TYPE = "Изберете точно един тип";

var STR_MUST_SEL_WDAY = "Изберете ден от седмицата.";
var STR_MUST_SEL_MDAY = "Изберете ден от месеца.";

var STR_SAME_BAES = "RINGS не може да бъде избран при вътрешен превод в Societe Generale Експресбанк.";

var STR_ORDER_100000_WARN = "Превод на сума по-голяма или равна на 100 000 се обработва като RINGS.";
var STR_INV_NOTIF_NAME = "Невалидно име.";
var STR_INV_SUBSCR_NAME = "Невалидно име.";

var STR_INV_NOTIF_FROM_AMT = "Невалидна сума от";
var STR_INV_NOTIF_TO_AMT = "Невалидна сума до";

var strLang = "bg-BG";
var STR_RINGS = "Избрали сте плащане през системата RINGS. Сигурни ли сте?";

var STR_BISERA_CHECK = "Въвели сте невалиден символ за системата Бисера, който в момента е заменен с '?'. Моля, проверете въведените данни.";

var STR_NO_CAPICOM = "Вашия браузър не може да работи с цифрови подписи!";
var STR_CONFIRM = "Сигурни ли сте?";
var STR_FOREIGN_CORRBANK = "Въведете име, град и държава на кореспондент или BIC код";
var STR_FOREIGN_PAYEEBANK = "Въведете Държава, Име на банка и Банков код; или Държава, Име на банка и Град; или BIC код на контрагента";

var STR_INTERNAL_FOREIGN = "Сметките трябва да са в една и съща валута";

var STR_EXPENSES = "Всички разходи трябва да са за сметка на наредителя";
var STR_DIRTYMONEY = "Моля, попълнете произход на парите";
var STR_NO_DAYS_CHOSEN = "Няма избрани дни от седмицата";
var STR_NO_MONTHS_CHOSEN = "Няма избрани месеци от годината";
var STR_NO_NUMBER_CHOSEN = "Трябва да изберете валидно число";
var STR_NO_ACC_CHOSEN = "Няма избрани сметки";
var STR_ONLY_ONE_ACCEPTED = "Можете да получите информация по SMS само за 1 движение";

var STR_NOTBGN_ACCOUNT = "Сметката на получателя трябва да е левова.";
var STR_NOTBUDGET_ACCOUNT = "Сметката трябва да започва с 5 или с 3.";
var STR_NOTBGN_ACCOUNT_PR = "Сметката на платеца трябва да е левова."; var STR_WRONG_ACCOUNTS = "Избрали сте невалидни сметки.";
var STR_WRONG_LIMIT = "Некоректно въведен лимит.";

var STR_CHECK_CONFIRM = "Моля потвърдете";
var STR_LESS_OR_EQUAL = " трябва да е по-малък или равен на ";

var STR_MUST_SEL_BIC = "Трябва да изберете BIC код.";
var STR_DATE_WRONG_PERIOD = "Грешен период";

var STR_DIRTYMONEY = "Не е деклариран произход на средствата съгласно ЗМИП!"; var STR_DATE_WRONG_PERIOD = "Грешен период";
var STR_STAT_FORM_COUNTRY = "За чуждестранно лице не е допустимо да бъде посочвана държава България!";

var STR_LIABILITY_PERSON = "Внимание! Не е въведено името на задълженото лице, ще бъде използвано името на наредителя!";
var STR_IDENTITY = "Въведете БУЛСТАТ, ЛНЧ или ЕГН!";

var STR_LIMIT_VALUE_DATE_F_CCY = "Невалиден вальр на валутно плащане.";
var STR_LIMIT_PAYEE_EU_IBAN = "Невалиден IBAN на получателя.";
var STR_PAYMENT_ALREADEY_SIGNED = "Плащането вече е подписано!";

var STR_PLEASE_WAIT = "моля, изчакайте...";

var STR_IMPORT_FILE_EMPTY = "Не е избран файл за импорт.";

var STR_DEPOSIT_ADD_AMOUNT_MIN = "Минималната сума за довнасяне към депозит е";
var STR_DEPOSIT_ADD_AMOUNT_MAX = "Позволената сума за довнасяне към депозит е до 30000 лева!";

var STR_DEPOSIT_REQUEST_AMOUNT_MIN = "Минималната сума за откриване на депозит е";
var STR_DEPOSIT_REQUEST_AMOUNT_MAX = "Позволената сума за откриване на депозит е до 30000 лева!";
var STR_DEPOSIT_REQUEST_AMOUNT_MAX2 = "Позволената сума за откриване на депозит е до";

var STR_DEPOSIT_REQUEST_CCY = "Можете да откривате депозити само в съответните валути:";

var STR_TRANSFER_DECLARATION_REQUIRED = "Трябва да попълните декларация за произход на пaрите!";
var STR_ID_YES = "ДА";
var STR_ID_NO = "НЕ";
var STR_MSG_MIN_DOWNPAYMENT = "Невалидна първоначална вноска. Първоначалната вноска трябва да бъде мин. 5% върху покупната цена за срок на лизинга до 36 мес. \n и мин. 10% за срок на лизинга по-голям от 36 мес. !";
var STR_MSG_MIN_AMOUNT = "Невалидна покупна цена. Покупната цена трябва да бъде мин. ";
var STR_MSG_MAX_DOWNPAYMENT = "Невалидна първоначална вноска.Първоначалната вноска трябва да бъде по-малка от ";
var STR_LIABILITY_PERSON_BUL_OR_EGN = 'Внимание! При превод към бюджета  се попълва само едно от полетата "Булстат на задълженото лице" или "ЕГН/ЛНЧ на задълженото лице", в зависимост от това по чия партида трябва да бъде отнесена сумата.';
var STR_CANT_MAKE_BG_PAYMET_FROM_CCY = 'Избраната валута не съответства на IBAN на получателя за тови вид превод.';
var STR_WARNING_IBAN_STARTS_WITH_BG_BUT_BANK_NOT = 'Възможен некоректен формат: Проверете IBAN на получателя.';
var STR_INCORRECT_INPUTS_DEFAULT_MSG = 'Данните, попълнени в маркираните с червено полета, са некоректни. Моля проверете ги.';

var STR_GLOBUL_NO_AMOUNT = "Не можете да платите - няма задължение.";
var STR_GLOBUL_HAVE_AMOUNT = "Не можете да платите - имате задължение.";

var STR_GLOBUL_LESS_AMOUNT = "Не можете да платите - сумата е недостатъчна.";
var STR_GLOBUL_MUCH_AMOUNT = "Не можете да платите - сумата е по-голяма от допустимото.";

var STR_GLOBUL_MUST_CHECK = "Моля, проверете задължението си.";

var STR_GLOBUL_NO_AMOUNT = "Не можете да платите - няма задължение.";
var STR_GLOBUL_HAVE_AMOUNT = "Не можете да платите - имате задължение.";

var STR_GLOBUL_LESS_AMOUNT = "Не можете да платите - сумата е недостатъчна.";
var STR_GLOBUL_MUCH_AMOUNT = "Не можете да платите - сумата е по-голяма от допустимото.";

var STR_GLOBUL_MUST_CHECK = "Моля, проверете задължението си.";

var STR_PMT_SIGN_OK = "Плащането е подписано успешно";
var STR_PMT_SIGN_NOT_OK = "Плащането не е подписано успешно";
var STR_PMT_SENT_OK = "Плащането е изпратено успешно";
var STR_PMT_SENT_NOT_OK = "Плащането не е изпратено успешно";
var STR_REQUIRED_FIELD = "Полето е задължително";

var STR_SESSION_EXPRED = "Сесията Ви е изтекла";
var STR_ERROR = "Грешка";

var STR_BGNAME = "България";
var ID_STR_FINANCIAL_SUMMARY = "Текущо състояние";


var ID_STR_FOREIGN_DESCR2 = "Вид операция";
var STR_AVAILABLE = "Налични";
var STR_PENDING = "Чакащи";
var ID_STR_FORGOTTEN_PASSWORD = "Забравена парола";
var ID_STR_CERT_INVALID = "Невалиден сертификат";
var ID_STR_VALIDATION_ERROR_MAXLEN = "Моля, въведете не повече от {0} символа.";
var ID_STR_NEED_CERT_FOR_DEPOSIT_OPEN_ERROR_MSG = "Необходим Ви е сертификат, за да направите заявка за откриване на депозит.";
var ID_STR_DEPOSIT_OPEN_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за откриване на депозит. Сигурни ли сте, че искате да откажете формата за откриване на депозит?";
var ID_STR_DEPOSIT_CLOSE_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за закриване на депозит. Сигурни ли сте, че искате да откажете формата за закриване на депозит?";
var ID_STR_TARGET_SAVING_OPEN_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за откриване на целево спестяване. Сигурни ли сте, че искате да откажете формата за откриване на целево спестяване?";
var ID_STR_MESSAGE_INSTRUCTION_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за инструкция към банката. Сигурни ли сте, че искате да откажете формата за инструкция към банката?";
var ID_STR_ACCOUNT_OPEN_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за откриване на разплащателна сметка. Сигурни ли сте, че искате да откажете формата за откриване на сметка?";
var ID_STR_ACCOUNT_CLOSE_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за закриване на разплащателна сметка. Сигурни ли сте, че искате да откажете формата за закриване на сметка?";
var ID_STR_VIRTUAL_CREDIT_CANCEL_CERT_MSG = "Необходим Ви е сертификат, за да направите заявка за виртуален кредит. Сигурни ли сте, че искате да откажете формата за виртуален кредит?";

var STR_ALERT_LOGOUT = "Препоръчваме Ви да изберете бутона за 'Изход' преди да затворите браузъра си, тъй като в противен случай потребителската Ви сесия ще остане активна.\nСигурни ли сте, че искате да затворите Вашия браузър и да оставите текущата сесия активна?";
var STR_10K_FX = "Нареждания за обмяна на валута по договорен курс се приемат за суми над 10,000 EUR или тяхната равностойност.";
var STR_EMPTY_FILE = "Не сте избрали файл.";
var STR_FILE_MAX_128 = "Името на файла трябва да съдържа максимум 128 символа.";
var STR_FILE_CANNOT_BE_READ_IE = "Файлът не може да бъде прочетен. Моля, проверете настройките на браузъра си, съгласно инструкцията за използване на сертификати в Internet Explorer.";
var ID_STR_CONFIRM_FILE = "Подписване на файл";
var STR_PACKET_UPLOAD_PENDING = "Нареждането се обработва. Моля изчакайте...";
var STR_PACKET_CONTENT_ERROR = "Файлът не може да бъде прочетен. Моля проверете, че е избран коректен формат на файла.";