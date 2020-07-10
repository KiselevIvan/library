function formSubmit(idsubmit,idform,nameForm,urlAdd,urlEdit) {
    let data=$(idform).serialize();
    if (!!!$(idform).attr('title')) {
        sendAjaxForm(nameForm, urlAdd,data);
    } else {
        let id = $(idform).attr('title');
        data+= "&id=" + id;
        sendAjaxForm(nameForm, urlEdit,data);
    }
    $('#closeDialog').trigger('click');
}

function sendAjaxForm(ajax_form, url, data) {
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: data,
        success:function (result) {
alert(result);
        }
    });
}

function getData(id,urlGet){
    return $.ajax({
        url:urlGet,
        type:"POST",
        dataType:"html",
        data:'id='+id
    })
}

function getArraySelect(urlGet){
    return $.ajax({
        url:urlGet,
        type:"POST",
        dataType:"html"
    })
}

function delData(id,urlDel){
    $.ajax({
        url:urlDel,
        type:"POST",
        dataType:"html",
        data:'id='+id
    })
}