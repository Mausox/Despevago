<?php  
  
namespace App\Http\Controllers;  
  
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PaymentMethod;
use App\PaymentHistory;
  
class PaymentMethodController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return PaymentMethod::all();  
    }  
  
    /**  
     * Show the form for creating a new resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function create()  
    {  
        return view('despevago.payment_methods.createPaymentMethod');
    }  
  
    /**  
     * Store a newly created resource in storage.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response  
     */  
    public function store(Request $request)  
    {
        request()->validate([
            'card_name' => 'required',
            'account_number' => 'required',
            'expiration_date' => 'required',
        ]);
        $user_id = $request->user()->id;
        $payment_method = PaymentMethod::create($request->all());
        $payment_method->save();
        $payment_method->users()->attach($user_id);

        return redirect('user/profile')->with('status', 'You have added a new payment method');
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return PaymentMethod::find($id);   
    }  
  
    /**  
     * Show the form for editing the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function edit($id)  
    {  
        //  
    }  
  
    /**  
     * Update the specified resource in storage.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function update(Request $request, $id)  
    {  
        PaymentMethod::find($id)->update($request->all());   
        return "PaymentMethod {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        PaymentMethod::destroy($id); 
        return "PaymentMethod {$id} was deleted"; 
    }

    public function paymentForm(Request $request){
        $user = User::find($request->user()->id);

        $payment_methods = $user->payment_methods()->get();
        $payment_method_card = array();

        foreach ($payment_methods as  $payment_method)
        {
            $payment_method_card[$payment_method->id] = $payment_method->card_name;
        }

        return view('despevago.payment_methods.addPayment', ['payment_methods' => $payment_method_card]);
    }

    public function paymentAdd(Request $request){

        request()->validate([
            'payment_method_id' => 'required',
            'amount' => 'required|integer',
        ]);

        $payment_method = PaymentMethod::find($request->payment_method_id);

        $payment_history = new PaymentHistory();
        $payment_history->bank_name = $payment_method->card_name;
        $payment_history->account_number = $payment_method->account_number;
        $payment_history->amount = $request->amount;
        $payment_history->date = Carbon::now();
        $payment_history->hour = Carbon::now();
        $payment_history->user_id = $request->user()->id;
        $payment_history->save();

        return redirect('user/profile')->with('status', 'You have succesfully added credit to your account!');
    }
}



