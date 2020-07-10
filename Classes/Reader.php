<?php

class reader
{
    private $libraryCardNumber;
    private $fname;
    private $lname;
    private $patronymic;
    private $address;
    private $passportSeries;
    private $passportNumber;
    private $phoneNumber;
    private $fullName;

    public static function delReader($id,$pdo)
    {
        $idb=intval($id);
        if(intval($idb)){
            $stmt = $pdo->prepare("DELETE FROM reader WHERE libraryCardNumber = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result =$stmt->execute();
        }
        return $result;
    }

    public function setReader($POST)
    {
        $this->libraryCardNumber=null;
        $this->fname=$POST["fname"];
        $this->lname=$POST["lname"];
        $this->patronymic=$POST["patronymic"];
        $this->address=$POST["address"];
        $this->passportSeries=$POST["passportSeries"];
        $this->passportNumber=$POST["passportNumber"];
        $this->phoneNumber=$POST["phoneNumber"];
        $this->fullName=$POST["fullName"];
    }

    public function loadReader($id,$pdo)
    {
        $idr=intval($id);
        if(intval($idr)){
            $stmt = $pdo->prepare("select * from reader where libraryCardNumber = :id");
            $stmt->bindParam(':id', $id);
            if($stmt->execute()){
                $r = $stmt->fetch(PDO::FETCH_NUM);
                $this->libraryCardNumber=idr;
                $this->fname=$r[1];
                $this->lname=$r[2];
                $this->patronymic=$r[3];
                $this->address=$r[4];
                $this->passportSeries=$r[5];
                $this->passportNumber=$r[6];
                $this->phoneNumber=$r[7];
                $this->fullName=$r[8];
            }
        }
        return $r;
    }

    public function insert($pdo)
    {
        $query="insert into reader  (fname,lname,patronymic,address,passportSeries,passportNumber,phoneNumber)
 values(:fname,:lname,:patronymic,:address,
:passportSeries,:passportNumber,:phoneNumber);";
        $stmt = $pdo->prepare($query);

        $stmt -> bindParam(':fname',$this->fname);
        $stmt -> bindParam(':lname',$this->lname);
        $stmt -> bindParam(':patronymic',$this->patronymic);
        $stmt -> bindParam(':address',$this->address);
        $stmt -> bindParam(':passportSeries',$this->passportSeries);
        $stmt -> bindParam(':passportNumber',$this->passportNumber);
        $stmt -> bindParam(':phoneNumber',$this->phoneNumber);
        return $stmt->execute();
    }

    public function update($id,$pdo)
    {
        $idr=intval($id);
        if(intval($idr)) {
            $query = "UPDATE reader set fname = :fname, lname = :lname, 
patronymic = :patronymic , address = :address,passportSeries =:passportSeries, 
passportNumber = :passportNumber, phoneNumber = :phoneNumber where libraryCardNumber = :id";
            $stmt = $pdo->prepare($query);
            $stmt -> bindParam(':fname',$this->fname);
            $stmt -> bindParam(':lname',$this->lname);
            $stmt -> bindParam(':patronymic',$this->patronymic);
            $stmt -> bindParam(':address',$this->address);
            $stmt -> bindParam(':passportSeries',$this->passportSeries);
            $stmt -> bindParam(':passportNumber',$this->passportNumber);
            $stmt -> bindParam(':phoneNumber',$this->phoneNumber);
            $stmt -> bindParam(':id',$idr);
            return $stmt->execute();
        }
    }


    public function getLibraryCardNumber()
    {
        return $this->libraryCardNumber;
    }

    public function setLibraryCardNumber($libraryCardNumber): void
    {
        $this->libraryCardNumber = $libraryCardNumber;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function setFname($fname): void
    {
        $this->fname = $fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function setLname($lname): void
    {
        $this->lname = $lname;
    }

    public function getPatronymic()
    {
        return $this->patronymic;
    }

    public function setPatronymic($patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getPassportSeries()
    {
        return $this->passportSeries;
    }

    public function setPassportSeries($passportSeries): void
    {
        $this->passportSeries = $passportSeries;
    }

    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    public function setPassportNumber($passportNumber): void
    {
        $this->passportNumber = $passportNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
}
?>