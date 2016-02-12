<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="pokemon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PokemonRepository")
 */
class Pokemon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="pokemons")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string $trainerName
     *
     * @ORM\Column(name="trainer_name", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $trainerName;

    /**
     * @var string $pokemonName
     *
     * @ORM\Column(name="pokemon_name", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $pokemonName;

    /**
     * @var int $currentLevel
     *
     * @ORM\Column(name="current_level", type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $currentLevel;

    /**
     * @var int $finalLevel
     *
     * @ORM\Column(name="final_level", type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $finalLevel;

    /**
     * @var bool $evolve
     *
     * @ORM\Column(name="evolve", type="boolean")
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $evolve;

    /**
     * @var bool $evTrain
     *
     * @ORM\Column(name="ev_train", type="boolean")
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $evTrain;

    /**
     * @var string $evToTrain
     *
     * @ORM\Column(name="ev_to_train", type="string", length=255)
     *
     */
    private $evToTrain;

    /**
     * @var bool $rushOrder
     *
     * @ORM\Column(name="rush_order", type="boolean")
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $rushOrder;

    /**
     * @var string $moveToKeep
     *
     * @ORM\Column(name="move_to_keep", type="string", length=255)
     *
     */
    private $moveToKeep;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Pokemon
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Pokemon
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrainerName()
    {
        return $this->trainerName;
    }

    /**
     * @param string $trainerName
     *
     * @return Pokemon
     */
    public function setTrainerName($trainerName)
    {
        $this->trainerName = $trainerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPokemonName()
    {
        return $this->pokemonName;
    }

    /**
     * @param string $pokemonName
     *
     * @return Pokemon
     */
    public function setPokemonName($pokemonName)
    {
        $this->pokemonName = $pokemonName;

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentLevel()
    {
        return $this->currentLevel;
    }

    /**
     * @param int $currentLevel
     *
     * @return Pokemon
     */
    public function setCurrentLevel($currentLevel)
    {
        $this->currentLevel = $currentLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getFinalLevel()
    {
        return $this->finalLevel;
    }

    /**
     * @param int $finalLevel
     *
     * @return Pokemon
     */
    public function setFinalLevel($finalLevel)
    {
        $this->finalLevel = $finalLevel;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEvolve()
    {
        return $this->evolve;
    }

    /**
     * @param boolean $evolve
     *
     * @return Pokemon
     */
    public function setEvolve($evolve)
    {
        $this->evolve = $evolve;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEvTrain()
    {
        return $this->evTrain;
    }

    /**
     * @param boolean $evTrain
     *
     * @return Pokemon
     */
    public function setEvTrain($evTrain)
    {
        $this->evTrain = $evTrain;

        return $this;
    }

    /**
     * @return string
     */
    public function getEvToTrain()
    {
        return $this->evToTrain;
    }

    /**
     * @param string $evToTrain
     *
     * @return Pokemon
     */
    public function setEvToTrain($evToTrain)
    {
        $this->evToTrain = $evToTrain;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isRushOrder()
    {
        return $this->rushOrder;
    }

    /**
     * @param boolean $rushOrder
     *
     * @return Pokemon
     */
    public function setRushOrder($rushOrder)
    {
        $this->rushOrder = $rushOrder;

        return $this;
    }

    /**
     * @return string
     */
    public function getMoveToKeep()
    {
        return $this->moveToKeep;
    }

    /**
     * @param string $moveToKeep
     *
     * @return Pokemon
     */
    public function setMoveToKeep($moveToKeep)
    {
        $this->moveToKeep = $moveToKeep;

        return $this;
    }
}
