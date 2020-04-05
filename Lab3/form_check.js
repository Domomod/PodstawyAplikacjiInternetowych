function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}

function isNotAnEmail(str){
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    return !email.test(str);
}

function validate(formularz){
    var imie        = formularz.elements["f_imie"    ];
    var nazwisko    = formularz.elements["f_nazwisko"];
    var kod         = formularz.elements["f_kod"     ];
    var ulica       = formularz.elements["f_ulica"   ];
    var miasto      = formularz.elements["f_miasto"  ];
    var email       = formularz.elements["f_email"   ];

    return  checkStringAndFocus(imie, "Podaj imię!") 
    &&      checkStringAndFocus(nazwisko, "Podaj nazwisko!") 
    &&      checkStringAndFocus(kod, "Podaj kod!") 
    &&      checkStringAndFocus(ulica, "Podaj ulica!") 
    &&      checkStringAndFocus(miasto, "Podaj miasto!") 
    &&      checkEmailAndFocus (email, "Podaj właściwy e-mail");
}

function checkStringAndFocus(obj, msg) {
    return checkAnythingAndFocus(obj, msg, isWhiteSpaceOrEmpty);
}

function checkEmailAndFocus(obj, msg) {
    return checkAnythingAndFocus(obj, msg, isNotAnEmail);
}
   
function checkAnythingAndFocus(obj, msg, predicate)
{
    let str = obj.value;
    let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
    let errorField = document.getElementById(errorFieldName);
    if (predicate(str)) {
        errorField.innerHTML = msg;
        errorField.style.display = "block";
        obj.focus();
        return false;
    }
    else {
        errorField.innerHTML = "";
        errorField.style.display = "none";
        return true;
    }
}

function showElem(name){
    document.getElementById(name).style.visibility="visible";
}


function hideElem(name){
    document.getElementById(name).style.visibility="hidden";
}

function alterRows(i, e) {
    if (e) {
    if (i % 2 == 1) {
        e.setAttribute("style", "background-color: Aqua;");
    }
        e = e.nextSibling;
    while (e && e.nodeType != 1) {
        e = e.nextSibling;
    }
        alterRows(++i, e);
    }
}   

function nextNode(e) {
    while (e && e.nodeType != 1) {
    e = e.nextSibling;
    }
    return e;
   }
   function prevNode(e) {
    while (e && e.nodeType != 1) {
    e = e.previousSibling;
    }
    return e;
   }
   function swapRows(b) {
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
    if (form.value.length > maxSize)
    form.value = form.value.substring(0, maxSize);
    else
    msg.innerHTML = maxSize - form.value.length;
}