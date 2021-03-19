<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Specific;
use App\Models\Type;
use App\Models\Category;
use App\Models\Make;
use App\Models\Modell;
use App\Models\Truckmake;
use App\Models\Ajax;

class WelcomeController extends Controller
{
    public function index(Deal $model, Specific $specific, Type $type, Category $category, Make $make, Modell $modell, Truckmake $truckmake)
    {
        $types_modal = sizeof($type->all()) > 3 ? $type->skip(3)->take(100000)->get() : 'no_more';
        return view('pages.welcome', [
            'deals' => $model->paginate(10),
            'specifics' => $specific->all(),
            'types_first' => $type->skip(0)->take(3)->get(),
            'types_modal' => $type->all(),
            'categories' => $category->all(),
            'makes' => $make->all(),
            'modells' => $modell->all(),
            'truckmakes' => $truckmake->all()
        ]);
    }

    public function get_specifics_by_categories (Request $request) {
        $categoryAry = $request ->categories;

        $return_specAry = Ajax::getSpecificsByCategories($categoryAry);
        
        $return1 = Ajax::getMakeByCategories($categoryAry);
        $return2 = Ajax::getModellByCategories($categoryAry);

        if (empty($return_specAry)) {
            $return_specAry = "fail";
        }

        return response() ->json([
            'data_specific' => $return_specAry,
            'data_make' => $return1['data'],
            'data_make_modal' => $return1['data_modal'],
            'data_Model' => $return2['data'],
            'data_Model_modal' => $return2['data_modal']
        ]); 
    }

    public function get_cities_by_countries (Request $request) {
        $countryAry = $request ->countries;
        
        $return_countryAry = Ajax::getCitiesByCountries($countryAry);
        
        return response() ->json($return_countryAry);
    }

    public function get_if_truck (Request $request) {
        $categoryAry = $request ->categories;

        $return = Ajax::getIfTruckByCategories($categoryAry);

        return response() ->json($return);
    }

    public function get_categories_by_types (Request $request, Category $category) {
        $typeAry = $request ->types;

        $return1 = Ajax::getCategoryByTypes($typeAry);
        $return2 = Ajax::getCategoryByTypes($typeAry, 5);

        return response() ->json([
            'data_list' => $return1,
            'data_modal' => $return2
        ]);
    }

    public function get_Models_by_makes (Request $request) {
        $makeAry = $request ->makes;
        
        $return = Ajax::getModellByMake($makeAry);

        return $return;
    }

    public function get_deals_with_filter (Request $request, Specific $specific, Type $type, Category $category, Make $make, Modell $modell, Truckmake $truckmake) {
        $return = Ajax::getDealsWithFilter($request);
        
        if ($return == 'fail') {
            $pagination = "";
        } else {
            $pagination = (string) $return->links("vendor.pagination.ajax");
        }
        return response() ->json([
            'data' => $return,
            'pagination' => $pagination
        ]);
    } 

    public function get_specific_fields () {
        
    }
}
