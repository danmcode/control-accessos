<?php

namespace App\Http\Controllers\AccessControl;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AccessControl\Arl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\Vehicle;
use App\Models\AccessControl\Visitors;
use Illuminate\Support\Facades\Storage;
use App\Models\AccessControl\Equipments;
use Illuminate\Support\Facades\Validator;
use App\Models\AccessControl\vehicleTypes;
use App\Models\AccessControl\VisitorTypes;
use App\Models\AccessControl\EquipmentTypes;
use App\Models\AccessControl\IdentificationType;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('AccessControl.Visitors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
                //Get all identifications types
                $identificationTypes = IdentificationType::where('is_active', '=', true)
                ->get();
        
                //Get all companies
                $companies = Company::where('is_active', '=', true)
                ->get();

                $arls = Arl::where('is_active','=',true)
                ->get();

                $visitorTypes = VisitorTypes::where('is_active','=',true)->get();

                $equipmentsTypes = EquipmentTypes::where('is_active','=',true)->get();

                $vehiclestypes = vehicleTypes::where('is_active','=',true)->get();
         
                return view('AccessControl.Visitors.create',[
                    
                    'companies' => $companies,
                    'identificationTypes' => $identificationTypes,
                    'arls'=>$arls,
                    'visitorTypes'=>$visitorTypes,
                    'equipmentsTypes'=>$equipmentsTypes,
                    'vehiclestypes'=>$vehiclestypes,
                    'id'=>$id,
                ]);  

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request['id_collaborator'];
        $data = $request->all();

        
         $photo_path = $data['photoDataInput'];


        $photo = $this->saveImage($photo_path);

        


        $validarVisitante = Validator::make($data,[
            'identification'=> 'min:6|unique:visitors|string|max:255',
/*          'name_Visitor' => 'string|min:2|max:255',
            'lastname_Visitor' => 'string|min:2|max:255',
            'date_arl' => ['date', 'after:' .now()],
            'mark' => 'string|min:2|max:255',
            'serial' => 'string|min:2|max:255',
            'description' => 'string|min:2|max:255',
            'mark_car' => 'string|min:2|max:255',
            'Placa' => 'string|min:6|max:7',  */
        ]);


          if($validarVisitante->fails()){
            return redirect()->route('crear-visitante',['id' => $id])
            ->withErrors($validarVisitante);
         }else{  
         DB::transaction(function () use ($request) {
             try{
                $data = $request->all();

                $photo = $this->saveImage($data['photoDataInput']);

                

               //Insert into table Vehicle and equipment
               $vehicle = new Vehicle();
               $vehicle->mark = $data['mark_car'];
               $vehicle->placa = $data['Placa'];
               $vehicle->color = $data['color'];
               $vehicle->id_vehicle_type = $data['vehicle_type'];

               $vehicle->save();  
 
               $equipment = new Equipments();
               $equipment->mark = $data['mark'];
               $equipment->serial = $data['serial'];
               $equipment->description = $data['description'];
               $equipment->id_equipment_type = $data['equipment_type'];  

               $equipment->save();     

               
 
              //Insert into table Visitor
               $visitor = new Visitors();
               $visitor->photo_path = $photo;
               $visitor->identification_type = $data['identification_type'];
               $visitor->identification = $data['identification'];
               $visitor->name = $data['name_Visitor'];
               $visitor->last_name = $data['lastname_Visitor'];
               $visitor->visitor_type = $data['typeVisitor'];
               $visitor->company = $data['company'];
               $visitor->arl_id = $data['arl'];
               $visitor->date_arl = $data['date_arl'];
               $visitor->remission = $data['remission'];
               $visitor->equipment_type =  null;
               $visitor->vehicle_type = $vehicle->id;
               $visitor->id_collaborator = $data['id_collaborator'];
               $visitor->id_user = auth()->user()->id;  

               //Save in DB
               $visitor->save();

               // Después de que la transacción sea exitosa
                DB::commit();

                // Establece un mensaje de éxito en la sesión
                session()->flash('success', 'Se ha registrado el visitante con éxito');

               // Para definir una variable de sesión 'success' con un mensaje:
           }catch(\Exception $error){
               DB::rollBack();
                // Establece un mensaje de error en la sesión
                session()->flash('error', 'No se ha registrado el visitante con éxito.');
           }  
        });
        
        return redirect()->route('visitantes-index');

    }
}
    
    private function saveImage($image){

        if($image !='/images/default.png'){
            $photoData = preg_replace('/^data:image\/(jpeg|png|gif);base64,/', '', $image);
            $image = base64_decode($photoData);
            $fileName = uniqid() . '.png';

            $filePath = 'visitors/images/' . $fileName;
            Storage::disk('public')->put($filePath, $image);

            $Photo = "storage/" . $filePath;
        }else{
            $Photo = $image;
        }
        return $Photo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitors $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitors $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitors $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitors $visitor)
    {
        //
    }

    /**
     * See the view to add a visitor to a specific collaborator
     * TODO: Especificar el pk del usuario
     */
    public function createVisitorToColabollator()
    {

        return view('AccessControl.Visitors.create');
    }
}
