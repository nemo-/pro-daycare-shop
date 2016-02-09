<?php

namespace AppBundle\Security;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

/**
 * Class FormLoginAuthenticator
 *
 * @package AppBundle\Security
 */
class FormLoginAuthenticator extends AbstractFormLoginAuthenticator
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var EncoderFactory
     */
    private $encoder;

    /**
     * FormLoginAuthenticator constructor.
     *
     * @param Router         $router
     * @param EncoderFactory $encoderFactory
     */
    public function __construct(Router $router, EncoderFactory $encoderFactory)
    {
        $this->router  = $router;
        $this->encoder = $encoderFactory;
    }

    /**
     * @param Request $request
     *
     * @return array|void
     */
    public function getCredentials(Request $request)
    {

        if ($request->getPathInfo() != '/login_check') {
            return;
        }

        $username = $request->request->get('_username');
        $request->getSession()->set(Security::LAST_USERNAME, $username);
        $password = $request->request->get('_password');

        return [
            'username' => $username,
            'password' => $password,
        ];
    }

    /**
     * @param array                 $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['username'];

        return $userProvider->loadUserByUsername($username);
    }

    /**
     * @param array         $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        $plainPassword = $credentials['password'];
        $encoder = $this->encoder->getEncoder($user);
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());


        if ($password != $user->getPassword()) {
            throw new BadCredentialsException();
        }

        return true;
    }

    /**
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('security_login');
    }

    /**
     * @return string
     */
    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('homepage');
    }
}
