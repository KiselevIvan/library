<html>
<head>
    <title>Книги</title>
    <?php require_once "back/connect.php";?>
    <?php require_once "Classes/Book.php";?>

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
    <script src="js/book/script.js"></script>
</head>
<body>
    <div>
        <?php $stmt = $pdo->query('SELECT * FROM book');?>
        <?php $stmt->setFetchMode( PDO::FETCH_CLASS, 'book');?>
        <table id="books" style="border-style: solid">
            <thead>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Издательство</th>
            <th>Год</th>
            <th>ISBN</th>
            <th>Количество экземпляров</th>
            <th>Экземпляров в наличии</th>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch()) {?>
                <tr>
                    <td><?php echo $row->getIdbook()?></td>
                    <td><?php echo $row->getName()?></td>
                    <td><?php echo $row->getAuthor()?></td>
                    <td><?php echo $row->getPublishingHouse()?></td>
                    <td><?php echo $row->getYearOfPublishing()?></td>
                    <td><?php echo $row->getISBN()?></td>
                    <td><?php echo $row->getCount()?></td>
                    <td><?php echo $row->getCurrentCount()?></td>
                    <td><a id='editbtnBook' data-id = <?php echo $row->getIdbook() ?>  href='javascript:void(0)'>Редактировать</a></td>
                    <td><a class='delbtn' data-id=<?php echo $row->getIdbook() ?> href='javascript:void(0)'>Удалить</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div>
            <input type="button" id="openDialog" value="Добавить">
            <input type="button" id="updateBooks" onclick="updateBooks()" value="Обновить">
        </div>`
    </div>

 <dialog>
    <?php require_once "bookForm.php" ?>
    <p>
        <input type="submit" id="bookSubmit" value="Ок" form="book">
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
             $('#book').prop('title', '');
             dlg.close();
             //window.location.reload(1);
         }
    </script>
 </body>
 </html>