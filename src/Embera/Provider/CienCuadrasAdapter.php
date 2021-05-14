<?php

namespace HouseParty\Adapters;

use HouseParty\House;

class CienCuadrasAdapter implements AdapterInterface
{
    protected $http;

    public function __construct($http)
    {
        $this->http = $http;
    }

    public function seekHouseWith($params)
    {
        $return = [];

        $data = $this->createPostData($params);
        $results = $this->http->post('https://api.ciencuadras.com/api/realestates', $data, [
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-site',
        ]);

        $results = json_decode($results);

        if (!$results) {
            return $return;
        }

        foreach ($results->data->result as $r) {
            $return[] = new House([
                'id' => $r->codigo,
                'origin' => 'ciencuadras',
                'price' => $r->precio_venta_original,
                'url' => 'https://ciencuadras.com/' . ltrim($r->url_inmueble, '/ '),
                'metadata' => [
                    'name' => $r->tipotransaccion . ' - ' . $r->barrio . ' - ' . $r->localidad . ' - ' . $r->codigo,
                    'image' => $r->url_foto,
                    'contact' => implode(',', [ $r->contacto_whatsapp, $r->contacto_llamada]),
                    'zone' => $r->barrio,
                    'area' => $r->area_construida,
                    'rooms' => $r->num_habitaciones
                ],
            ]);
        }

        return $return;
    }

    protected function createPostData($params)
    {
        return '{
          "status": false,
          "any": [],
          "criteria": [
            {
              "transactionType": "venta"
            },
            {
              "realEstateType": "casa"
            },
            {},
            {},
            {},
            {
              "IwantWith": [
                {
                  "lift": false
                },
                {
                  "childrenArea": false
                },
                {
                  "surveillance": false
                },
                {
                  "deposit": false
                },
                {
                  "communalLiving": false
                },
                {
                  "fitnessCenter": false
                },
                {
                  "swimmingpool": false
                },
                {
                  "serviceRoom": false
                },
                {
                  "furnished": false
                },
                {
                  "greenZones": false
                },
                {
                  "allowsPets": false
                },
                {
                  "schoolsAndGardens": false
                },
                {
                  "urbanTransport": false
                },
                {
                  "malls": false
                },
                {
                  "parks": false
                },
                {
                  "supermarkets": false
                },
                {
                  "neighborhoodShops": false
                },
                {
                  "hospitals": false
                }
              ]
            },
            {
              "city": "bogota"
            },
            {
              "orderBy": {}
            },
            {
              "salePrice": {
                "from": ' . $params['min_price'] . ',
                "to": ' . $params['max_price'] . '
              }
            },
            {
              "rentalPrice": {}
            },
            {},
            {
              "antiquity": {
                "from": 5,
                "to": 100
              }
            },
            {},
            {
              "proyect": 0
            },
            {
              "location": "' . $params['neighborhood'] . '"
            },
            {
              "neighborhood": "' . $params['neighborhood'] . '"
            },
            {},
            {},
            {
              "departmentReal": null
            },
            {
              "cityReal": "' . $params['city'] . '"
            },
            {
              "locationReal": "' . $params['neighborhood'] . '"
            },
            {
              "neighborhoodReal": "' . $params['neighborhood'] . '"
            },
            null,
            {
              "countCityRepeat": 1
            },
            {
              "offer": 0
            },
            {},
            {},
            {},
            {},
            {},
            {},
            {
              "isSortingFincaRaiz": false
            },
            {
              "hasFilter": true
            },
            {
              "auction": 0
            },
            {
              "sorting": "num_banos"
            },
            {
              "stratum": []
            },
            {
              "builderName": []
            },
            {
              "foreignColombian": null
            }
          ],
          "pathurl": "venta/bogota/usaquen/usaquen/casa",
          "numberPaginator": 1,
          "totalAsc": 0
        }';
    }

}

