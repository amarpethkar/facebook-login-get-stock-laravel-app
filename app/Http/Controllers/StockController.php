<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Stock;
use DB;

class StockController extends Controller
{
    /**
     * Display Stock Blade View.
     */
    public function stockView()
    {
        return view('stock');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {       
        // $stockQuotes = DB::select('SELECT * FROM stocks'); // fire sql query here
        // $stockQuotes =  Stock::all(); // get all records 
        // $stockQuotes =  Stock::orderBy('id', 'desc')->get(); // get all records by desc order
        $stockQuotes =  Stock::orderBy('id', 'desc')->where('user_fb_id', $id)->paginate(5); // get user specific records with pagination
        return view('stock')->with('stockQuotes', $stockQuotes);
    }

    public function storeStock(Request $request)
    {
        $data = $request->all();
        $data['name'] = strtoupper(trim($data['name']));
        $apiResponse = Http::get('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='.$data['name'].'&apikey=0O18XUJW9P8QVGQJ')->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["Global Quote"];
        // check is api responce is empty if not create a new recoard @ stock table against currenty logged in user and return success else retun empty
        if(!empty($apiResponse)){
            $newStockQuote = new Stock;
            $newStockQuote->symbol = $apiResponse["01. symbol"];
            $newStockQuote->high = $apiResponse["03. high"];
            $newStockQuote->low = $apiResponse["04. low"];
            $newStockQuote->price = $apiResponse["05. price"];
            $newStockQuote->user_fb_id = $data['user_id'];
    
            $newStockQuote->save();
           
            return 'success';
        } else {
            return 'empty';
        }
        
    }
}
