<?php

namespace App\Http\Controllers;
use HepplerDotNet\FlashToastr\Flash;
use App\Exports\ServicesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Affectation;

class ServiceController extends Controller
{
    public function list()
    {
        $services = Service::all();
        return view('pages.services.list', compact('services'));
    }

    public function formulaire()
    {
        return view('pages.services.formulaire');
    }

    public function store(Request $request)
    {
        $request->validate([
           'nom_service' => 'required|string',
            'description'=> 'nullable|string', 
        
        ]);

        Service::create($request->all());
        Flash::info('success', 'Service ajoutée avec succès');
        return redirect()->route('services.list')
            ->with('success', 'Service ajoutée avec succès');
    }

    public function show(Service $service)
    {
        return view('pages.services.detail', compact('service'));
    }

    public function edit(Service $service)
    {
        
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom_service' => 'required|string',
            'description'=> 'nullable|string',  
        ]);
    
      
         $service->fill(['nom_service' => $request->input('nom_service')]);
        $service->fill(['description' => $request->input('description')]); 
        $service->save();
        Flash::info('success', 'service modifié avec succès');
        return redirect()->route('services.list')
            ->with('success', 'service modifié avec succès');
    }
 
    public function destroy(Service $service)
    {
        $service->delete();
        Flash::info('success', 'service supprimée avec succès');
        return redirect()->route('services.list')
            ->with('success', 'service supprimée avec succès');
    }
    public function export() 
    {
        return Excel::download(new ServicesExport, 'services.xlsx');
    }
}
