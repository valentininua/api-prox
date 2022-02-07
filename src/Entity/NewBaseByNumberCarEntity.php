<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="log_number_car")
 * @ORM\HasLifecycleCallbacks()
 */
class NewBaseByNumberCarEntity implements \JsonSerializable {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * Входящие данные ( гос номер)
     * @ORM\Column(type="string", length=100 , nullable=true)
     *
     */
    private ?string $numberCar = null;

    /**
     * Входящие данные (гос номер)
     * @ORM\Column(type="string", length=100,nullable=true)
     *
     */
    private ?string $ip = null;

    /**
     * @ORM\Column(type="json", nullable=true ,  nullable=true)
     */
     private ?array $respons = null;

    /**
     * Дата и время запроса | Дата и время ответа на запрос
     * @ORM\Column(type="datetime")
     */
    private $create_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreateDate(): ?\DateTime
    {
        return $this->create_date;
    }

    /**
     * @param \DateTime $create_date
     * @return NewBaseByNumberCarEntity
     */
    public function setCreateDate(\DateTime $create_date): self
    {
        $this->create_date = $create_date;
        return $this;
    }

    /**
     * @throws \Exception
     * @ORM\PrePersist()
     */
    public function beforeSave()
    {
        $this->create_date = new \DateTime('now', new \DateTimeZone('Europe/Moscow'));
    }

    /**
     * @return string|null
     */
    public function getNumberCar(): ?string
    {
        return $this->numberCar;
    }

    /**
     * @param string|null $numberCar
     */
    public function setNumberCar(?string $numberCar): void
    {
        $this->numberCar = $numberCar;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string|null $ip
     */
    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getRespons()
    {
        return $this->respons;
    }

    /**
     * @param mixed $respons
     */
    public function setRespons($respons): void
    {
        $this->respons = $respons;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize(): mixed
    {
        return [
            "ip" => $this->getIp(),
            "numberCar" => $this->getNumberCar(),
        ];
    }
}
