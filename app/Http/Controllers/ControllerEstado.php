<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use App\Http\DAO\DaoEstado;
use App\Http\DAO\DaoPais;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ControllerEstado extends Controller{
    private $daoEstado;
    private $daoPais;   

    public function __construct(){        
        $this->daoEstado = new DaoEstado();
        $this->daoPais = new DaoPais();
        
    }

    public function index(){
        $estados = $this->daoEstado->all(true);
        $paises = $this->daoPais->all(true);
         return view('estados.index', compact('estados','paises'));
    }

    
    public function create(){
        
    }

    
    public function store(Request $request){
        $estado = $this->daoEstado->create($request->all());
        $store  = $this->daoEstado->store($estado);
        if($store){
            return redirect('/estado')->with('success', 'Estado adicionado com sucesso!');
        } 
    }

   
    public function show($id){
       
    }

    
    public function edit($id){
        
    }

    
    public function update(Request $request){        
       // dd($request->id, $request->estado, $request->uf, $request->id_pais, $request->data_create, $request->data_alt);
        $id = $request->id;
        $update = $this->daoEstado->update($request, $id);
        if($update){
            
        return redirect('/estado') ->with('success',' ');
        }
        
        return redirect('/estado')->with('error',' ');
       
    }

    
    public function destroy($id){
        $delete = $this->daoEstado->delete($id);
        if ($delete){
            return redirect('estado')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('estado')->with('error', 'Este registro não pode ser removido.');
        
    }

    public function showestado(){
        $itens = DB:: select(
            'select   e.id, e.estado, e.uf,e.id_pais, 
             p.pais, e.data_create, e.data_alt 
            from estados as e join  paises as p
            on e.id_pais = p.id');        
            $estados = array();
            foreach($itens as $item){
               
                array_push($estados, $item);
            }    
            return $estados;
    }

    public function RegistroEstado( Request $request){
        $estado = $this->daoEstado->create($request->all());
        $store = $this->daoEstado->store($estado);
        if($store){  
           return response()->json('Estado adicionado com Sucessoo!!');
        } 
        

    }


}
