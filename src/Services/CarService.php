<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Repository\NewBaseByNumberCarRepository;

class CarService
{
    private const SERVER = 'http://135.181.116.15';

    /**
     * @param HttpClientInterface $client
     * @param NewBaseByNumberCarRepository $carRepository
     */
    public function __construct(
        private HttpClientInterface          $client,
        private NewBaseByNumberCarRepository $carRepository
    )
    {
    }

    /**
     * @param string $numberCar
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function sendNewBaseByNumberCar(string $numberCar = ''): array
    {
        $response = $this->client->request(
            'POST',
            self::SERVER . '/index/getNewBaseByNumberCar',
            [
                'headers' => [
                    'Content-Type' => 'text/plain',
                ],
                'json' => ['number_car' => $numberCar],
            ]
        );

        return $response->toArray();
    }

    public function saveNewBaseByNumberCar(array $car = [], array $info = [])
    {
        $this->carRepository->saveCarInfo($car, $info);
    }
}
