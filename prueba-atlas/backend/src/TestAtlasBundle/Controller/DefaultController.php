<?php

namespace TestAtlasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{

    /**
     * Comunicación entre el front y el back para crear un nuevo usuario
     * @param Request $request
     * @return JsonResponse
     */
    public function createUserAction(Request $request)
    {
        $dataUser = $request->getContent();
        $Service = $this->get('UsersService');

        try
        {
            $idUser = $Service->createUserBBDD($dataUser);

            return new JsonResponse(['status' => 'OK', 'id' => (string)$idUser]);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['status' => 'KO']);
        }

    }


    /**
     * Comunicación entre el front y el back para actualizar un usuario
     * @param Request $request
     * @return JsonResponse
     */
    public function updateUserAction($id, Request $request)
    {
        $dataUser = $request->getContent();
        $Service = $this->get('UsersService');

        try
        {
            $Service->updateUserBBDD($dataUser, $id);

            return new JsonResponse(['status' => 'OK', 'id' => $id]);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['status' => 'KO']);
        }

    }


    /**
     * Comunicación entre el front y el back para obtener un usuario
     * @param $id string Id del usuario
     * @return JsonResponse
     */
    public function getUserAction($id)
    {
        $Service = $this->get('UsersService');

        try
        {
            $user = $Service->getUserBBDD($id);

            return new JsonResponse($user);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['status' => 'KO']);
        }
    }


    /**
     * Comunicación entre el front y el back para obtener a todos los usuarios
     * @return JsonResponse
     */
    public function getUsersAction()
    {
        $Service = $this->get('UsersService');

        try
        {
            $users = $Service->getUsersBBDD();

            return new JsonResponse($users);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['status' => 'KO']);
        }
    }


    /**
     * Comunicación entre el front y el back para comprobar si existe un usuario por su email y documento identificativo
     * @param Request $request
     * @return JsonResponse
     */
    public function checkUserAction(Request $request)
    {
        $dataUser = json_decode($request->getContent(), true);

        $Service = $this->get('UsersService');

        try
        {
            $response = $Service->issetUser($dataUser['email'], $dataUser['document']);

            return new JsonResponse($response);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['isset' => false]);
        }
    }


    /**
     * Comunicación entre el front y el back para eliminar un usuario
     * @param $id
     * @return JsonResponse
     */
    public function deleteUserAction($id)
    {
        $Service = $this->get('UsersService');

        try
        {
            $Service->deleteUserBBDD($id);

            return new JsonResponse(['status' => 'OK']);

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return new JsonResponse(['status' => 'KO']);
        }
    }



}
