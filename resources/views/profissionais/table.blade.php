<div class="table-responsive">
    <table id="tableprofissional" class="table table-hover table-striped shadow-xs rounded">
        <thead>
            <tr>
                <th>Código</th>
                <th>Profissional</th>
                <th>WhatsApp</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody> 
           
            @if (@isset($profissionais))
            @foreach ($profissionais as $profissional)  
            <tr>
                <td>{{$profissional->getid()}}</td>
                <td>{{$profissional->getNome()}}</td>
                <td>{{$profissional->getWhatsapp()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod="{{$profissional->getid()}}"                     
                        class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
                        
                        <button data-cod="{{$profissional->getid()}}"
                                 
                        class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
           @endif
        </tbody>

        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>