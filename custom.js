function getValue() {
    var field = document.getElementById("num_questions");
    var value = parseInt(field.value);
    return value;
}
function minus() {
    var val = getValue();
    if(val == 1) {
        
    }
    else if(val > 1) {
        setValue(val - 1);
    }
    else {
        setValue(10);
    }
}
function plus() {
    var val = getValue();
    if(val > 0) {
        setValue(val + 1);
    }
    else {
        setValue(10);
    }
}
function setValue(val) {
    var field = document.getElementById("num_questions");
    field.value = val;
}

window.onload = function() {
    document.getElementById("minus").addEventListener("click", minus);
    document.getElementById("plus").addEventListener("click", plus);
}