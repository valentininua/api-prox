<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use App\Services\CarService;

/**
 * Class PostController
 * @package App\Controller
 * @Route("/api", name="api")
 */
class ApiController extends AbstractController
{
    /**
     * @param CarService $carService
     */
    public function __construct(
        private CarService  $carService,
    )
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     *
     * @Route("/getNewBaseByNumberCar", name="all", methods={"GET","POST"})
     */
    public function handler(Request $request): JsonResponse
    {
        try {
            $numberCar = json_decode($request->getContent(), true)['number_car']; //'Т934ВН50';
            $req = $this->carService->sendNewBaseByNumberCar($numberCar);

            if (isset($req['info']) && count($req['info'])) {
                 $this->carService->saveNewBaseByNumberCar($req,[
                     'ip' => $request->getClientIp(),
                     'numberCar'=> $numberCar
                 ]);
            }

            return new JsonResponse($req);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 422,
                'error' => "Proxy error",
                'info' => $e->getMessage(),
            ], 422);
        }
    }
}
