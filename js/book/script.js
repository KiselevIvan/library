$(document).ready(function(){
    updateBooks();

})

$(document).on('click','#bookSubmit',function(){
    var urlAdd='back/book/BookAdd.php';
    var urlEdit='back/book/BookEdit.php';
    formSubmit("#bookSubmit",'#book','book',urlAdd,urlEdit);
    return false;
});

$(document).on( 'click','#editbtnBook',function(){
    $('#openDialog').trigger('click');
    var id=$(this).data('id');
    $('#book').prop('title', id);
    var urlGet="back/book/BookGet.php";
    var promise = getData(id,urlGet);
    promise.success(function (data) {
        fillForm(data);
    });
});

$(document).on('click', '.delbtn',function(){
    if(confirm('Вы действительно хотите это удалить?')){
        var id = $(this).data('id');
        var urlDel="back/book/BookDel.php";
        delData(id,urlDel);
    }
});

function fillForm(data) {
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

function updateBooks(){
    var urlGet="back/book/BookGetAll.php";
    var promise = getArraySelect(urlGet);
    promise.success(function (data) {
        fillTable(data);
    });
}

function fillTable(data){
    data = JSON.parse(data);
    if(data){
        $("#books").find("tr:gt(0)").remove();
        var table = $("#books");

        $.each(data, function(key,value) {
            var rowNew = $("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
            rowNew.children().eq(0).text(value['idbook']);
            rowNew.children().eq(1).text(value['name']);
            rowNew.children().eq(2).text(value['author']);
            rowNew.children().eq(3).text(value['publishingHouse']);
            rowNew.children().eq(4).text(value['yearOfPublishing']);
            rowNew.children().eq(5).text(value['ISBN']);
            rowNew.children().eq(6).text(value['count']);
            rowNew.children().eq(7).text(value['currentCount']);
            rowNew.children().eq(8).append("<a id='editbtnBook' data-id = "+value['idbook']+"  href='javascript:void(0)'>Редактировать</a>");
            rowNew.children().eq(9).append("<a class='delbtn' data-id="+value['idbook']+" href='javascript:void(0)'>Удалить</a>");
            rowNew.appendTo(table);
        });
    }
}
