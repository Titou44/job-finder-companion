<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    public static $TYPE_CUSTOMER = 'Customer';
    public static $TYPE_SOFTWARE_VENDOR = 'Software vendor';
    public static $TYPE_RECRUITMENT_COMPANY = 'Recruitment company';
    public static $TYPE_SOLUTION_PROVIDER = 'Solution provider';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $grading;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getGrading(): ?int
    {
        return $this->grading;
    }

    public function setGrading(?int $grading): self
    {
        $this->grading = $grading;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
    public static function getTypes()
    {
        return  [
            Company::$TYPE_SOLUTION_PROVIDER=>Company::$TYPE_SOLUTION_PROVIDER,
            Company::$TYPE_RECRUITMENT_COMPANY=>Company::$TYPE_RECRUITMENT_COMPANY,
            Company::$TYPE_SOFTWARE_VENDOR=>Company::$TYPE_SOFTWARE_VENDOR,
            Company::$TYPE_CUSTOMER=>Company::$TYPE_CUSTOMER,
        ];
    }
}
