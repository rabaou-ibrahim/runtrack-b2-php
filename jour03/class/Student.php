<?php

class Student {
    private ?int $id;
    private ?int $grade_id;
    private ?string $email;
    private ?string $fullname;
    private ?DateTime $birthdate;
    private ?string $gender;

    public function __construct(?int $student_id = null, ?int $student_grade_id = null, ?string $student_email = null, ?string $student_fullname = null, ?DateTime $student_birthdate = null, ?string $student_gender = null){
        $this->id = $student_id;
        $this->grade_id = $student_grade_id;
        $this->email = $student_email;
        $this->fullname = $student_fullname;
        $this->birthdate = $student_birthdate;
        $this->gender = $student_gender;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getGradeId(): ?int
    {
        return $this->grade_id;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getFullname(): ?string
    {
        return $this->fullname;  
    }
    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }
    public function getGender(): ?string
    {
        return $this->gender;  
    }
    public function setId(?int $id): static
    {
        $this->id = $id;
    }
    
    public function setGradeId(?int $gradeId): static
    {
        $this->grade_id = $gradeId;
    }
    
    public function setEmail(?string $email): static
    {
        $this->email = $email;
    }
    
    public function setFullname(?string $fullname): static
    {
        $this->fullname = $fullname;
    }
    
    public function setBirthdate(?DateTime $birthdate): static
    {
        $this->birthdate = $birthdate;
    }
    
    public function setGender(?string $gender): static
    {
        $this->gender = $gender;
    }
    public function findOneStudent(int $id): Student
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $studentData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$studentData) {
            return null;
        }
        
        $student = new Student();
        $student->setId($studentData['id']);
        $student->setGradeId($studentData['gradeId']);
        $student->setEmail($studentData['email']);
        $student->setFullname($studentData['fullname']);
        $student->setBirthdate($studentData['birthdate']);
        $student->setGender($studentData['gender']);
        
        return $student;

    }
}
    