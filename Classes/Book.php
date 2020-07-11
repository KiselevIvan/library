<?php


//namespace library;


class book
{
    private $idbook;
    private $name;
    private $author;
    private $publishingHouse;
    private $yearOfPublishing;
    private $ISBN;
    private $count;
    private $currentCount;

    public static function delBook($id,$pdo)
    {
        $idb=intval($id);
        if(intval($idb)){
            $stmt = $pdo->prepare("DELETE FROM book WHERE idbook = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result=$stmt->execute();
        }
        return $result;
    }

    public function setBook($POST)
    {
        $this->idbook=null;
        $this->name=$POST["name"];
        $this->author=$POST["author"];
        $this->publishingHouse=$POST["pbHouse"];
        $this->yearOfPublishing=$POST["pbYear"];
        $this->ISBN=$POST["ISBN"];
        $this->count=$POST["count"];
        $this->currentCount=$POST["currentCount"];
    }

    public function loadBook($id,$pdo)
    {
        $idb=intval($id);
        if(intval($idb)){
        $stmt = $pdo->prepare("select * from booksinfo where idbook = :id");
        $stmt->bindParam(':id', $id);
            if($stmt->execute()){
        $b = $stmt->fetch(PDO::FETCH_NUM);
        $this->idbook=$idb;
        $this->name=$b[1];
        $this->author=$b[2];
        $this->publishingHouse=$b[3];
        $this->yearOfPublishing=$b[4];
        $this->ISBN=$b[5];
        $this->count=$b[6];
        $this->currentCount=$b[7];
            }
        }
        return $b;
    }

    public function insert($pdo)
    {
        $query="insert into book values(null,:name,:author,:pbHouse,:pbYear,:ISBN,:count);";
        $stmt = $pdo->prepare($query);

        $stmt -> bindParam(':name',$this->name);
        $stmt -> bindParam(':author',$this->author);
        $stmt -> bindParam(':pbHouse',$this->publishingHouse);
        $stmt -> bindParam(':pbYear',$this->yearOfPublishing);
        $stmt -> bindParam(':ISBN',$this->ISBN);
        $stmt -> bindParam(':count',$this->count);
        return $stmt->execute();
    }

    public function update($id,$pdo)
    {
        $idb=intval($id);
        if(intval($idb)) {
            $query = "UPDATE book set name = :name, author = :author , publishingHouse = :pbHouse,yearOfPublishing =:pbYear, ISBN = :ISBN, count = :count where idbook = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':pbHouse', $this->publishingHouse);
            $stmt->bindParam(':pbYear', $this->yearOfPublishing);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':count', $this->count);
            $stmt->bindParam(':id', $idb);
            return $stmt->execute();
        }
    }

    public function getIdbook()
    {
        return $this->idbook;
    }

    public function setIdbook($idbook)
    {
        $this->idbook = $idbook;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getPublishingHouse()
    {
        return $this->publishingHouse;
    }

    public function setPublishingHouse($publishingHouse)
    {
        $this->publishingHouse = $publishingHouse;
    }

    public function getYearOfPublishing()
    {
        return $this->yearOfPublishing;
    }

    public function setYearOfPublishing($yearOfPublishing)
    {
        $this->yearOfPublishing = $yearOfPublishing;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCurrentCount()
    {
        return $this->currentCount;
    }
}

?>