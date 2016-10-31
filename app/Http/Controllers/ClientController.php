<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

use DB;

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
       //form validation server side
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $clients = Client::create($data); 
        if($clients->id>0){
            $this->set_message("Clients created successfully");
        }else{
            $this->set_message("Couldn\'t create new Clients");
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
        $this->set_message("Clients updated successfully");
        return redirect('clients');
           //form validation server side
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            $this->set_message("Client deleted successfully");
            return redirect('clients');
        }
        else
            $this->set_message("Client couldn\'t be deleted");
            return redirect('clients');
    }
    
    public function csvExport($id){
//        $clients = Client::all();
//        $output='';
//        foreach ($clients as $row) {
//            $output.=  implode(",",$row->toArray());
//        }
//        $headers = array(
//            'Content-Type' => 'text/csv',
//            'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
//        );
//
//        return Response::make(rtrim($output, "\n"), 200, $headers);
        
         $clients = Client::all();

        $formatter = Formatter::make($entitiesArray, Formatter::ARR);

        $csv = $formatter->toCsv();

        header('Content-Disposition: attachment; filename="export.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");

        echo $csv;
    }
}
