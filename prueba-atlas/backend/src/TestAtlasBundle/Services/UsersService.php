<?php

namespace TestAtlasBundle\Services;

use TestAtlasBundle\Entity\Users;


class UsersService
{

    /**
     * ORM encargado de mapear la base de datos
     * @var Registry
     */
    private $doctrine = null;

    /**
     * Entidad que maneja los datos de Doctrine
     * @var EntityManager
     */
    private $em = null;


    /**
     * UsersService constructor.
     * @param $doctrine
     */
    function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
        $this->em = $this->doctrine->getManager();
    }


    /**
     * Crea un nuevo usuario en la BBDD
     * @param $dataUser
     * @return bool|int
     */
    public function createUserBBDD($dataUser)
    {
        $User = new Users();

        $dataUser = json_decode($dataUser, true);

        try
        {
            $idUser = $this->setDataUser($User, $dataUser);

            return $idUser;
        }
        catch (\Exception $e)
        {
            return false;
        }

    }


    /**
     * Actualiza un usuario en la BBDD
     * @param $dataUser
     * @param $idUser
     * @return bool
     */
    public function updateUserBBDD($dataUser, $idUser)
    {
        $dataUser = json_decode($dataUser, true);

        try
        {
            $User = $this->em->getRepository('TestAtlasBundle:Users')->find((int)$idUser);

            if ($User)
            {
                $this->setDataUser($User, $dataUser);
            }

            return $idUser;
        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return false;
        }
    }


    /**
     * Obtiene un usuario de la BBDD
     * @param $idUser
     * @return array|bool
     */
    public function getUserBBDD($idUser)
    {
        $dataUser = [];

        try
        {
            $User = $this->em->getRepository('TestAtlasBundle:Users')->find((int)$idUser);

            if ($User)
            {
                $dataUser = [
                    'fullName' => $User->getFullName(),
                    'email' => $User->getEmail(),
                    'document' => $User->getDocument(),
                    'newsletter' => $User->getNewsletter(),
                    'captation' => $User->getCatchmentType(),
                    'address' => $User->getAddress(),
                    'zipCode' => $User->getZipCode(),
                    'area' => $User->getArea(),
                    'city' => $User->getCity(),
                    'country' => $User->getCountry(),
                    'comments' => $User->getComments()
                ];
            }
            return $dataUser;

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return false;
        }
    }


    /**
     * Obtiene a todos los usuarios de la BBDD
     * @return array|bool
     */
    public function getUsersBBDD()
    {
        $dataUser = [];

        try
        {
            $Users = $this->em->getRepository('TestAtlasBundle:Users')->findAll();

            if ($Users)
            {
                foreach ($Users as $User)
                {
                    $dataUser[$User->getId()] = [
                        'id' => $User->getId(),
                        'fullName' => $User->getFullName(),
                        'email' => $User->getEmail(),
                        'document' => $User->getDocument(),
                        'newsletter' => $User->getNewsletter(),
                        'captation' => $User->getCatchmentType(),
                        'address' => $User->getAddress(),
                        'zipCode' => $User->getZipCode(),
                        'area' => $User->getArea(),
                        'city' => $User->getCity(),
                        'country' => $User->getCountry(),
                        'comments' => $User->getComments()
                    ];
                }
            }

            return $dataUser;

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return false;
        }
    }


    /**
     * Elimina un usuario de la BBDD
     * @param $idUser
     * @return bool
     */
    public function deleteUserBBDD($idUser)
    {
        try
        {
            $User = $this->em->getRepository('TestAtlasBundle:Users')->find((int)$idUser);

            if ($User)
            {
                $this->em->remove($User);
                $this->em->flush();

                return true;
            }

        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return false;
        }
    }


    /**
     * Establece los datos de un usuario para su creación o actualización
     * @param Users $User
     * @param $dataUser
     * @return int
     */
    private function setDataUser(Users $User, $dataUser)
    {
        $User->setFullName($dataUser['fullName']);
        $User->setEmail($dataUser['email']);
        $User->setDocument($dataUser['document']);
        $User->setNewsletter($dataUser['newsletter']);
        $User->setAddress($dataUser['address']);
        $User->setCatchmentType($dataUser['captation']);
        $User->setZipCode($dataUser['zipCode']);
        $User->setArea($dataUser['area']);
        $User->setCity($dataUser['city']);
        $User->setCountry($dataUser['country']);
        $User->setComments($dataUser['comments']);

        $this->em->persist($User);
        $this->em->flush();

        return $User->getId();
    }


    /**
     * Comprueba si existe un usuario por email o documento de identidad
     * @param $email
     * @param $document
     * @return array
     */
    public function issetUser($email, $document)
    {
        $id = 0;

        try
        {
            $UsersRepository = $this->em->getRepository('TestAtlasBundle:Users');

            $User = $UsersRepository->checkIfIssetUser($email, $document);

            if ($User)
            {
                foreach ($User as $user)
                {
                    $id = $user->getId();
                }

                return ['isset' => true, 'id' => $id];
            }
            else
            {
                return ['isset' => false];
            }
        }
        catch (\Exception $e)
        {
            error_log($e->getMessage());

            return ['isset' => false];
        }
    }



}
