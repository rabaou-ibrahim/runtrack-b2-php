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
}

?>
