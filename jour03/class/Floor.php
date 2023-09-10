<?php
class Floor {
    private ?int $id;
    private ?string $name;
    private ?int $level;
    public function __construct(?int $floor_id = null, ?string $floor_name = null, ?int $floor_level = null)
    {
        $this->id = $floor_id;
        $this->name = $floor_name;
        $this->level = $floor_level;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getLevel(): ?int
    {
        return $this->level;
    }
    public function setId(?int $id): static
    {
        return $this->id;
    }
    public function setName(?string $name): static
    {
        return $this->name;
    }
    public function getLevel(?string $level): static
    {
        return $this->level;
    }
    public function findOneFloor(int $id): Floor
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    
        $stmt = $pdo->prepare("SELECT * FROM floors WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $floorData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$floorData) {
            return null;
        }
        
        $floor = new Floor();
        $floor->setId($floorData['id']);
        $floor->setName($floorData['name']);
        $floor->setLevel($floorData['level']);
        
        return $floor;

    }
    public function getRooms(): ?array
    {
        $dsn = 'mysql:host=hostname;dbname=database_name';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }

        $stmt = $pdo->prepare("SELECT rooms FROM floors WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $Rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Rooms;
    }
}

?>
