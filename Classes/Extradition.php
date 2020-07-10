<?php


class extradition
{
    private $idextradition;
    private $reader_idreader;
    private $book_idbook;
    private $dateExtradition;
    private $datePlaneReturn;
    private $dateReturn;

    public function setExtradition($POST)
    {
        $this->idextradition=null;
        $this->reader_idreader=$POST["reader_idreader"];
        $this->book_idbook=$POST["book_idbook"];
        $this->dateExtradition=date("Y-m-d");
        $this->datePlaneReturn=$POST["datePlaneReturn"];
        $this->dateReturn=null;
    }

    public function loadExtradition($id,$pdo)
    {
        $ide=intval($id);
        if(intval($ide)){
            $stmt = $pdo->prepare("select * from extradition where idextradition = :id");
            $stmt->bindParam(':id', $ide);
            if($stmt->execute()){
                $r = $stmt->fetch(PDO::FETCH_NUM);
                $this->idextradition=$ide;
                $this->reader_idreader=$r[1];
                $this->book_idbook=$r[2];
                $this->dateExtradition=$r[3];
                $this->datePlaneReturn=$r[4];
                $this->dateReturn=$r[5];
            }
        }
        return $r;
    }

    public function insert($pdo)
    {
        $query="insert into extradition (reader_idreader,book_idbook,
dateExtradition, datePlaneReturn,dateReturn)
 values(:reader_idreader, :book_idbook, :dateExtradition, :datePlaneReturn, :dateReturn);";
        $stmt = $pdo->prepare($query);

        $stmt -> bindParam(':reader_idreader',$this->reader_idreader);
        $stmt -> bindParam(':book_idbook',$this->book_idbook);
        $stmt -> bindParam(':dateExtradition',$this->dateExtradition);
        $stmt -> bindParam(':datePlaneReturn',$this->datePlaneReturn);
        $stmt -> bindParam(':dateReturn',$this->dateReturn);
        return $stmt->execute();
    }

    public function update($id,$pdo)
    {
        $ide=intval($id);
        if(intval($ide)) {
            $query = "UPDATE extradition set reader_idreader = :reader_idreader,
 book_idbook = :book_idbook, dateExtradition = :dateExtradition ,
  datePlaneReturn = :datePlaneReturn,dateReturn =:dateReturn
   where idextradition  = :id";
            $stmt = $pdo->prepare($query);
            $stmt -> bindParam(':reader_idreader',$this->reader_idreader);
            $stmt -> bindParam(':book_idbook',$this->book_idbook);
            $stmt -> bindParam(':dateExtradition',$this->dateExtradition);
            $stmt -> bindParam(':datePlaneReturn',$this->datePlaneReturn);
            $stmt -> bindParam(':dateReturn',$this->dateReturn);
            $stmt -> bindParam(':id',$ide);
            return $stmt->execute();
        }
    }

    public function getIdextradition()
    {
        return $this->idextradition;
    }

    public function getReaderIdreader()
    {
        return $this->reader_idreader;
    }

    public function getBookIdbook()
    {
        return $this->book_idbook;
    }

    public function getDateExtradition()
    {
        return $this->dateExtradition;
    }

    public function setDateExtradition($dateExtradition)
    {
        $this->dateExtradition = $dateExtradition;
    }

    public function getDatePlaneReturn()
    {
        return $this->datePlaneReturn;
    }

    public function setDatePlaneReturn($datePlaneReturn)
    {
        $this->datePlaneReturn = $datePlaneReturn;
    }

    public function getDateReturn()
    {
        return $this->dateReturn;
    }

    public function setDateReturn($dateReturn)
    {
        $this->dateReturn = $dateReturn;
    }
}