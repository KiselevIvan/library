$(document).ready(updateExtraditions())

$(document).on('click','#Submit',function(){
    var urlAdd='back/extradition/ExtraditionAdd.php';
    formSubmit("#Submit",'#extradition','extradition',urlAdd);
    return false;
});

$(document).on( 'click','#showReaderbtn',function(){
    $('#openDialog').trigger('click');
    var id=$(this).data('id');
    $('#reader').prop('title', id);
    var urlGet="back/reader/ReaderGet.php";
    var promise = getData(id,urlGet);
    promise.success(function (data) {
        fillForm(data);
    });
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

function fillForm(data) {
    data = JSON.parse(data);
    if(data){
        $('#fullnameReader').val(data['fullnameReader']);
        $('#nameBook').val(data['nameBook']);
        $('#dateExtradition').val(data['dateExtradition']);
        $('#datePlaneReturn').val(data['datePlaneReturn']);
        $('#dateReturn').val(data['dateReturn']);
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