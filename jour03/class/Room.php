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
}
