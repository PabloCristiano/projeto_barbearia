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
        //$nomeEstado = $this->daoEstado->findById($request->id);
        //dd($estado->getid());
        $estadoteste = $this->daoEstado->pesquisar($request->estado);
        
        dd($estadoteste[0]->getUf());

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
      // dd($request);
        $update = $this->daoEstado->update($request);
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
