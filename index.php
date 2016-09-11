<pre>
<?php
//enviando varios arquivos
//verifica se houve o envio
if(isset($_FILES['arquivo'])) {
                 //verificar se existe arquivos que foram enviados     
	if(count($_FILES['arquivo']['tmp_name']) > 0) {
                     //inserindo os arquivos
		for($q=0;$q<count($_FILES['arquivo']['tmp_name']);$q++) {
                           //colocando o nome do arquivo em md5 para não ter nomes iguais
			$nomedoarquivo = md5($_FILES['arquivo']['name'][$q].time().rand(0,999)).'.jpg';
                          //colocando aquivos dentro da pasta
			move_uploaded_file($_FILES['arquivo']['tmp_name'][$q], 'arquivos/'.$nomedoarquivo);

		}

	}

}
?>
</pre>
<!-- multipart/form-data é utilizada para envio de aquivos sem ela não funciona!-->
<form method="POST" enctype="multipart/form-data">

	Arquivo:<br/>
        <!--multiple = seleciono varios aquivos, arquivo[] = transforma ele é um array!-->
	<input type="file" name="arquivo[]" multiple /><br/><br/>

	<input type="submit" value="Enviar Arquivos" />

</form>