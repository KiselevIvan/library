$(document).ready(updateReaders())

$(document).on('click','#Submit',function(){
    var urlAdd='back/reader/ReaderAdd.php';
    var urlEdit='back/reader/ReaderEdit.php';
    formSubmit("#Submit",'#reader','reader',urlAdd,urlEdit);
    return false;
});

$(document).on( 'click','#editbtn',function(){
    $('#openDialog').trigger('click');
    var id=$(this).data('id');
    $('#reader').prop('title', id);
    var urlGet="back/reader/ReaderGet.php";
    var promise = getData(id,urlGet);
    promise.success(function (data) {
        fillForm(data);
    });
});

$(document).on('click', '.delbtn',function(){
    if(confirm('Вы действительно хотите это удалить?')){
        var id = $(this).data('id');
        var urlDel="back/reader/ReaderDel.php";
        delData(id,urlDel);
    }
});

function fillForm(data) {
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

function updateReaders(){
    var urlGet="back/reader/ReaderGetAll.php";
    var promise = getArraySelect(urlGet);
    promise.success(function (data) {
        fillTable(data);
    });
}

function fillTable(data){
    data = JSON.parse(data);
    if(data){
        $("#readers").find("tr:gt(0)").remove();
        var table = $("#readers");

        $.each(data, function(key,value) {
            var rowNew = $("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
            rowNew.children().eq(0).text(value['libraryCardNumber']);
            rowNew.children().eq(1).text(value['fname']);
            rowNew.children().eq(2).text(value['lname']);
            rowNew.children().eq(3).text(value['patronymic']);
            rowNew.children().eq(4).text(value['address']);
            rowNew.children().eq(5).text(value['passportSeries']);
            rowNew.children().eq(6).text(value['passportNumber']);
            rowNew.children().eq(7).text(value['phoneNumber']);
            rowNew.children().eq(8).append("<a id='editbtn' data-id = "+value['libraryCardNumber']+"  href='javascript:void(0)'>Редактировать</a>");
            rowNew.children().eq(9).append("<a class='delbtn' data-id="+value['libraryCardNumber']+" href='javascript:void(0)'>Удалить</a>");
            rowNew.appendTo(table);
        });
    }
}
