<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
            return redirect('/estado')->with('cadastrado','Show');
        } 
    }

   
    public function show($id){
       
    }

    
    public function edit($id){
        
    }

    
    public function update(Request $request){        
        $update = $this->daoEstado->update($request);
        if($update){            
        return redirect('/estado') ->with('alterado','show');
        }        
        return redirect('/estado')->with('errorUpdate','show');
    }

    public function destroy($id){
        $delete = $this->daoEstado->delete($id);
        if ($delete){
            return redirect('estado')->with('excluido', 'show');
        }
        return redirect('estado')->with('errorExcluido', 'show');
        
    }

    public function showestado(){
       $estados = $this->daoEstado->showestado();   
       return $estados;
    }

    public function RegistroEstado( Request $request){
        $estado = $this->daoEstado->create($request->all());
        $nomeEstado = $this->daoEstado->pesquisar($request->estado);

        if(!empty($nomeEstado) === true){ 
            
            $msgEstado['success'] =false;
            $msgEstado['message'] ='Estado já cadastrado !!!';
            echo json_encode($msgEstado);          
        
        }else{
            
            $store = $this->daoEstado->store($estado);
            $msgEstado['success'] =true;
            echo json_encode($msgEstado);
        }
    }


}
