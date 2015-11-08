<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    private $base_url = 'www.priceline.com/pws/v0/stay/retail/listing/';


    public function index()
    {
        return view('welcome');
    }

    public function start()
    {
        return view('start');
    }


    public function search(Request $request)
    {
        $params = $request->all();
        //Listings Search
        // https://www.priceline.com/pws/v0/stay/retail/listing/new%20york?rguid=3459_Hackathon&check-in=20151201&check-out=20151202&currency=USD&response-options=DETAILED_HOTEL,NEARBY_ATTR,HOTEL_IMAGES&rooms=1&sort=HDR&offset=0&page-size=5

        // Single Listing
        // https://www.priceline.com/pws/v0/stay/retail/listing/detail/3000016152?all-inclusive=false&cguid=bf77ac74b956443a911e4c56d9ad8ad5&check-in=20151107&check-out=20151108&currency=USD&offset=0&page-name=Hotels-Listing&page-size=40&popcount-since-mins=120&response-options=TRIP_FILTER_SUMMARY,POP_COUNT,DETAILED_HOTEL,NEARBY_CITY,CLUSTER_INFO,SPONS&rguid=2015110703104469001021-1446911565641-NSRLM&rooms=1
        $checkin_date = $params['check-in'];
        $checkout_date = $params['check-out'];
        $max_price = $params['max-price'];
        $rooms = $params['rooms'];
        $term = $this->getRandomLocation();
        $encodeTerm = urlencode($term);
        $cookieID = time().'_Hackathon';

        $form_params = [
            'check-in' => $checkin_date,
            'check-out' => $checkout_date,
            'max-price' => $max_price,
            'rooms' => $rooms,
        ];

        $listings_url = $this->base_url.$encodeTerm;
        $listingsResponse = (new Client())->get($listings_url, [
            'rguid' => $cookieID,
            'currency' => 'USD',
            'check-in' => $checkin_date,
            'check-out' => $checkout_date,
            'rooms' => $rooms,
            'max-price' => $max_price,
            'offset' => 0,
            'page-size' => 15,
        ]);

        $listings = json_decode($listingsResponse->getBody()->getContents());
        $listingsList = $listings->hotels;

        $hotelId = $listingsList[rand(0, count($listingsList))]->hotelId;

        $hotel_url = 'http://www.priceline.com/pws/v0/stay/retail/listing/detail/'.$hotelId.'?check-in='.$checkin_date.'&check-out='.$checkout_date.'&rooms='.$rooms.'&max-price='.$max_price;

        $client = new Client();
        $hotelResponse = $client->get($hotel_url);

        $hotel = json_decode($hotelResponse->getBody()->getContents());

        return view('explore', [
            'hotel' => $hotel,
            'prev_params' => $form_params
        ]);
    }

    public function searchJS(Request $request) {
        $params = $request->all();
        //Listings Search
        // https://www.priceline.com/pws/v0/stay/retail/listing/new%20york?rguid=3459_Hackathon&check-in=20151201&check-out=20151202&currency=USD&response-options=DETAILED_HOTEL,NEARBY_ATTR,HOTEL_IMAGES&rooms=1&sort=HDR&offset=0&page-size=5

        // Single Listing
        // https://www.priceline.com/pws/v0/stay/retail/listing/detail/3000016152?all-inclusive=false&cguid=bf77ac74b956443a911e4c56d9ad8ad5&check-in=20151107&check-out=20151108&currency=USD&offset=0&page-name=Hotels-Listing&page-size=40&popcount-since-mins=120&response-options=TRIP_FILTER_SUMMARY,POP_COUNT,DETAILED_HOTEL,NEARBY_CITY,CLUSTER_INFO,SPONS&rguid=2015110703104469001021-1446911565641-NSRLM&rooms=1
        $checkin_date = $params['check-in'];
        $checkout_date = $params['check-out'];
        $max_price = $params['max-price'];
        $rooms = $params['rooms'];
        $term = $this->getRandomLocation();
        $encodeTerm = urlencode($term);
        $cookieID = time().'_Hackathon';

        $form_params = [
            'check-in' => $checkin_date,
            'check-out' => $checkout_date,
            'max-price' => $max_price,
            'rooms' => $rooms,
        ];

        $listings_url = $this->base_url.$encodeTerm;
        $listingsResponse = (new Client())->get($listings_url, [
            'rguid' => $cookieID,
            'currency' => 'USD',
            'check-in' => $checkin_date,
            'check-out' => $checkout_date,
            'rooms' => $rooms,
            'max-price' => $max_price,
            'offset' => 0,
            'page-size' => 15,
        ]);

        $listings = json_decode($listingsResponse->getBody()->getContents());
        $listingsList = $listings->hotels;

        $hotelId = $listingsList[rand(0, count($listingsList))]->hotelId;

        $hotel_url = 'http://www.priceline.com/pws/v0/stay/retail/listing/detail/'.$hotelId.'?check-in='.$checkin_date.'&check-out='.$checkout_date.'&rooms='.$rooms.'&max-price='.$max_price;

        $client = new Client();
        $hotelResponse = $client->get($hotel_url);

        $hotel = json_decode($hotelResponse->getBody()->getContents());

        return response()->json($hotel);
    }


    protected function getRandomLocation() {
        $locations = [
            'Maui',
            'Yellowstone',
            'Grand Canyon',
            'San Francisco',
            'Yosemite',
            'Washington D.C.',
            'New York City',
            'Manhattan',
            'Miami',
            'Miami Beach',
            'San Jose',
            'Hollywood',
            'Honolulu - Oahu',
            'San Diego',
            'Orlando-Walt Disney World',
            'Charleston',
            'Jackson Hole',
            'Chicago',
            'Cape Cod',
            'New Orleans',
            'Las Vegas',
            'Anchorage',
            'Sedona',
            'Seattle',
            'Portland, OR',
        ];

        return $locations[rand(0, count($locations))];
    }


}
