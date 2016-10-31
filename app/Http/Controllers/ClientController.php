<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Client;

use DB , Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $clientObj;
    function __construct() {
        $this->clientObj = new Client();
    }
    
    
    public function index()
    {
       $clients = $this->clientObj->fetchAll();
       return $this->loadpage('clients.list_clients','List of all Clients',compact('clients'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return $this->loadpage('clients.form_clients','Create Client');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClientFormRequest $request)
    {
        $data = $request->all();
        $clients = Client::create($data); 
        if($clients->id>0){
            $request->session()->flash('alert-success', 'Client Added successfully!');
        }else{
            $request->session()->flash('alert-danger', 'Couldn\'t create new Client!');
        }
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::find($id);
        return view('clients.form_clients',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $clients = Client::findOrFail($request->id);
        $clients->name     = $request->name;
        $clients->gender   = $request->gender;
        $clients->phone    = $request->phone;
        $clients->email    = $request->email;
        $clients->address  = $request->address;
        $clients->nationality  = $request->nationality;
        $clients->dob          = $request->dob;
        $clients->education_background  = $request->education_background;
        $clients->contact_mode  = $request->contact_mode;
        $clients->save();
        $request->session()->flash('alert-success', 'Client Updated successfully!');
        return redirect('clients');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            $request->session()->flash('alert-success', 'Client deleted successfully!');
            return redirect('clients');
        }
        else
            $request->session()->flash('alert-success', 'Client couldn\'t be deleted!');
            return redirect('clients');
    }
    
    public function csvExport(){
        
        $clients = Client::all();
        $filename = "Clients.csv";
        $handle = fopen($filename, 'w+'); 
        fputcsv($handle, array('Name', 'Gender', 'Phone', 'Email', 'Address', 'Nationality', 'DOB', 'Education Background', 'Contact Mode', 'Created Date'));
        foreach($clients as $row) {
            fputcsv($handle, array($row['name'],$row['gender'],$row['phone'],$row['email'],$row['address'], $row['nationality'], $row['dob'],$row['education_background'],$row['contact_mode'],$row['created_at']));
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return Response::download($filename, 'Clients.csv', $headers);
        
    }
    
}
