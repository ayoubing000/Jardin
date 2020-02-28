<?php


namespace JardinBundle\Redirection;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router ;
    }

    /**
     * @param Resquest $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $roles =$token->getRoles();
        $rolesNames = array_map(function($role){return $role->getRole();}, $roles);


        #var_dump($roles);
        if (in_array('ROLE_ADMIN', $rolesNames, true)){
            $redirection = new RedirectResponse($this->router->generate('user_home'));
        }else{
            $redirection = new RedirectResponse($this->router->generate('club_index'));
        }


        return $redirection;
    }
}