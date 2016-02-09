<?php

namespace AppBundle\Manager;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 * Class UserManager
 *
 * @package AppBundle\Manager
 */
class UserManager
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var EncoderFactory
     */
    protected $encoder;

    /**
     * UserManager constructor.
     *
     * @param UserRepository $userRepository
     * @param EncoderFactory $encoderFactory
     */
    public function __construct(UserRepository $userRepository, EncoderFactory $encoderFactory)
    {
        $this->userRepository = $userRepository;
        $this->encoder        = $encoderFactory;
    }

    /**
     * @param User $user
     *
     * @return User
     */
    public function save(User $user)
    {
        $this->updatePassword($user);

        return $this->userRepository->save($user);
    }

    /**
     * @param $username
     *
     * @return User
     */
    public function getByUsername($username)
    {
        return $this->userRepository->getByUsername($username);
    }

    /**
     * @param User $user
     */
    private function updatePassword(User $user)
    {
        $password = $user->getPlainPassword();

        if (0 !== strlen($password)) {
            $encoder = $this->encoder->getEncoder($user);
            $user->setPassword($encoder->encodePassword($password, $user->getSalt()));
            $user->eraseCredentials();
        }
    }
}
