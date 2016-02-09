<?php

namespace AppBundle\Security;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider
 *
 * @package AppBundle\Security
 */
class UserProvider implements UserProviderInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * UserProvider constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $username
     *
     * @return \AppBundle\Entity\User
     */
    public function loadUserByUsername($username)
    {
        $user = $this->getUserRepository()->getByUsername($username);

        if (!$user) {
            throw new UsernameNotFoundException();
        }

        return $user;
    }

    /**
     * @param UserInterface $user
     *
     * @return \AppBundle\Entity\User
     */
    public function refreshUser(UserInterface $user)
    {
        return $this->getUserRepository()->getByUsername($user->getUsername());
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'AppBundle\Entity\User';
    }

    /**
     * @return \AppBundle\Repository\UserRepository
     */
    public function getUserRepository()
    {
        return $this->em->getRepository('AppBundle:User');
    }
}