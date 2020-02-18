<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon;

class ExpiredProductController extends Controller
{
  public function index()
  {
    $this->checkpermission('product-list');
    $product = Product::join('productcategories', 'products.productcategory_id', '=', 'productcategories.id')
        ->select('products.*', 'productcategories.name as n')
        ->get();
        /* $dt = Carbon::now();

        $result = Product::query();
        $result = $result->where('expiry_date','<=', $dt->addDays(7));
        $product7dayes=$result->whereDate('expiry_date','>', $dt)->get();
        $product3month = Product::where('expiry_date','<=', $dt->addMonths(3))->get();
        $product6month = Product::where('expiry_date','<=', $dt->addMonths(6))->get();*/



          return view('backend.product.expiredlist', compact('product'));
  }
}
