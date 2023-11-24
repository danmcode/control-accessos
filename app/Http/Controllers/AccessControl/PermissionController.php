<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Permission;
use App\Models\User;
use App\Notifications\CustomNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {

        $rol = auth()->user()->rol_id;
        $permissions = '';
        if ($rol === 5) {
            $permissions = Permission::where('collaborator_permission', '=', auth()->user()->id)
                ->latest()
                ->get();
        } else {
            $permissions = Permission::where('allowed_by', '=', auth()->user()->id)->latest()->get();
        }

        // Limpiar nofiticaciones
        auth()->user()->unreadNotifications->markAsRead();

        return view('AccessControl.Permissions.index', ["permissions" => $permissions]);
    }

    public function create()
    {
        $this->authorize('accessAGSJCC', auth()->user());
        $DJAS = User::where('rol_id', 4)->get();
        return view('AccessControl.Permissions.create', ['DJAS' => $DJAS]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $start_hour_in = $data['start_hour'];
        $final_hour_in = $data['final_hour'];

        $start_hour_out = Carbon::createFromFormat('H:i', $start_hour_in);
        $final_hour_out = Carbon::createFromFormat('H:i', $final_hour_in);

        $diff_hours = $start_hour_out->diffInMinutes($final_hour_out);

        $validarPermiso = Validator::make($data, [
            'date_permission' => [
                'nullable',
                'after_or_equal:' . now()->format('d-m-Y')
            ],
        ]);

        if ($validarPermiso->fails()) {
            $errorsString = $validarPermiso->errors()->all();
            return redirect()->route('permission.create')->withErrors($errorsString);
        }

        $permissions = new Permission();
        $permissions->date_permission = $data['date_permission'];
        $permissions->collaborator_permission = auth()->user()->id;
        $permissions->start_hour = $start_hour_in;
        $permissions->final_hour = $final_hour_in;
        $permissions->diff_hours = $diff_hours;
        $permissions->reason_permission = $data['reason_permission'];
        $permissions->status_auth = null;
        $permissions->allowed_by = $data['allowed_by'];
        $permissions->observation = $data['observation'];

        $permissions->save();

        DB::commit();

        // Establece un mensaje de éxito en la sesión
        session()->flash('success', 'Registrado el permiso, pendiente en autorizar');

        //Se Establace la notificacion;
        $permissions->userJ->notify(new CustomNotification($permissions->id, $permissions->collaborator_permission, $permissions->status_auth));

        return redirect()->route('permission.create');
    }

    public function update(Request $request)
    {
        $data = $request->action;
        $id = $request->id_permission;

        // Encuentra el registro existente por su ID
        $permissions = Permission::find($id);

        if ($data === 'Aceptar') {
            $permissions->status_auth = true;
        } else {
            $permissions->status_auth = false;
        }

        $permissions->update();

        $permissions->userC->notify(new CustomNotification($permissions->id, $permissions->collaborator_permission, $permissions->status_auth));

        // Establece un mensaje de éxito en la sesión
        session()->flash('success', 'Estado de Permiso Actualizado');
        session()->flash('accion_realizada');

        return redirect()->route('permission');
    }
}
