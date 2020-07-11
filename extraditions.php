<html>
<head>
    <title>Читатели</title>
    <?php require_once "back/connect.php";?>
    <?php require_once "Classes/Extradition.php";?>

    <style>
        dialog {
            background: rgba(255, 255, 255, 0.7);
            width: 600px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/extradition/script.js"></script>
</head>
<body>
    <div>
        <table id="extraditions" style="border-style: solid">
            <thead>
            <th>Номер читателя</th>
            <th>ФИО читателя</th>
            <th>Название книги</th>
            <th>Дата выдачи</th>
            <th>Плановая дата возврата</th>
            <th>Фактическая дата возврата</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
            <input type="button" id="openDialog" value="Добавить">
            <input type="button" id="updateExtraditions" onclick="updateExtraditions()" value="Обновить">
        </div>`
    </div>

    <dialog id="AddDialog">
        <?php require_once "extraditionForm.php" ?>
        <p>
            <input type="submit" id="Submit" value="Ок" form="reader">
            <input type="button" id="closeDialog" value="Отмена">
        </p>
    </dialog>

    <dialog id="readerDialog">
        <?php require_once "readerForm.php" ?>
        <p>
            <input type="button" id="closeReaderDialog" value="Закрыть">
        </p>
    </dialog>

    <dialog id="bookDialog">
        <?php require_once "bookForm.php" ?>
        <p>
            <input type="button" id="closeBookDialog" value="Закрыть">
        </p>
    </dialog>

    <script>
         var addDlg = document.querySelector('#AddDialog');
         document.querySelector('#openDialog').onclick = function() {
             addDlg.show();
             getBooksList();
             getReadersList();
         }
         document.querySelector('#closeDialog').onclick = function() {
             $('form input[type="text"] , form input[type="date"').val('');
             $('#reader').prop('title', '');
             addDlg.close();
         }
    </script>
 </body>
 </html>