<?php

class Grade {
    public ?int $id;
    public ?int $room_id;
    public ?string $name;
    public ?DateTime $year;

    public function __construct(?int $_id = null, ?int $_room_id = null, ?string $_name = null, ?DateTime $_year = null){
        $this->id = $_id;
        $this->room_id = $_room_id;
        $this->name = $_name;
        $this->year = $_year;
    }
    public function getId(): ?int
    {
        return $this->id;  
    }
    public function getRoomId(): ?int
    {
        return $this->room_id;  
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
    
    public function setRoomId(?int $room_id): static
    {
        $this->room_id = $room_id;
    }
    
    public function setName(?string $name): static
    {
        $this->name = $name;
    }
    
    public function setYear(?DateTime $year): static
    {
        $this->year = $year;
    }
    
}

?>
