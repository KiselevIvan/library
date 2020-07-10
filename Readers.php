<html>
<head>
    <title>Читатели</title>
    <?php require_once "back/connect.php";?>
    <?php require_once "Classes/Reader.php";?>

    <style>
        dialog {
            background: rgba(255, 255, 255, 0.7);
            width: 300px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/reader/script.js"></script>
</head>
<body>
    <div>
        <table id="readers" style="border-style: solid">
            <thead>
            <th>Номер читателя</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Адрес</th>
            <th>Серия паспорта</th>
            <th>Номер паспорта</th>
            <th>Номер телефона</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
            <input type="button" id="openDialog" value="Добавить">
            <input type="button" id="updateReaders" onclick="updateReaders()" value="Обновить">
        </div>`
    </div>

 <dialog>
    <?php require_once "readerForm.php" ?>
    <p>
        <input type="submit" id="Submit" value="Ок" form="reader">
        <input type="button" id="closeDialog" value="Отмена">
    </p>
 </dialog>

    <script>
         var dlg = document.querySelector('dialog');
         document.querySelector('#openDialog').onclick = function() {
             dlg.show();
         }
         document.querySelector('#closeDialog').onclick = function() {
             $('form input[type="text"] , form input[type="number"').val('');
             $('#reader').prop('title', '');
             dlg.close();
             //window.location.reload(1);
         }
    </script>
 </body>
 </html>