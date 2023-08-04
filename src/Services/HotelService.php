<?php

namespace App\Services;


use App\Entities\Hotel;
use App\Modules\EventDispatcher;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Exception;
use function DI\get;

final class HotelService extends ServiceCore
{
    private int $maxAvailableRooms = Hotel::MAX_AVAILABLE_ROOMS;

    public function __construct(
        private readonly HotelRepositoryInterface $hotelRepository,
        private readonly EventDispatcher $dispatcher
    ) {}

    public function indexData($data) : array
    {
        $this->data = $data;
        $this->hotels = $this->hotelRepository->all();
        //$this->hotel_rating = $this->getHotelRating($this->hotels[0]['id']);
        $this->weather = (new WeatherService())->getByCityId(1135625);
        return $this->data;
    }

    /**
     * @throws Exception
     */
    public function getHotelRating(int $hotelId): float
    {
        $hotel = $this->hotelRepository->find($hotelId);

        if (!$hotel) {
            throw new Exception('Hotel not found');
        }

        $reviews = $hotel->getReviews();
        $totalRatings = count($reviews);

        if ($totalRatings === 0) {
            return 0;
        }

        $totalScore = 0;
        foreach ($reviews as $review) {
            $totalScore += $review->getRating();
        }

        $averageRating = $totalScore / $totalRatings;
        $this->dispatcher->dispatch($hotel);
        return round($averageRating, 1);
    }

}