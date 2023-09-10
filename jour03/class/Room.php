<?php

class Room {
    private ?int $id;
    private ?int $floor_id;
    private ?string $name;
    private ?int $capacity;

    public function __construct(?int $_id = null, ?int $_floor_id = null, ?string $room_name = null, ?int $room_capacity = null){
        $this->id = $_id;
        $this->floor_id = $_floor_id;
        $this->name = $room_name;
        $this->capacity = $room_capacity;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getFloorId(): ?int
    {
        return $this->floor_id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getCapacity(): ?int
    {
        return $this->capacity;
    }
    public function setId(?int $id): static
    {
        $this->id = $id;
    }

    public function setFloorId(?int $floorId): static
    {
        $this->floor_id = $floorId;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
    }

    public function setCapacity(?int $capacity): static
    {
        $this->capacity = $capacity;
    }
    public function findOneRoom(int $id): Room
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    
        $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $roomData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$roomData) {
            return null;
        }
        
        $room = new Room();
        $room->setId($roomData['id']);
        $room->setFloorId($roomData['floorId']);
        $room->setName($roomData['name']);
        $room->setCapacity($roomData['capacity']);
        
        return $room;

    }
    public function getGrades(): ?array
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }

        $stmt = $pdo->prepare("SELECT grades FROM rooms WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $Grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Grades;
    }

}
