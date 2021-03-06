<?php

namespace GovWiki\UserBundle\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

/**
 * Class LogoutSuccessHandler
 * @package GovWiki\FrontendBundle\Redirection
 */
class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function onLogoutSuccess(Request $request)
    {
        $referer = $request->server->get('HTTP_REFERER');

        if (!empty($referer)) {
            return new RedirectResponse($referer);
        }
        return new RedirectResponse('/');
    }
}
