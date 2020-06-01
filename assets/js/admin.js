$(function(){
    
    $('.money').mask('##0.00', {reverse: true});


    $('#buscarpatrocinador').on('keyup', function(){
    	var seachpatrocinio = $('#buscarpatrocinador').val();
    	var local = "http://localhost/TRABALHOS/BLOG_NICOLE/";
    	var site = "http://www.ganmix.com/";

    	$.ajax({
            type: 'POST',
            url: local+'admin/ajaxPatrocinadores',
            dataType:'json',
            data:{ buscarpatrocinador:seachpatrocinio },
            success:function(data){
            	console.log(data);

                var $html = '<div class="well">';
                for(line in data){
                    user = data[line];
                    $html += 'Empresa: '+user.patrocinador+' | Responsável: '+user.responsavel+' | Contato: '+user.contato+' | E-mail: '+user.email;
                    $html += ' | <a href="'+local+'editarPatrocinador?id='+user.id+'" class="btn btn-success">Editar</a>';
                    $html += ' | <a href="'+local+'excluirPatrocinador?id='+user.id+'" class="btn btn-danger">Excluir</a>';
                }
                $html += '</div>';
                $('#setpatrocinadores').html($html);
            }
        });

    });
});
