<?php

class Grade {
    public ?int $id;
    public ?int $grade_id;
    public ?string $name;
    public ?DateTime $year;

    public function __construct(?int $_id = null, ?int $_grade_id = null, ?string $_name = null, ?DateTime $_year = null){
        $this->id = $_id;
        $this->grade_id = $_grade_id;
        $this->name = $_name;
        $this->year = $_year;
    }
    public function getId(): ?int
    {
        return $this->id;  
    }
    public function getGradeId(): ?int
    {
        return $this->grade_id;  
    }
    public function getName(): ?string
    {
        return $this->name;  
    }
    public function getYear(): ?DateTime
    {
        return $this->year;  
    }
    public function setId(?int $id): static
    {
        $this->id = $id;
    }
    
    public function setgradeId(?int $grade_id): static
    {
        $this->grade_id = $grade_id;
    }
    
    public function setName(?string $name): static
    {
        $this->name = $name;
    }
    
    public function setYear(?DateTime $year): static
    {
        $this->year = $year;
    }
    public function findOneGrade(int $id): Grade
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    
        $stmt = $pdo->prepare("SELECT * FROM grades WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $gradeData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$gradeData) {
            return null;
        }
        
        $grade = new grade();
        $grade->setId($gradeData['id']);
        $grade->setGradeId($gradeData['floorId']);
        $grade->setName($gradeData['name']);
        $grade->setCapacity($gradeData['capacity']);
        
        return $grade;

    }
    public function getStudents(): ?array
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }

        $stmt = $pdo->prepare("SELECT students FROM grades WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $Students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Students;
    }
    
}

?>
