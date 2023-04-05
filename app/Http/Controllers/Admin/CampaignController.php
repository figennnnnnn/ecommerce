<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\Secondcampaign;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class CampaignController extends Controller
{
    public function Index(){
        $allcampaigns = Campaign::latest()->get();
        $allsecondcampaigns = Secondcampaign::latest()->get();
        return view('admin.allcampaign', compact('allcampaigns', 'allsecondcampaigns'));

    }


    public function AddCampaign(){
        $products = Product::latest()->get();
        return view('admin.addcampaign', compact('products'));
    }

    public function StoreCampaign(Request $request){
        $request->validate([
            'product_campaign_name' => 'required|unique:campaigns'
        ]);
        $product_id = $request->campaign_product_id;

        $product_name = Product::where('id', $product_id)->value('product_author');


        Campaign::insert([
            'product_campaign_name' => $request->product_campaign_name,
            'campaign_product_name' => $product_name,
            'campaign_product_id' => $request->campaign_product_id,
            'number' => $request->number,
            'slug' => strtolower(str_replace(' ', '-', $request->product_campaign_name))
        ]);

        Product::where('id', $product_id)->increment('campaign_count',1);

        return redirect()->route('allcampaign')->with('message', 'Campaign Added Successfully!');


    }

    public function StoreSecondCampaign(Request $request){
        
        $request->validate([
            'price_campaign_name' => 'required|unique:secondcampaigns'
        ]);

        Secondcampaign::insert([
            'price_campaign_name' => $request->price_campaign_name,
            'discount_rate' => $request->discount_rate,
            'bottom_border' => $request->bottom_border,
            'slug' => strtolower(str_replace(' ', '-', $request->price_campaign_name))
        ]);

        return redirect()->route('allcampaign')->with('message', 'Campaign Added Successfully!');

    }

    public function DeleteCampaign($id){
        Campaign::findOrFail($id)->delete();

        return redirect()->route('allcampaign')->with('message', 'Category Deleted Successfully!');
    }

    public function DeleteSecondcampaign($id){
        Secondcampaign::findOrFail($id)->delete();

        return redirect()->route('allcampaign')->with('message', 'Category Deleted Successfully!');
    }
}
