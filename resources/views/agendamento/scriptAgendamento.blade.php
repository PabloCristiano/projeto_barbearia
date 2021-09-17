<script type="text/javascript">
$(function(){
     //função seleciona o item 
    $(document).on("click", "#tablebuscaServico tbody tr", function(){		        
                    fila = $(this).closest("tr");	        
                    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                    servico = fila.find('td:eq(1)').text();
                    valor = fila.find('td:eq(2)').text();
                    $("#id_servico").val(id);
                    $("#servico").val(servico);
                    $('.modalbuscaservico').modal('toggle');
                });






});
</script>
