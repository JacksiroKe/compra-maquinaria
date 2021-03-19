<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ajax;

class AjaxController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_specific_properties(Request $request) {
        $category = $request ->equipment_category;

        $specific_field_data = Ajax::getSpecificField($category);

        $title_structure = Ajax::getTitleStructure($category);

        return response() ->json([
            'spec_field_data' => $specific_field_data,
            'title_structure' => $title_structure
        ]);
    }

    public function get_equipment_category(Request $request) {
        $type = $request ->equipment_type;

        $category_data = Ajax::getCategoryField($type);

        return response() ->json($category_data);
    }

    public function get_Modell(Request $request) {
        $make = $request ->make;

        $modell_data = Ajax::getModell($make);

        return response() ->json($modell_data);
    }

    public function get_state_list(Request $request) {
        $country = $request ->country;
        
        $state_list = Ajax::getStatesOfCountries($country);

        return response() ->json($state_list);
    }

    public function get_make_models (Request $request) {
        $category = $request->ecat;

        $modell = Ajax::getModellByCategory($category);

        $make = Ajax::getMakeByCategory($category);

        return response() ->json([
            'makes' => $make,
            'Models' => $modell
        ]);
    }
}