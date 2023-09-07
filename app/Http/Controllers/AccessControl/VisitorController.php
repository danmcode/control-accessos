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
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\Vehicles;
use App\Models\AccessControl\Visitors;
use Illuminate\Support\Facades\Storage;
use App\Models\AccessControl\Equipments;
use Illuminate\Support\Facades\Validator;
use App\Models\AccessControl\VehicleTypes;
use App\Models\AccessControl\VisitorTypes;
use App\Models\AccessControl\EquipmentTypes;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\IncomeExitVisitors;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = Visitors::with('VisitorType')
        ->with('Vehicle')
        ->with('Equipment')
        ->get();

        $vehicles = Vehicles::with('VehicleType')->get();

        $equipments = Equipments::with('EquipmentType')->get();
        
        $incomeExitVisitors = $this->Date_Hour_in($visitors);


        //dd($visitors,$vehicles,$equipments);
        return view('AccessControl.Visitors.index',compact('visitors','vehicles','equipments','incomeExitVisitors'));
    }

    private function Date_Hour_in($visitors){
        // Inicializa un arreglo para almacenar los registros de IncomeExitVisitors
        $incomeExitVisitors = [];

        // Recorre cada visitante y obtén su último registro de IncomeExitVisitors
        foreach ($visitors as $visitor) {
            $lastIncomeExitVisitor = IncomeExitVisitors::where('visitor_id', $visitor->id)
                ->orderBy('created_at', 'desc')
                ->first();

            $collaborator = Collaborator::getCollaboratorRelationById($visitor->id);

            // Agrega el registro al arreglo si se encontró
            if ($lastIncomeExitVisitor) {
                $incomeExitVisitors[] = $lastIncomeExitVisitor;
            }
        }
        
        return [$incomeExitVisitors,$collaborator];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
                //Get all identifications types
                $identificationTypes = IdentificationType::where('is_active', '=', true)
                ->get();

                $collaborator = Collaborator::getCollaboratorRelationById($id);
        
                //dd($collaborator);
                //Get all companies
                $companies = Company::where('is_active', '=', true)
                ->get();

                $arls = Arl::where('is_active','=',true)
                ->get();

                $visitorTypes = VisitorTypes::where('is_active','=',true)->get();

                $equipmentsTypes = EquipmentTypes::where('is_active','=',true)->get();

                $vehiclestypes = VehicleTypes::where('is_active','=',true)->get();
         
                
                 return view('AccessControl.Visitors.create',[
                    
                    'companies' => $companies,
                    'identificationTypes' => $identificationTypes,
                    'arls'=>$arls,
                    'visitorTypes'=>$visitorTypes,
                    'equipmentsTypes'=>$equipmentsTypes,
                    'vehiclestypes'=>$vehiclestypes,
                    'collaborator'=>$collaborator,
                ]);    

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request['id_collaborator'];
        $data = $request->all();

        $validarVisitante = Validator::make($data, [
            'identification' => 'min:6|unique:visitors|string|max:255',
            'date_arl' => [
                'nullable',
                'date',
                'after:' . now(),
            ],
        ]);


        if ($validarVisitante->fails()) {
            $errorsString = $validarVisitante->errors()->all();
            return redirect()->route('crear-visitante', ['id' => $id])->withErrors($errorsString);
        }



         DB::transaction(function () use ($request) {
             try{
                $data = $request->all();

                $mark = $data['mark_car'];
                $placa = $data['Placa'];
                $color = $data['color'];

                $mark_eq = $data['mark'];
                $serial = $data['serial'];
                $description = $data['description'];


                $photo = $this->saveImage($data['photoDataInput']);

                if(!is_null($mark)&&!is_null($placa)&&!is_null($color)){
               //Insert into table Vehicle and equipment
                    $vehicle = new Vehicles();
                    $vehicle->mark = $mark;
                    $vehicle->placa = $placa;
                    $vehicle->color = $color;
                    $vehicle->vehicle_type_id = $data['vehicle_type'];

                    $vehicle->save();
                }

                if(!is_null($mark_eq)&&!is_null($serial)&&!is_null($description)){
                    $equipment = new Equipments();
                    $equipment->mark = $mark_eq;
                    $equipment->serial = $serial;
                    $equipment->description = $description;
                    $equipment->equipment_type_id = $data['equipment_type'];  

                    $equipment->save();  
                }

                   

               
 
                    //Insert into table Visitor
                    $visitor = new Visitors();
                    $visitor->photo_path = $photo;
                    $visitor->identification_type = $data['identification_type'];
                    $visitor->identification = $data['identification'];
                    $visitor->name = $data['name_Visitor'];
                    $visitor->last_name = $data['lastname_Visitor'];
                    $visitor->visitor_type_id = $data['typeVisitor'];
                    $visitor->company = $data['company'];
                    $visitor->arl_id = $data['arl'];
                    $visitor->date_arl = $data['date_arl'];
                    $visitor->remission = $data['remission'];
                    $visitor->equipment_id = isset($equipment->id)?$equipment->id:null;
                    $visitor->vehicle_id = isset($vehicle->id)?$vehicle->id:null;
                    $visitor->id_collaborator = $data['id_collaborator'];
                    $visitor->id_user = auth()->user()->id;  

                    //Save in DB
                    $visitor->save();

                    // Insert into table IncomeExitVisitor
                    $Visitor_in = new IncomeExitVisitors();
                    $Visitor_in->date_time_in = Carbon::now();
                    $Visitor_in->date_time_out = null;
                    $Visitor_in->observation = $data['observation'];
                    $Visitor_in->visitor_id = $visitor->id;
                    $Visitor_in->created_by = auth()->user()->id;
                    $Visitor_in->updated_by = null;
                    $Visitor_in->registered_in_by = auth()->user()->id;
                    $Visitor_in->registered_out_by = null;

                    //Save in DB
                    $Visitor_in->save();

               // Después de que la transacción sea exitosa
                DB::commit();

                // Establece un mensaje de éxito en la sesión
                session()->flash('success', 'Registrado y puede Ingresar el Visitante');

               // Para definir una variable de sesión 'success' con un mensaje:
           }catch(\Exception $error){
               DB::rollBack();
                // Establece un mensaje de error en la sesión
                dd($error);
                session()->flash('error', 'No se ha registrado el visitante con éxito.');
           }  
        });
        
        return redirect()->route('visitantes-index');

    }
    
    private function saveImage($image){

        if($image !='images/default.png'){
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
