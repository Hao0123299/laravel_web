<?php

namespace App\Providers;

use App\Brand;
use App\CategoryProductModel;
use App\Coupon;
use App\Product;
use App\Slider;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*view()->composer('*', function ($view){
            //biến toàn cục
            $product = Product::all()->count();
            $slider = Slider::all()->count();
            $brand = Brand::all()->count();
            $coupon = Coupon::all()->count();
            $category = CategoryProductModel::all()->count();

            $view->with('product', $product)
                ->with('slider', $slider)
                ->with('brand', $brand)
                ->with('coupon', $coupon)
                ->with('category', $category);
        });*/

    }
}
