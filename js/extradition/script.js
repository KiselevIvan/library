$(document).ready(updateExtraditions())

$(document).on('click','#Submit',function(){
    var urlAdd='back/extradition/ExtraditionAdd.php';
    formSubmit("#Submit",'#extradition','extradition',urlAdd);
    return false;
});

$(document).on( 'click','#showReaderbtn',function(){
    readerDlg = document.querySelector('#readerDialog');
    readerDlg.show();
    var id=$(this).data('id');
    $('#reader').prop('title', id);
    var urlGet="back/extradition/ReaderGet.php";
    var promise = getData(id,urlGet);
    promise.success(function (data) {
        fillFormReader(data);
    });
});

$(document).on( 'click','#showBookbtn',function(){
    readerDlg = document.querySelector('#bookDialog');
    readerDlg.show();
    var id=$(this).data('id');
    var urlGet="back/extradition/BookGet.php";
    var promise = getData(id,urlGet);
    promise.success(function (data) {
        fillFormBook(data);
    });
});


$(document).on( 'click','#returnBookbtn',function(){
    var id=$(this).data('id');
    var url="back/extradition/ExtraditionReturnBook.php";
    $.ajax({
        url: url,
        type:"POST",
        dataType:"html",
        data:'id='+id
            });
});

$(document).on( 'click','#closeReaderDialog',function(){
    readerDlg = document.querySelector('#readerDialog');
    readerDlg.close();
});

$(document).on( 'click','#closeBookDialog',function(){
    readerDlg = document.querySelector('#bookDialog');
    readerDlg.close();
});

function showExtradition() {
    $('#openDialog').trigger('click');
    var id = $(this).data('id');
    $('#extradition').prop('title', id);
    var urlGet = "back/extradition/ExtraditionGet.php";
    var promise = getData(id, urlGet);
    promise.success(function (data) {
        fillForm(data);
    });
}

function fillFormReader(data) {
    data = JSON.parse(data);
    if(data){
        $('#fname').val(data[1]);
        $('#lname').val(data[2]);
        $('#patronymic').val(data[3]);
        $('#address').val(data[4]);
        $('#passportSeries').val(data[5]);
        $('#passportNumber').val(data[6]);
        $('#phoneNumber').val(data[7]);
    }
}

function fillFormBook(data) {
    data = JSON.parse(data);
    if(data){
        $('#name').val(data[1]);
        $('#author').val(data[2]);
        $('#pbHouse').val(data[3]);
        $('#pbYear').val(data[4]);
        $('#ISBN').val(data[5]);
        $('#count').val(data[6]);
    }
}

function updateExtraditions(){
    var urlGet="back/extradition/ExtraditionGetAll.php";
    var promise = getArraySelect(urlGet);
    promise.success(function (data) {
        fillTable(data);
    });
}

function fillTable(data){
    data = JSON.parse(data);
    if(data){
        $("#extraditions").find("tr:gt(0)").remove();
        var table = $("#extraditions");

        $.each(data, function(key,value) {
            var rowNew = $("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
            rowNew.children().eq(0).text(value['idextradition']);
            rowNew.children().eq(1).append("<a id='showReaderbtn' data-id = "+value['idextradition']+"  href='javascript:void(0)'>"+(value['fullName'])+"</a>");
            rowNew.children().eq(2).append("<a id='showBookbtn' data-id = "+value['idextradition']+"  href='javascript:void(0)'>"+(value['name'])+"</a>");
            rowNew.children().eq(3).text(value['dateExtradition']);
            rowNew.children().eq(4).text(value['datePlaneReturn']);
            rowNew.children().eq(5).text(value['dateReturn']);
            rowNew.children().eq(6).append("<a id='returnBookbtn' data-id = "+value['idextradition']+"  href='javascript:void(0)'>Вернуть</a>");
            rowNew.appendTo(table);
        });
    }
}

function getReadersList(){
    $.ajax({
        url: "back/extradition/GetAllReadersFullName.php",
        type:"POST",
        dataType:"html",
        success: function(data){
            data = JSON.parse(data);
            $.each(data, function( index, value ) {
                $('#readersList').append('<option value="'+value['libraryCardNumber']+'">'+value['fullname']+'</option>');
            });
        }
    });
}

function getBooksList(){
    $.ajax({
            url: "back/extradition/GetAllBooksName.php",
            type:"POST",
            dataType:"html",
            success: function(data){
                data = JSON.parse(data);
                $.each(data, function( index, value ) {
                $('#booksList').append('<option value="'+value['idbook']+'">'+value['name']+'</option>');
                });
            }
        });
}