<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class student{
            public $fname;
            public $lname;
            public $bdate;
            public $country;
            function __construct($fname,$lname,$bdate,$country)
            {
                $this->fname=$fname;
                $this->lname=$lname;
                $this->bdate=$bdate;
                $this->country=$country;
            }
            function displayDetails(){
                return "Student Name : $this->fname $this->lname, Birthdate : $this->bdate, From: $this->country";
            }
            function displayName(){
                return "Student Name : $this->fname $this->lname";
            }


            /**
             * Get the value of fname
             */ 
            public function getFname()
            {
                        return $this->fname;
            }

            /**
             * Set the value of fname
             *
             * @return  self
             */ 
            public function setFname($fname)
            {
                        $this->fname = $fname;

                        return $this;
            }
        }

        $marcelo = new student("Marcelo","Romero","2012","Brazil");
        $marcelo->setFname("kkk");
        echo $marcelo->displayDetails();
    ?>
</body>
</html>